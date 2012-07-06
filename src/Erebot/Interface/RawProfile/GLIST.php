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
 *      Raw profile for servers that support
 *      the GLIST command.
 */
interface   Erebot_Interface_RawProfile_GLIST
extends     Erebot_Interface_RawProfile
{
    /**
     * \brief
     *      This numeric is used to display information
     *      about an entry in the G-line list.
     *
     * \format{"<user> <expire> <last modification> <lifetime>
     *          <local> <flags> :<reason>"}
     * \format{"<user>@<host> <expire> <last modification> <lifetime>
     *          <local> <flags> :<reason>"}
     */
    const RPL_GLIST                 = 280;

    /**
     * \brief
     *      Marks the end of the G-line list.
     *
     * \format{":End of G-line List"}
     */
    const RPL_ENDOFGLIST            = 281;
}

