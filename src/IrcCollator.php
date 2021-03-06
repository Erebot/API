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
 *      An abstract class that provides an IRC collation.
 *
 * Using subclasses of this class, you can compare two
 * IRC nicknames.
 */
abstract class IrcCollator implements \Erebot\Interfaces\IrcCollator
{
    public function compare($a, $b)
    {
        return strcmp(
            $this->normalizeNick($a),
            $this->normalizeNick($b)
        );
    }

    public function limitedCompare($a, $b, $len)
    {
        return strncmp(
            $this->normalizeNick($a),
            $this->normalizeNick($b),
            $len
        );
    }

    public function normalizeNick($nick)
    {
        $pos = strpos($nick, '!');
        $suffix = '';
        if ($pos !== false) {
            $suffix = substr($nick, $pos);
            $nick = substr($nick, 0, $pos);
            if ($nick === false) {
                throw new \Erebot\InvalidValueException(
                    $this->_bot->gettext('Not a valid mask')
                );
            }
        }
        return $this->realNormalizeNick($nick).$suffix;
    }

    /**
     * \copydoc Erebot::Interfaces::IrcCollator::normalizeNick()
     *
     * \note
     *      This method must be redefined in subclasses.
     */
    protected function realNormalizeNick($nick)
    {
        throw new \Erebot\NotImplementedException();
    }
}
