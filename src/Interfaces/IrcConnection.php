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
 *      Interface for IRC(S) connections.
 *
 * This interface provides the necessary methods
 * to handle an IRC(S) connection.
 */
interface IrcConnection extends
    \Erebot\Interfaces\ModuleContainer,
    \Erebot\Interfaces\EventDispatcher,
    \Erebot\Interfaces\SendingConnection,
    \Erebot\Interfaces\ReceivingConnection,
    \Erebot\Interfaces\Collated
{
    /**
     * Returns the numeric profile associated with
     * this connection.
     *
     * \retval Erebot::NumericProfile::Base
     *      The numeric profile associated with this
     *      connection.
     */
    public function getNumericProfile();

    /**
     * Sets the new numeric profile for this connection.
     *
     * \param Erebot::NumericProfile::Base $profile
     *      The new numeric profile to use for this connection.
     */
    public function setNumericProfile(\Erebot\NumericProfile\Base $profile);

    /**
     * Determines if the given string is a valid channel name or not.
     * A channel name usually starts with the hash symbol (#).
     * Valid characters for the rest of the name vary between IRC networks.
     *
     * \param $chan
     *      Tentative channel name.
     *
     * \retval bool
     *      \b true if $chan is a valid channel name,
     *      \b false otherwise.
     *
     * \throw Erebot::InvalidValueException
     *      $chan is not a string or is empty.
     */
    public function isChannel($chan);

    /**
     * Returns the object used to produce events.
     *
     * \retval Erebot::Interfaces::IrcParser
     *      Object used to produce events.
     *
     * \note
     *      This method is somewhat misnamed, since
     *      in reality the object it returns does
     *      more than merely producing events—it is
     *      a full-blown IRC parser.
     */
    public function getEventsProducer();
}
