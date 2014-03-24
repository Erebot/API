<?php
/*
    This file is part of Erebot, a modular IRC bot written in PHP.

    Copyright © 2010 François Poirotte

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

namespace Erebot;

/**
 * \brief
 *      Utility methods for Erebot.
 */
class Utils
{
    /// Return the value of a constant.
    const VSTATIC_CONST     = 0x01;

    /// Return the value of a static variable.
    const VSTATIC_VAR       = 0x02;

    /**
     * Returns the object (if any) associated with the method
     * that called the method which called Erebot::Utils::getCallerObject().
     *
     * Consider the following example:
     * \code
     *      class Foo {
     *          public function bar() {
     *              var_dump(\\Erebot\\Utils::getCallerObject());
     *          }
     *      }
     *      class Bar {
     *          public function baz() {
     *              $foo = new Foo();
     *              $foo->bar();
     *          }
     *      }
     *      $bar = new Bar();
     *      $bar->baz(); // Prints something like "object(Bar)#2 (0) {}".
     * \endcode
     *
     * \retval object
     *      The caller object of the method which called
     *      Erebot::Utils::getCallerObject().
     */
    public static function getCallerObject()
    {
        $bt     = debug_backtrace();
        $caller = isset($bt[2]['object']) ? $bt[2]['object'] : null;
        return $caller;
    }

    /**
     * Can be used to determine if a string contains a sequence
     * of valid UTF-8 encoded codepoints.
     *
     * \param string $text
     *      Some text to test for UTF-8 correctness.
     *
     * \retval true
     *      The $text contains a valid UTF-8 sequence.
     *
     * \retval false
     *      The $text is not a valid UTF-8 sequence.
     */
    public static function isUTF8($text)
    {
        // From http://w3.org/International/questions/qa-forms-utf-8.html
        // Pointed out by bitseeker on http://php.net/utf8_encode
        return (bool) preg_match(
            '%^(?:
                  [\x09\x0A\x0D\x20-\x7E]            # ASCII
                | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
                |  \xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs
                | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
                |  \xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates
                |  \xF0[\x90-\xBF][\x80-\xBF]{2}     # planes 1-3
                | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
                |  \xF4[\x80-\x8F][\x80-\xBF]{2}     # plane 16
            )*$%SDxs',
            $text
        );
    }

    /**
     * Transforms the given text into a UTF-8 sequence.
     *
     * \param string $text
     *      The text to convert into a UTF-8 sequence.
     *
     * \param null|string $from
     *      (optional) The encoding currently used by $text.
     *      A default of "iso-8859-1" is assumed.
     *
     * \retval string
     *      The original text, converted into UTF-8.
     *
     * \throw Erebot::NotImplementedException
     *      Raised if no method could be found to convert
     *      the text. See also the notes for information on
     *      how to avoid this exception being raised.
     *
     * \note
     *      This method tries different technics to convert
     *      the text. If despite its best efforts, it still
     *      fails, you may consider installing one of PHP's
     *      extension for "Human Language and Character
     *      Encoding Support".
     */
    public static function toUTF8($text, $from = 'iso-8859-1')
    {
        $alreadyEncoded = self::isUTF8($text);

        // Special value so that double-encoded text can be decoded.
        if ($from == '__double') {
            if ($alreadyEncoded) {
                // If no decoding function is available, we'll just
                // return the double-encoded text as-is.
                // This is better than throwing an exception anyway.
                $res = $text;

                if (function_exists('utf8_decode')) {
                    $res = utf8_decode($text);
                } elseif (function_exists('iconv')) {
                    $res = iconv('utf-8', 'iso-8859-1//TRANSLIT', $text);
                } elseif (function_exists('recode')) {
                    $res = recode('utf-8..iso-8859-1', $text);
                } elseif (function_exists('mb_convert_encoding')) {
                    $res = mb_convert_encoding($text, 'iso-8859-1', 'utf-8');
                } elseif (function_exists('html_entity_decode')) {
                    $res = html_entity_decode(
                        htmlentities($text, ENT_QUOTES, 'utf-8'),
                        ENT_QUOTES,
                        'iso-8850-1'
                    );
                }

                // So, was it really double-encoded?
                return (self::isUTF8($res) ? $res : $text);
            }

            // Someone tried to foul us, but we'll foul them instead.
            // Here we blindly assume the text is in ISO-8859-1.
            $from = 'iso-8859-1';
        }

        if ($alreadyEncoded) {
            return $text;
        }

        if (!strcasecmp($from, 'iso-8859-1') &&
            function_exists('utf8_encode')) {
            return utf8_encode($text);
        }

        if (function_exists('iconv')) {
            return iconv($from, 'UTF-8//TRANSLIT', $text);
        }

        if (function_exists('recode')) {
            return recode($from.'..utf-8', $text);
        }

        if (function_exists('mb_convert_encoding')) {
            return mb_convert_encoding($text, 'UTF-8', $from);
        }

        if (function_exists('html_entity_decode')) {
            return html_entity_decode(
                htmlentities($text, ENT_QUOTES, $from),
                ENT_QUOTES,
                'UTF-8'
            );
        }

        throw new \Erebot\NotImplementedException('No way to convert to UTF-8');
    }

    /**
     * Returns some static data from a class/object.
     *
     * \param string|object $class
     *      Either the name of a class or an instance of a class
     *      from which the static data will be retrieved.
     *
     * \param string $name
     *      The name of the static data to return.
     *
     * \param opaque $source
     *      (optional) The kind of static data to look for (either
     *      a constant or a static variable).
     *      Use Erebot::Utils::VSTATIC_CONST or Erebot::Utils::VSTATIC_VAR
     *      to select a specific source of data.
     *      The default is to look for a constant (same as if $source
     *      had been set to Erebot::Utils::VSTATIC_CONST).
     *
     * \retval mixed
     *      The content of the static data whose name is $name.
     *
     * \throw Erebot::NotFoundException
     *      No data could be found which matches the given $name,
     *      using the specified $source of data.
     */
    public static function getVStatic(
        $class,
        $name,
        $source = self::VSTATIC_CONST
    ) {
        if (is_object($class)) {
            $class = get_class($class);
        }
        $refl = new \ReflectionClass($class);

        if (($source & self::VSTATIC_CONST) == self::VSTATIC_CONST) {
            try {
                return $refl->getConstant($name);
            } catch (ReflectionException $e) {
            }
        }

        if (($source & self::VSTATIC_VAR) == self::VSTATIC_VAR) {
            try {
                $reflProp = $refl->getProperty($name);
                return $reflProp->getValue();
            } catch (ReflectionException $e) {
            }
        }

        throw new \Erebot\NotFoundException('No such thing');
    }

    /**
     * Checks whether a variable can be safely cast to a string.
     * This is the case when the variable is already a string or
     * when it's an object with a __toString() method.
     *
     * \param mixed $item
     *      Variable to test.
     *
     * \retval bool
     *      Whether the given $item can be safely cast to a string.
     */
    public static function stringifiable($item)
    {
        if (is_string($item)) {
            return true;
        }
        if (is_object($item) && method_exists($item, '__toString')) {
            return true;
        }
        return false;
    }

    /**
     * Return human readable sizes.
     *
     * @author      Aidan Lister <aidan@php.net>
     * @version     1.3.0
     * @see         http://aidanlister.com/2004/04/human-readable-file-sizes/
     * @param       int     $size        size in bytes
     * @param       string  $max         maximum unit
     * @param       string  $system      'si' for SI, 'bi' for binary suffixes
     * @param       string  $retstring   return string format
     * @retval      string  The given size, in a human readable format.
     */
    public static function humanSize($size, $max = null, $system = 'si', $retstring = '%01.2f %s')
    {
        // Pick units
        $systems = array();
        $systems['si']['suffix'] = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
        $systems['si']['size']   = 1000;
        $systems['bi']['suffix'] = array('B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB');
        $systems['bi']['size']   = 1024;
        $sys = isset($systems[$system]) ? $systems[$system] : $systems['si'];

        // Max unit to display
        $depth = count($sys['suffix']) - 1;
        if ($max && false !== $d = array_search($max, $sys['suffix'])) {
            $depth = $d;
        }

        // Loop
        $i = 0;
        while ($size >= $sys['size'] && $i < $depth) {
            $size /= $sys['size'];
            $i++;
        }

        return sprintf($retstring, $size, $sys['suffix'][$i]);
    }

    /**
     * Does the opposite of Erebot::Utils::humanSize.
     * That is, this method takes some size expressed
     * in a human-friendly fashion and returns the
     * actual size.
     *
     * \param string $humanSize
     *      User-friendly size.
     *
     * \retval mixed
     *      The actual size as an integer or \b null
     *      if the size could not be determined.
     */
    public static function parseHumanSize($humanSize)
    {
        $size       = (float) str_replace(",", ".", $humanSize);
        $suffix     = (string) substr(
            $humanSize,
            strspn($humanSize, "1234567890.,+-")
        );
        $suffix     = trim($suffix);
        $exponents  = array_flip(array('', 'K', 'M', 'G', 'T', 'P'));
        $base       = 1000;

        switch (strlen($suffix)) {
            case 0:
                return null;

            case 1:
                $exp = 0;
                break;

            case 3:
                // 3 chars? We MUST be using SI units then.
                if ($suffix[1] != 'i') {
                    return null;
                }
                $suffix = $suffix[0].$suffix[1];
                $base   = 1024;
                // We don't break on purpose.

            case 2:
                if (!isset($exponents[$suffix[0]])) {
                    return null;
                }
                $exp = $exponents[$suffix[0]];
        }
        return (int) ($size * pow($base, $exp));
    }
}
