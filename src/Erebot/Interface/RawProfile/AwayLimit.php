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
 *      Raw profile for servers that may impose
 *      a limit on how many AWAY commands can be
 *      issued over a certain period of time.
 *
 * \note
 *      Currently, only some versions of Bahamut
 *      seem to include this feature. This raw
 *      profile is kept separate though as some
 *      older versions do not support it.
 */
interface   Erebot_Interface_RawProfile_AwayLimit
extends     Erebot_Interface_RawProfile
{
    /**
     * \brief
     *      This numeric is sent by the IRC server
     *      when two many AWAY commands have been
     *      issued by the user in a few seconds.
     *
     * \format{":Too Many aways - Flood Protection activated"}
     */
    const ERR_TOOMANYAWAY           = 429;
}

