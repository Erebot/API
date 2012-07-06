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
 *      the WATCH command.
 */
interface   Erebot_Interface_RawProfile_WATCH
extends     Erebot_Interface_RawProfile
{
    /**
     * \brief
     *      The server will send this numeric back to you
     *      if you try to add someone to your watch list
     *      and the list is already full.
     *
     * \format{"<mask> :Maximum size for WATCH-list is <limit> entries"}
     */
    const ERR_TOOMANYWATCH          = 512;

    /**
     *  \brief
     *      Sent when someone on your watch list logs online.
     *
     *  \format{"<nick> <ident> <host> <timestamp> :logged online"}
     */
    const RPL_LOGON                 = 600;

    /**
     *  \brief
     *      Sent when someone on your watch list logs offline.
     *
     *  \format{"<nick> <ident> <host> <timestamp> :logged offline"}
     */
    const RPL_LOGOFF                = 601;

    /**
     * \brief
     *      Sent by the server after it receives a request
     *      to remove someone from the watch list.
     *
     * \format{"<nick> <ident> <host> <timestamp> :stopped watching"}
     */
    const RPL_WATCHOFF              = 602;

    /**
     * \brief
     *      Displays how many people are on your watch list
     *      and how many have added you to their watch list.
     *
     * \format{":You have <mine> and are on <others> WATCH entries"}
     */
    const RPL_WATCHSTAT             = 603;

    /**
     *  \brief
     *      Sent after a nick has been added to your watch list
     *      and that person is currently online.
     *
     *  \format{"<nick> <ident> <host> <timestamp> :is online"}
     */
    const RPL_NOWON                 = 604;

    /**
     *  \brief
     *      Sent after a nick has been added to your watch list
     *      and that person is currently offline.
     *
     *  \format{"<nick> * * 0 :is offline"}
     */
    const RPL_NOWOFF                = 605;

    /**
     * \brief
     *      This numeric is sent back for every entry in your
     *      watch list when the WATCH s or WATCH S command is used.
     *
     * \format{":<nick>"}
     */
    const RPL_WATCHLIST             = 606;

    /**
     * \brief
     *      Marks the end of a WATCH command.
     *
     * \format{":End of WATCH <command>"}
     */
    const RPL_ENDOFWATCHLIST        = 607;
}

