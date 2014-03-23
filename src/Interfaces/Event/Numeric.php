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

namespace Erebot\Interfaces\Event;

/**
 * \brief
 *      Interface to represent a numeric message.
 *
 * This interface provides the necessary methods
 * to represent a numeric message from an IRC server.
 */
interface Numeric extends
    \Erebot\Interfaces\Event\Base\Generic,
    \Erebot\Interfaces\Event\Base\Source,
    \Erebot\Interfaces\Event\Base\Target,
    \Erebot\Interfaces\Event\Base\Text
{
    /**
     * Returns the numeric code associated with
     * the current message.
     *
     * \retval int
     *      The numeric code of this message.
     *
     * \note
     *      Multiple constants may point to the same code
     *      as the same code may have different interpretations
     *      depending on the server (IRCd) where it is used.
     */
    public function getCode();
}
