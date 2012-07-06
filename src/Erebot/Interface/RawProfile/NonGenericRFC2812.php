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
 *      Raw profile for numeric codes that were currently
 *      in use at the time RFC 2812 was written but were considered to be non-generic features.
 */
interface   Erebot_Interface_RawProfile_NonGenericRFC2812
extends     Erebot_Interface_RawProfile
{
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

    /// Dummy reply number. Not used.
    const RPL_NONE                  = 300;

    /**
     *  \TODO
     */
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
     *  \brief
     *      This numeric is used for every entry configured
     *      through C-lines (connect).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSCLINE            = 213;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through N-lines (accept connection).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSNLINE            = 214;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through I-lines (allow).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSILINE            = 215;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through K-lines (ban user).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSKLINE            = 216;

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
     *  \brief
     *      This numeric is used for every entry configured
     *      through Y-lines (class).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSYLINE            = 218;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through V-lines (deny version).
     *
     *  \note
     *      A deny version list is used to prevent linking
     *      to another IRC server depending on the version
     *      and compile flags for the IRCd used by that
     *      server.
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSVLINE            = 240;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through L-lines (leaf).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSLLINE            = 241;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through H-lines (hub).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSHLINE            = 244;

    /**
     *  \TODO
     */
    const RPL_STATSSLINE            = 245;

    const RPL_STATSPING             = 246;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through B-lines (bounces).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSBLINE            = 247;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through D-lines (deny link).
     *
     * \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSDLINE            = 250;

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
