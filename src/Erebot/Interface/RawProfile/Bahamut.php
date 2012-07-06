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
 *      Raw profile for Bahamut servers.
 */
interface   Erebot_Interface_RawProfile_Bahamut
extends     Erebot_Interface_RawProfile_RFC2812,
            Erebot_Interface_RawProfile_NumericError,
            Erebot_Interface_RawProfile_SILENCE,
            Erebot_Interface_RawProfile_ISON,
            Erebot_Interface_RawProfile_DCCINFO
{
    /**
     * \brief
     *      Reply to a R(egexp) WHO command.
     */
    const RPL_RWHOREPLY             = 354;

    /**
     * \brief
     *      Returned to a user trying to send a message
     *      to a service without specifying the proper
     *      hostname (ie. "/msg nickserv ..." instead
     *      of "/msg nickserv@services.dal.net ...").
     *
     * \note
     *      This numeric is used in an attempt to protect
     *      users against abuse by other users changing
     *      their nick to "NickServ" etc. after a netsplit.
     *
     * \note
     *      Whether this numeric is used or not when
     *      a message is received without a hostname
     *      depends on the server's configuration.
     *
     * \format{":Error! \"/msg %s\" is no longer supported.
                Use \"/msg %s@%s\" or \"/%s\" instead."}
     */
    const ERR_MSGSERVICES           = 487;

    /**
     * \brief
     *      Returned to a user trying to send a message
     *      to a person they share no common channel with
     *      and user mode +C is enabled for that person.
     *
     * \format{":You cannot message that person because you
     *          do not share a common channel with them."}
     */
    const ERR_NOSHAREDCHAN          = 493;
}

