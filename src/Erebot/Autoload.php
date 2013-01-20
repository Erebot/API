<?php

/**
 * \brief
 *      Autoloader for Erebot's classes and interfaces.
 *
 * This autoloader is mainly the same as the one used
 * by PEAR2 packages, except that it does not rely on
 * features which are specific to PHP 5.3 (eg. namespaces).
 *
 * The documentation of this class has also been updated
 * to use Doxygen commands instead of phpDocumentor ones.
 */
class Erebot_Autoload
{
    /// Whether the autoload class has been spl_autoload_register-ed
    protected static $_registered = false;

    /// Array of PEAR2 autoload paths registered
    protected static $_paths = array();

    /// Array of classname-to-file mapping
    protected static $_map = array();

    /// Array of class maps loaded
    protected static $_maps = array();

    /// Last classmap specified
    protected static $_mapfile = null;

    /// Array of classes loaded automatically not in the map
    protected static $_unmapped = array();

    /**
     * Initialize the PEAR2 autoloader
     *
     * \param string $path
     *      Directory path to register
     *
     * \param string $mapfile
     *      Path to a classname-to-file map file.
     *
     * \return
     *      This method does not return anything.
     */
    static function initialize($path = null, $mapfile = null)
    {
        self::register();
        self::addPath($path);
        self::addMap($mapfile);
    }

    /**
     * Register the PEAR2 autoload class with spl_autoload_register
     *
     * \return
     *      This method does not return anything.
     */
    protected static function register()
    {
        if (!self::$_registered) {
            // set up __autoload
            $autoload = spl_autoload_functions();
            spl_autoload_register(__CLASS__.'::load');
            if (function_exists('__autoload') && ($autoload === false)) {
                // __autoload() was being used, but now would be ignored, add
                // it to the autoload stack
                spl_autoload_register('__autoload');
            }
        }
        self::$_registered = true;
    }

    /**
     * Add a path
     *
     * \param string $path
     *      The directory to add to the set of PEAR2 paths
     *
     * \return
     *      This method does not return anything.
     */
    protected static function addPath($path)
    {
        $len = strlen(DIRECTORY_SEPARATOR);
        while (1) {
            if (!is_string($path))
                return;
            if (substr($path, -$len) == DIRECTORY_SEPARATOR)
                $path = substr($path, 0, -$len);
            else
                break;
        }

        if (!in_array($path, self::$_paths)) {
            self::$_paths[] = $path;
        }
    }

    /**
     * Add a classname-to-file map
     *
     * \param string $mapfile
     *      The filename of the classmap
     *
     * \return
     *      This method does not return anything.
     */
    protected static function addMap($mapfile)
    {
        if (! in_array($mapfile, self::$_maps)) {

            // keep track of specific map file loaded in this
            // instance so we can update it if necessary
            self::$_mapfile = $mapfile;

            if (file_exists($mapfile)) {
                $map = include $mapfile;
                if (is_array($map)) {
                    // mapfile contains a valid map, so we'll keep it
                    self::$_maps[] = $mapfile;
                    self::$_map = array_merge(self::$_map, $map);
                }
            }

        }
    }

    /**
     * Check if the class is already defined in a classmap
     *
     * \param string $class
     *      The class to look for
     *
     * \retval bool
     *      TRUE if the class is already defined,
     *      FALSE otherwise.
     */
    protected static function isMapped($class)
    {
        if (isset(self::$_map[$class])) {
            return true;
        }
        if (isset(self::$_mapfile) && ! isset(self::$_map[$class])) {
            self::$_unmapped[] = $class;
            return false;
        }
        return false;
    }

    /**
     * Load a PEAR2 class
     *
     * \param string $class
     *      The class to load
     *
     * \retval bool
     *      TRUE if the class could be loaded,
     *      FALSE otherwise.
     */
    static function load($class)
    {
        /* Protects us from possible remote code inclusion due to:
           https://bugs.php.net/bug.php?id=55475
           We should already be safe without this check due to the
           way this autoloader works, but this helps other autoloaders
           that use other mechanisms and may be vulnerable. */
        if (strpos($class, ":") !== false)
            // Safer than returning false as it prevents
            // other autoloaders from ever executing...
            throw new Exception('Possible remote code injection detected');

        // need to check if there's a current map file specified ALSO.
        // this could be the first time writing it.
        $mapped = self::isMapped($class);
        if ($mapped) {
            require self::$_map[$class];
            if (!self::loadSuccessful($class)) {
                // record this failure & keep going, we may still find it
                self::$_unmapped[] = $class;
            } else {
                return true;
            }
        }

        $file = str_replace(
            array('_', '\\'),
            DIRECTORY_SEPARATOR,
            $class
        ) . '.php';
        foreach (self::$_paths as $path) {
            if (file_exists($path . DIRECTORY_SEPARATOR . $file)) {
                require $path . DIRECTORY_SEPARATOR . $file;
                if (!self::loadSuccessful($class)) {
                    throw new Exception(
                        'Class ' . $class . ' was not present in ' .
                        $path . DIRECTORY_SEPARATOR . $file .
                        '") [Autoload]'
                    );
                }

                if (in_array($class, self::$_unmapped)) {
                    self::updateMap(
                        $class,
                        $path . DIRECTORY_SEPARATOR . $file
                    );
                }
                return true;
            }
        }

        $e = new Exception(
            'Class ' . $class . ' could not be loaded from ' .
            $file . ', file does not exist (registered paths="' .
            implode(PATH_SEPARATOR, self::$_paths) .
            '") [Autoload]'
        );
        $trace = $e->getTrace();
        if (isset($trace[2]) && isset($trace[2]['function']) &&
            in_array(
                $trace[2]['function'],
                array('class_exists', 'interface_exists')
            )) {
            return false;
        }
        if (isset($trace[1]) && isset($trace[1]['function']) &&
            in_array(
                $trace[1]['function'],
                array('class_exists', 'interface_exists')
            )) {
            return false;
        }

        // If there are other autoload functions registered,
        // let's try to play nicely with them...
        // ...otherwise, we just throw an exception.
        if (count(spl_autoload_functions()) == 1)
            throw $e;
        return false;
    }

    /**
     * Check if the requested class was loaded from the specified path
     *
     * \param string $class
     *  Name of the class or interface to test.
     *
     * \retval bool
     *      TRUE if the class was successfully loaded,
     *      FALSE otherwise.
     */
    protected static function loadSuccessful($class)
    {
        if (!class_exists($class, false) &&
            !interface_exists($class, false)) {
            return false;
        }
        return true;
    }

    /**
     * If possible, update the classmap file with newly-discovered
     * mapping.
     *
     * \param string $class
     *      Class name discovered
     *
     * \param string $origin
     *      File where class was found
     *
     * \return
     *      This method does not return anything.
     */
    protected static function updateMap($class, $origin)
    {
        if (is_writable(self::$_mapfile) ||
            is_writable(dirname(self::$_mapfile))) {
            self::$_map[$class] = $origin;
            file_put_contents(
                self::$_mapfile,
                '<'."?php\n"
                . "// Autoload auto-generated classmap\n"
                . "return " . var_export(self::$_map, true) . ';',
                LOCK_EX
            );
        }
    }

    /**
     * Return the array of paths PEAR2 autoload has registered
     *
     * \retval array
     *      Array of registered paths' names.
     */
    static function getPaths()
    {
        return self::$_paths;
    }
}

