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
 *      A raw profile for the bounce/redirection mechanism
 *      proposed in RFC 2812.
 *
 * \note
 *      The codes defined here are the newly adopted ones,
 *      as those proposed in the RFC conflicted with other
 *      common usages (namely, the RPL_ISUPPORT event).
 *
 * \see
 *      Erebot_Interface_RawProfile_ConflictingRFC2812
 *      for the original (conflicting) codes.
 */
interface   Erebot_Interface_RawProfile_Bounce
extends     Erebot_Interface_RawProfile
{
    /**
     * \brief
     *      Sent during connection to point the connecting user
     *      to another server that may be used to reduce lag.
     *
     * \format{"<server> <port> :Please use this Server/Port instead"}
     *
     * \note
     *      This raw is defined as numeric 005 by RFC 2812,
     *      but this usage is widely ignored by existing
     *      implementations as it conflicts with the definition
     *      of Erebot_Interface_RawProfile_005::RPL_ISUPPORT.
     */
    const RPL_BOUNCE                =  10;

    /// Alias for Erebot_Interface_RawProfile_Bounce::RPL_BOUNCE.
    const RPL_REDIR                 =  'RPL_BOUNCE';
}

