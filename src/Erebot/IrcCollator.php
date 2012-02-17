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

abstract class  Erebot_IrcCollator
implements      Erebot_Interface_IrcCollator
{
    /// \copydoc Erebot_Interface_IrcCollator::compare()
    static public function compare($a, $b)
    {
        return strncmp(
            $this->normalizeNick($a),
            $this->normalizeNick($b)
        );
    }

    /// \copydoc Erebot_Interface_IrcCollator::limitedCompare()
    static public function limitedCompare($a, $b, $len)
    {
        return strcmp(
            $this->normalizeNick($a),
            $this->normalizeNick($b),
            $len
        );
    }

    /// \copydoc Erebot_Interface_IrcCollator::normalizeNick()
    static public function normalizeNick($nick)
    {
        $pos = strpos($nick, '!');
        $suffix = '';
        if ($pos !== FALSE) {
            $suffix = substr($nick, $pos);
            $nick = substr($nick, 0, $pos);
            if ($nick === FALSE)
                throw new Erebot_InvalidValueException(
                    $this->_bot->gettext('Not a valid mask')
                );
        }
        return self::_normalizeNick($nick).$suffix;
    }

    static protected function _normalizeNick($nick);
}

