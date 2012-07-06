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
 *      the RULES command.
 */
interface   Erebot_Interface_RawProfile_RULES
extends     Erebot_Interface_RawProfile
{
    /**
     * \brief
     *      This numeric is sent to you for every
     *      rule in use on this server.
     *
     * \format{":- <rule>"}
     */
    const RPL_RULES                 = 232;

    /**
     * \brief
     *      Marks the start of the server rules.
     *
     * \format{":- <server> Server Rules - "}
     */
    const RPL_RULESTART             = 308;

    /// Alias for Erebot_Interface_RawProfile_RULES::RPL_RULESTART.
    const RPL_RULESSTART            = 'RPL_RULESTART';

    /**
     * \brief
     *      Marks the end of the server rules.
     *
     * \format{":End of RULES command."}
     */
    const RPL_ENDOFRULES            = 309;

    /// Alias for Erebot_Interface_RawProfile_RULES::RPL_ENDOFRULES.
    const RPL_RULESEND              = 'RPL_ENDOFRULES';

    /**
     * \brief
     *      Sent to indicate that the server does not
     *      have any rules defined.
     *
     * \format{":RULES File is missing"}
     */
    const ERR_NORULES               = 434;
}

