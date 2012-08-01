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
 *      Interface for IRC(S) connections.
 *
 * This interface provides the necessary methods
 * to handle an IRC(S) connection.
 */
interface   Erebot_Interface_IrcConnection
extends     Erebot_Interface_ModuleContainer,
            Erebot_Interface_EventDispatcher,
            Erebot_Interface_SendingConnection,
            Erebot_Interface_ReceivingConnection,
            Erebot_Interface_Collated
{
    /**
     * Returns the numeric profile associated with
     * this connection.
     *
     * \retval Erebot_NumericProfile_Base
     *      The numeric profile associated with this
     *      connection.
     */
    public function getNumericProfile();

    /**
     * Sets the new numeric profile for this connection.
     *
     * \param Erebot_NumericProfile_Base $profile
     *      The new numeric profile to use for this connection.
     */
    public function setNumericProfile(Erebot_NumericProfile_Base $profile);

    /**
     * Determines if the given string is a valid channel name or not.
     * A channel name usually starts with the hash symbol (#).
     * Valid characters for the rest of the name vary between IRC networks.
     *
     * \param $chan
     *      Tentative channel name.
     *
     * \retval bool
     *      TRUE if $chan is a valid channel name, FALSE otherwise.
     *
     * \throw Erebot_InvalidValueException
     *      $chan is not a string or is empty.
     */
    public function isChannel($chan);

    /**
     * Returns the object used to produce events.
     *
     * \retval Erebot_Interface_IrcParser
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

