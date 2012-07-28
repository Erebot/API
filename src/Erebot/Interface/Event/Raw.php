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
 *      Interface to represent a raw numeric message.
 *
 * This interface provides the necessary methods
 * to represent a raw numeric message from an IRC server.
 */
interface   Erebot_Interface_Event_Raw
extends     Erebot_Interface_Event_Base_Generic,
            Erebot_Interface_Event_Base_Source,
            Erebot_Interface_Event_Base_Target,
            Erebot_Interface_Event_Base_Text
{
    /**
     * Returns the raw numeric code associated with
     * the current message.
     *
     * \retval int
     *      The raw numeric code of this message.
     *
     * \note
     *      Multiple constants may point to the same code
     *      as the same code may have different interpretations
     *      depending on the server (IRCd) where it is used.
     */
    public function getRaw();
}

