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
 *      the DCCINFO command.
 */
interface   Erebot_Interface_RawProfile_DCCINFO
extends     Erebot_Interface_RawProfile
{
    /**
     * \brief
     *      This numeric is sent to you if you try to add
     *      someone to your DCC allow list and the list
     *      is already full.
     *
     * \format{"<peer> :Your dcc allow list is full.
                Maximum size is <limit> entries"}
     */
    const ERR_TOOMANYDCC            = 514;

    /**
     * \brief
     *      This numeric is sent back to you after every command
     *      to add or remove some user from your DCC allow list.
     *
     * \note
     *      The message changes depending of the type of action
     *      that occurred (user addition or user removal).
     *
     * \format{":<peer> has been added to your DCC allow list"}
     * \format{":<peer> has been removed from your DCC allow list"}
     */
    const RPL_DCCSTATUS             = 617;

    /**
     * \brief
     *      This numeric is sent in response to a DCCALLOW LIST command
     *      for every person that is currently present in your DCC allow
     *      list.
     *
     * \format{":<peer>"}
     */
    const RPL_DCCLIST               = 618;

    /**
     * \brief
     *      Marks the end of either the DCCALLOW HELP command
     *      or the DCCALLOW LIST command.
     *
     * \format{":End of DCCALLOW help"}
     * \format{":End of DCCALLOW list"}
     */
    const RPL_ENDOFDCCLIST          = 619;

    /**
     * \brief
     *      This numeric is sent as a reply to several commands
     *      dealing with the DCCALLOW list.
     */
    const RPL_DCCINFO               = 620;
}

