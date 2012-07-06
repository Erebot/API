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
 *      the MAP command.
 */
interface   Erebot_Interface_RawProfile_MAP
extends     Erebot_Interface_RawProfile
{
    /**
     * \brief
     *      Sent as a response to a MAP command,
     *      with information on the network's map.
     *
     * \note
     *      Unfortunately, the format of this numeric
     *      changes heavily depending on the IRCd.
     */
    const RPL_MAP                   =   6;

    /**
     * \brief
     *      Sent as a response to a MAP command,
     *      to indicate that the network contains
     *      more servers than what was displayed.
     *
     * \note
     *      Unfortunately, the format of this numeric
     *      changes heavily depending on the IRCd.
     */
    const RPL_MAPMORE               =   6;

    /**
     * \brief
     *      Marks the end of the network's map.
     *
     * \format{":End of /MAP"}
     */
    const RPL_MAPEND                =   7;

    /// Alias for Erebot_Interface_RawProfile_MAP::RPL_MAPEND.
    const RPL_ENDMAP                =   'RPL_MAPEND';
}

