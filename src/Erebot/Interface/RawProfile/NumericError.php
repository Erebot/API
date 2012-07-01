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
 *      Raw profile for errors related to numerics.
 */
interface   Erebot_Interface_RawProfile_NumericError
extends     Erebot_Interface_RawProfile
{
    /**
     * \brief
     *      Sent when an invalid numeric is received.
     *
     * \format{"Numeric error! yikes!"}
     * \format{"Numeric error!"}
     *
     * \note
     *      UnrealIRCd uses the shorter version,
     *      the longer one being used by Bahamut.
     *
     * \note
     *      Due to the absence of a leading ':',
     *      both messages are decoded as 3 separate
     *      tokens by IRC clients rather than a
     *      single token containing the full message.
     */
    const ERR_NUMERIC_ERR           = 999;

    /// Alias for Erebot_Interface_RawProfile_NumericError::ERR_NUMERIC_ERR
    const ERR_NUMERICERR            = 999;

    /// Alias for Erebot_Interface_RawProfile_NumericError::ERR_NUMERIC_ERR
    const ERR_LAST_ERR_MSG          = 999;
}
