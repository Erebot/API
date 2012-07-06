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
 *      A raw profile containing the "reserved" codes
 *      defined in RFC 1459.
 */
interface   Erebot_Interface_RawProfile_ReservedRFC1459
extends     Erebot_Interface_RawProfile
{
    /**
     *  \brief
     *      Used when tracing connections to give information
     *      on a class of connections.
     *
     *  \format{"Class <class> <count>"}
     */
    const RPL_TRACECLASS            = 209;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through Q-lines (ban nick).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSQLINE            = 217;

    /**
     *  \TODO
     */
    const RPL_SERVICEINFO           = 231;

    /**
     *  \TODO
     */
    const RPL_ENDOFSERVICES         = 232;

    /**
     *  \TODO
     */
    const RPL_SERVICE               = 233;

    /**
     *  \brief
     *      When listing services in reply to a SERVLIST message,
     *      a separate RPL_SERVLIST is sent for each service.
     *
     *  \format{"<name> <server> <mask> <type> <hopcount> <info>"}
     */
    const RPL_SERVLIST              = 234;

    /**
     *  \brief
     *      Marks the end of the list of services,
     *      sent in response to a SERVLIST message.
     *
     *  \format{"<mask> <type> :End of service listing"}
     */
    const RPL_SERVLISTEND           = 235;

    const RPL_WHOISCHANOP           = 316;

    /**
     *  \TODO
     */
    const RPL_KILLDONE              = 361;


    /**
     *  \TODO
     */
    const RPL_CLOSING               = 362;

    /**
     *  \TODO
     */
    const RPL_CLOSEEND              = 363;


    /**
     *  \TODO
     */
    const RPL_INFOSTART             = 373;

    /**
     *  \TODO
     */
    const RPL_MYPORTIS              = 384;


    /**
     * \brief
     *      Sent by a server to a user to inform him/her
     *      that access to the server will soon be denied.
     *
     * \format{""}
     */
    const ERR_YOUWILLBEBANNED       = 466;

    /**
     * \brief
     *      This numeric is sent back to you if you specify
     *      an invalid mask for a channel.
     *
     * \format{"<chan mask> :Bad Channel Mask"}
     */
    const ERR_BADCHANMASK           = 476;

    /**
     * \brief
     *      This numeric is not used anymore.
     *
     * \note
     *      InspIRCd defines numeric 492 as ERR_NOCTCPALLOWED.
     *
     * \see Erebot_Interface_RawProfile_InspIRCd::ERR_NOCTCPALLOWED.
     */
    const ERR_NOSERVICEHOST         = 492;
}
