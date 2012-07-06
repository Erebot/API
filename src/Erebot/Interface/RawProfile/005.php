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
 *      Raw profile for IRC servers that support
 *      numeric 005 (RPL_ISUPPORT).
 */
interface   Erebot_Interface_RawProfile_005
extends     Erebot_Interface_RawProfile
{
    /**
     * \brief
     *      Gives information of the specific commands/options
     *      supported by the server.
     *
     * \format{"<features+> :are supported by this server"}
     *
     * \note
     *      This numeric conflicts with the one defined in RFC 2812
     *      for Erebot_Interface_RawProfile_Bounce::RPL_BOUNCE.
     */
    const RPL_ISUPPORT              =   5;
}

