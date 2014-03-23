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
 *      An exception thrown whenever PHP raises a notice, warning, etc.
 *
 * This is an implementation of a custom exception which turns
 * all PHP messages (errors, warnings, notices, etc.) into exceptions.
 * We use this exception instead of PHP's ErrorException because the
 * latter is buggy under PHP 5.2, which might be a target version for
 * Erebot at some time.
 * Original implementation proposed by luke at cywh dot com:
 * http://php.net/manual/en/class.errorexception.php#89132
 */
class ErrorReportingException extends \Erebot\Exception
{
    /// A mapping of PHP's error levels' names to their numeric value.
    static protected $map = null;

    /**
     * Constructs a new exception from a PHP error/warning/notice.
     *
     * \param string $message
     *      The error/warning/notice message.
     *
     * \param int $code
     *      A code indicating whether this exception was created
     *      from an error, a warning or a notice.
     *
     * \param string $filename
     *      The file that raised the error/warning/notice.
     *
     * \param int $lineno
     *      Line number in $filename where the
     *      error/warning/notice was issued.
     */
    public function __construct($message, $code, $filename, $lineno)
    {
        if (self::$map === null) {
            $constants = get_defined_constants(true);
            $core = array();
            if (isset($constants['Core'])) {
                $core = $constants['Core'];
            } elseif (isset($constants['internal'])) {
                $core = $constants['internal'];
            } elseif (isset($constants['mhash'])) {
                $core = $constants['mhash'];
            }

            self::$map = array();
            foreach ($core as $name => $value) {
                if (substr($name, 0, 2) == 'E_') {
                    self::$map[$value] = $name;
                }
            }
        }

        parent::__construct($message, $code);
        $this->file = $filename;
        $this->line = $lineno;
    }

    /**
     * Returns a textual representation of this exception.
     *
     * \retval string
     *      Textual representation of the exception.
     */
    public function __toString()
    {
        if (isset(self::$map[$this->code])) {
            $code = self::$map[$this->code];
        } else {
            $code = '???';
        }

        return "[$code] - {$this->message}";
    }
}
