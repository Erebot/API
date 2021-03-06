<?php
/*
    This file is part of Erebot, a modular IRC bot written in PHP.

    Copyright © 2010 François Poirotte

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

namespace Erebot\Interfaces;

/**
 * \brief
 *      Interface used to implement a rate-limit on the number
 *      of messages the bot may send to any IRC server.
 */
interface RateLimiter
{
    /**
     * Decides whether a message can be sent or not,
     * using whatever strategy deemed useful.
     * Classes implementing this interface are responsible
     * for keeping track of the measurements required for
     * their proper functioning.
     *
     * \retval bool
     *      \b true if the message can be sent,
     *      \b false otherwise.
     *
     * \note
     *      If an exception is thrown by this method,
     *      an implicit return value of \b true may be
     *      assumed by its caller to avoid deadlocks.
     */
    public function canSend();
}
