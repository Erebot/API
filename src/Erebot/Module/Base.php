<?php
/*
    This file is part of Erebot.

    Erebot is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Erebot is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Erebot.  If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * \brief
 *      An abstract class which serves as the base
 *      to build additional modules for Erebot.
 */
abstract class Erebot_Module_Base
{
    /// The connection associated with this instance.
    protected $_connection;

    /// The channel associated with this instance, if any.
    protected $_channel;

    /// The translator to use for messages coming from this instance.
    protected $_translator;

    /// Factories to use for this module.
    protected $_factories;

    /// A logger for this module's messages.
    protected $_logger;


    /// Passed when the module is loaded (instead of reloaded).
    const RELOAD_INIT       = 0x01;

    /// Passed during unittests (currently unused...).
    const RELOAD_TESTING    = 0x02;

    /// The module should (re)load its members.
    const RELOAD_MEMBERS    = 0x10;

    /// The module should (re)load its handlers.
    const RELOAD_HANDLERS   = 0x20;

    /// The module should (re)load all of its contents.
    const RELOAD_ALL        = 0xF0;


    /// A regular message.
    const MSG_TYPE_PRIVMSG      = 'PRIVMSG';

    /// A notice.
    const MSG_TYPE_NOTICE       = 'NOTICE';

    /// A CTCP request.
    const MSG_TYPE_CTCP         = 'CTCP';

    /// A reply to a CTCP request.
    const MSG_TYPE_CTCPREPLY    = 'CTCPREPLY';

    /// An action.
    const MSG_TYPE_ACTION       = 'ACTION';

    /**
     * This method is called whenever the module is (re)loaded.
     *
     * \param int $flags
     *      A bitwise OR of the Erebot_Module_Base::RELOAD_*
     *      constants. Your method should take proper actions
     *      depending on the value of those flags.
     *
     * \note
     *      See the documentation on individual RELOAD_*
     *      constants for a list of possible values.
     */
    abstract protected function _reload($flags);

    /**
     * This method is called whenever the module
     * should be unloaded.
     *
     * You may redefine this method to do whatever
     * you need to do to remove any bits of your
     * module's existence (eg. clean up memory, etc.).
     */
    protected function _unload()
    {
    }

    /**
     * Constructor for modules.
     *
     * \param string|NULL $channel
     *      (optional) The channel this instance applies to.
     *      This will be NULL for modules loaded at the server
     *      level or higher in the configuration hierarchy.
     */
    final public function __construct($channel)
    {
        $this->_connection  =
        $this->_translator  =
        $this->_mainCfg     = NULL;
        $this->_channel     = $channel;
        $this->_factories   = array();

        $ifaces = array(
            '!Callable'         => 'Erebot_Callable',
            '!EventHandler'     => 'Erebot_EventHandler',
            '!Identity'         => 'Erebot_Identity',
            '!NumericHandler'   => 'Erebot_NumericHandler',
            '!NumericReference' => 'Erebot_NumericReference',
            '!Styling'          => 'Erebot_Styling',
            '!Styling_Currency' => 'Erebot_Styling_Currency',
            '!Styling_DateTime' => 'Erebot_Styling_DateTime',
            '!Styling_Duration' => 'Erebot_Styling_Duration',
            '!TextWrapper'      => 'Erebot_TextWrapper',
            '!Timer'            => 'Erebot_Timer',
        );
        foreach ($ifaces as $iface => $cls) {
            try {
                $this->setFactory($iface, $cls);
            }
            catch (Erebot_InvalidValueException $e) {
                // Ignore silently as the only time the default classes
                // won't exist is when we run the tests for some module.
            }
        }

        /// @FIXME: handle dependency injection somehow
        $this->_logger = NULL;
        if (class_exists('Plop')) {
            $logging =&  Plop::getInstance();
            $reflector = new ReflectionObject($this);
            $this->_logger = $logging->getLogger($reflector->getFileName());
            unset($logging);
        }
    }

    /** Destructor. */
    final public function __destruct()
    {
        unset(
            $this->_connection,
            $this->_translator,
            $this->_channel,
            $this->_mainCfg
        );
    }

    /**
     * Public method to (re)load a module.
     * This eventually reconfigures the bot.
     *
     * \param Erebot_Interface_Connection $connection
     *      IRC connection associated with this instance.
     *
     * \param int $flags
     *      A bitwise OR of the Erebot_Module_Base::RELOAD_*
     *      constants. Your method should take proper actions
     *      depending on the value of those flags.
     *
     * \note
     *      See the documentation on individual RELOAD_*
     *      constants for a list of possible values.
     */
    final public function reload(
        Erebot_Interface_Connection $connection,
                                    $flags
    )
    {
        if ($this->_connection === NULL)
            $flags |= self::RELOAD_INIT;
        else
            $flags &= ~self::RELOAD_INIT;

        $this->_connection  = $connection;
        $serverCfg          = $this->_connection->getConfig(NULL);
        $this->_mainCfg     = $serverCfg->getMainCfg();
        // Passing $this to get_class() is necessary to retrieve the instance's
        // class instead of the code's definition class (Erebot_Module_Base).
        $this->_translator  = $this->_mainCfg->getTranslator(get_class($this));
        $this->_reload($flags);
    }

    /**
     * This method is called when unloading
     * the module. It simply calls $this->_unload.
     */
    final public function unload()
    {
        return $this->_unload();
    }

    /**
     * Set the factory for the given interface.
     *
     * \param string $iface
     *      Name of the interface to act upon.
     *
     * \param string $cls
     *      Name of the class that acts as
     *      a factory for that interface.
     *      If must implement that interface.
     *
     * \note
     *      As a special shortcut, an exclamation
     *      point (!) in the interface's name will
     *      automatically be replaced with the text
     *      "Erebot_Interface_".
     */
    public function setFactory($iface, $cls)
    {
        if (!is_string($iface))
            throw new Erebot_InvalidValueException('Not an interface name');

        $iface = str_replace('!', 'Erebot_Interface_', $iface);
        if (!interface_exists($iface, TRUE))
            throw new Erebot_InvalidValueException(
                'No such interface ('.$iface.')'
            );
        if (!class_exists($cls, TRUE))
            throw new Erebot_InvalidValueException('No such class ('.$cls.')');

        $reflector = new ReflectionClass($cls);
        if (!$reflector->isSubclassOf($iface))
            throw new Erebot_InvalidValueException(
                'A class that implements the interface was expected'
            );
        $iface = strtolower($iface);
        $this->_factories[$iface] = $cls;
    }

    /**
     * Return the name of the class to use
     * to create instances with the given
     * interface.
     *
     * \param string $iface
     *      Name of the interface for which
     *      the factory must be returned.
     *
     * \retval string
     *      Name of the class that acts as
     *      a factory for that interface.
     *
     * \note
     *      As a special shortcut, an exclamation
     *      point (!) in the interface's name will
     *      automatically be replaced with the text
     *      "Erebot_Interface_".
     */
    public function getFactory($iface)
    {
        if (!is_string($iface))
            throw new Erebot_InvalidValueException('Not an interface name');

        $iface      = str_replace('!', 'Erebot_Interface_', $iface);
        $ifaceKey   = strtolower($iface);
        if (!isset($this->_factories[$ifaceKey]))
            throw new Erebot_InvalidValueException(
                'No such interface ('.$iface.')'
            );
        return $this->_factories[$ifaceKey];
    }

    /**
     * Send a message to a set of IRC targets (nicks or channels).
     *
     * \param string|list $targets
     *      Either a single nick or channel to which the message
     *      must be sent or an array of nicks/channels.
     *
     * \param string $message
     *      The message to send.
     *
     * \param opaque $type
     *      (optional) The type of message to send. The default is
     *      to send a regular message (using the PRIVMSG command).
     *      Use the MSG_TYPE_* constants to specify a different type.
     *
     * \throw Exception
     *      An invalid value was used for the $type or $targets
     *      parameter.
     */
    protected function sendMessage(
        $targets,
        $message,
        $type = self::MSG_TYPE_PRIVMSG
    )
    {
        $types  = array('PRIVMSG', 'NOTICE', 'CTCP', 'CTCPREPLY', 'ACTION');
        $type   = strtoupper($type);
        if (!in_array($type, $types))
            throw new Exception('Not a valid type');

        if (is_array($targets))
            $targets = implode(',', $targets);
        else if ($targets instanceof Erebot_Identity)
            $targets = (string) $targets;
        else if (!is_string($targets))
            throw new Exception('Not a valid target (expected a string)');

        if (!Erebot_Utils::stringifiable($message))
            throw new Exception('Not a valid message (expected a string)');

        $message    = (string) $message;
        $parts      = array_map('trim', explode("\n", trim($message)));
        $message    = implode(' ', $parts);
        $marker     = '';
        $ctcpType   = '';

        if ($type == 'ACTION') {
            $type       = 'PRIVMSG';
            $marker     = "\001";
            $ctcpType   = 'ACTION';
        }

        if ($type == 'CTCP' || $type == 'CTCPREPLY') {
                $type       = ($type == 'CTCP' ? 'PRIVMSG' : 'NOTICE');
                $marker     = "\001";
                $parts      = explode(' ', $message);
                $ctcpType   = array_shift($parts);
                $message    = implode(' ', $parts);
        }

        if ($ctcpType != "" && $message != "") {
            $ctcpType .= " ";
            $message = self::_ctcpQuote($message);
        }

        $prefix = $type.' '.$targets.' :'.$marker.$ctcpType;
        // 400 is a rough estimation of how big
        // a message we may send.
        $messages = explode(
            "\n",
            wordwrap(
                $message,
                400 - $prefix - 2,
                "\n",
                TRUE
            )
        );
        $io = $this->_connection->getIO();
        foreach ($messages as $msg)
            $io->push($prefix.$msg.$marker);
    }

    /**
     * Quotes a CTCP message.
     *
     * \param string $message
     *      Message to quote.
     *
     * \retval string
     *      Quoted version of the message.
     *
     * \see
     *      http://www.irchelp.org/irchelp/rfc/ctcpspec.html
     *      describes the quoting algorithm used.
     */
    static protected function _ctcpQuote($message)
    {
        // First comes low-level quoting.
        $quoting = array(
            "\000"  => "\0200",
            "\n"    => "\020n",
            "\r"    => "\020r",
            "\020"  => "\020\020",
        );
        $message = strtr($message, $quoting);

        // Next some CTCP-level quoting and we're done.
        $quoting = array(
            "\001"  => "\\a",
            "\\"    => "\\\\",
        );
        $message = strtr($message, $quoting);
        return $message;
    }

    /**
     * Send a raw command to the IRC server.
     *
     * \param string $command
     *      The command to send.
     */
    protected function sendCommand($command)
    {
        if (!Erebot_Utils::stringifiable($command))
            throw new Exception('Invalid command (not a string)');
        $this->_connection->getIO()->push((string) $command);
    }

    /**
     * Register a timer.
     *
     * \param Erebot_Interface_Timer $timer
     *      The timer to register.
     *
     * \note
     *      This method is only a shortcut for
     *      Erebot_Interface_Core::addTimer().
     */
    protected function addTimer(Erebot_Interface_Timer $timer)
    {
        $bot = $this->_connection->getBot();
        return $bot->addTimer($timer);
    }

    /**
     * Unregister a timer.
     *
     * \param Erebot_Interface_Timer $timer
     *      The timer to unregister.
     *
     * \note
     *      This method is only a shortcut for
     *      Erebot_Interface_Core::removeTimer().
     */
    protected function removeTimer(Erebot_Interface_Timer $timer)
    {
        $bot = $this->_connection->getBot();
        return $bot->removeTimer($timer);
    }

    /**
     * \internal
     * Retrieves a parameter from the module's configuration
     * by recursively traversing the configuration hierarchy
     * and parses it using the appropriate function.
     *
     * \param string $something
     *      The type of parsing to apply to the parameter.
     *      This is used to determine the correct parsing
     *      method to call.
     *
     * \param string $param
     *      The name of the parameter to retrieve.
     *
     * \param mixed $default
     *      The default value if the parameter is absent.
     *      It's actual type depends on the type of parsing
     *      applied by the $something argument.
     *
     * \warning
     *      This method may throw several exceptions for
     *      different reasons (such as a missing parameter,
     *      an invalid value or an invalid default value).
     */
    private function parseSomething($something, $param, $default)
    {
        $function   = 'parse'.$something;
        $bot        = $this->_connection->getBot();
        if ($this->_channel !== NULL) {
            try {
                $config = $this->_connection->getConfig($this->_channel);
                return $config->$function(get_class($this), $param);
            }
            catch (Erebot_Exception $e) {
                unset($config);
            }
        }
        $config = $this->_connection->getConfig(NULL);
        return $config->$function(get_class($this), $param, $default);
    }

    /**
     * Returns the boolean value for a setting in this module's configuration.
     *
     * \param string $param
     *      The name of the parameter we are interested in.
     *
     * \param bool $default
     *      (optional) A default value in case no value has been set
     *      at the configuration level.
     *
     * \retval bool
     *      The value for that parameter.
     *
     * \throw Erebot_InvalidValueException
     *      The given $default value does not have the right type.
     */
    protected function parseBool($param, $default = NULL)
    {
        return $this->parseSomething('Bool', $param, $default);
    }

    /**
     * Returns the string value for a setting in this module's configuration.
     *
     * \param string $param
     *      The name of the parameter we are interested in.
     *
     * \param string $default
     *      An optional default value in case no value has been set
     *      at the configuration level.
     *
     * \retval string
     *      The value for that parameter.
     *
     * \throw Erebot_InvalidValueException
     *      The given $default value does not have the right type.
     */
    protected function parseString($param, $default = NULL)
    {
        return $this->parseSomething('String', $param, $default);
    }

    /**
     * Returns the integer value for a setting in this module's configuration.
     *
     * \param int $param
     *      The name of the parameter we are interested in.
     *
     * \param int $default
     *      (optional) A default value in case no value has been set
     *      at the configuration level.
     *
     * \retval int
     *      The value for that parameter.
     *
     * \throw Erebot_InvalidValueException
     *      The given $default value does not have the right type.
     */
    protected function parseInt($param, $default = NULL)
    {
        return $this->parseSomething('Int', $param, $default);
    }

    /**
     * Returns the real value for a setting in this module's configuration.
     *
     * \param string $param
     *      The name of the parameter we are interested in.
     *
     * \param float $default
     *      (optional) A default value in case no value has been set
     *      at the configuration level.
     *
     * \retval float
     *      The value for that parameter.
     *
     * \throw Erebot_InvalidValueException
     *      The given $default value does not have the right type.
     */
    protected function parseReal($param, $default = NULL)
    {
        return $this->parseSomething('Real', $param, $default);
    }

    /**
     * Registers the given callback as the help method for this module.
     * All help requests directed to this module will be passed to this
     * method which may choose to handle it (eg. by sending back help
     * messages to the person requesting help).
     * This method may also choose to ignore a given request, which will
     * result in a default "No help available" response.
     *
     * \param Erebot_Interface_Callable $callback
     *      The callback to register as the help method
     *      for this module.
     *
     * \retval TRUE
     *      The callback could be registered.
     *
     * \retval FALSE
     *      The callback could not be registered.
     *
     * \note
     *      In case multiple calls to this method are done by
     *      the same module, only the last registered callback
     *      will effectively be called to handle help requests.
     */
    protected function registerHelpMethod(Erebot_Interface_Callable $callback)
    {
        try {
            $helper = $this->_connection->getModule(
                'Erebot_Module_Helper',
                $this->_channel
            );
            return $helper->realRegisterHelpMethod($this, $callback);
        }
        catch (EException $e) {
            return FALSE;
        }
    }

    /**
     * Returns the appropriate formatter for the given channel.
     *
     * \param NULL|FALSE|string $chan
     *      The channel for which a formatter must be returned.
     *      If $chan is NULL, the hierarchy of configurations
     *      is traversed to find the most appropriate formatter.
     *      If $chan is FALSE, a formatter is built using the
     *      bot's main translator.
     *
     * \retval Erebot_Interface_Styling
     *      A formatter for the given channel.
     */
    protected function getFormatter($chan)
    {
        $cls = $this->getFactory('!Styling');
        if ($chan === FALSE)
            return new $cls($this->_translator);

        else if ($chan !== NULL) {
            $config = $this->_connection->getConfig($chan);
            try {
                // Passing $this to get_class() is necessary to retrieve
                // the instance's class instead of the code's definition
                // class (Erebot_Module_Base).
                return new $cls($config->getTranslator(get_class($this)));
            }
            catch (Erebot_Exception $e) {
            // The channel lacked a specific config. Use the cascade.
            }
            unset($config);
        }

        $config = $this->_connection->getConfig($this->_channel);
        try {
            // Passing $this to get_class() is necessary to retrieve
            // the instance's class instead of the code's definition
            // class (Erebot_Module_Base).
            return new $cls($config->getTranslator(get_class($this)));
        }
        catch (Erebot_Exception $e) {
            // The channel lacked a specific config. Use the cascade.
        }
        unset($config);

        $config = $this->_connection->getConfig(NULL);
        return new $cls($config->getTranslator(get_class($this)));
    }

    /**
     * This method is a simple shortcut to create references
     * to numeric messages.
     *
     * \param $name
     *      Name of the numeric message for which a reference
     *      must be returned (eg. "RPL_WELCOME").
     *
     * \retval Erebot_Interface_NumericReference
     *      A numeric reference.
     */
    public function getNumRef($name)
    {
        $cls = $this->getFactory('!NumericReference');
        return new $cls($this->_connection, $name);
    }
}

