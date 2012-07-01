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
 *      Interface for a text wrapper that makes it
 *      easier to manipulate text that comes from
 *      an IRC server.
 */
interface   Erebot_Interface_IrcTextWrapper
extends     Countable,
            ArrayAccess,
            Iterator
{
    /**
     * Returns the wrapped text.
     *
     * \retval string
     *      The text wrapped by this instance.
     */
    public function __toString();
}
