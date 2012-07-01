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
     * Returns the raw profile loader associated with
     * this connection.
     *
     * \retval Erebot_Interface_RawProfileLoader
     *      The raw profile loader associated with this
     *      connection.
     */
    public function getRawProfileLoader();

    /**
     * Sets the new raw profile loader to use for this
     * connection.
     *
     * \param Erebot_Interface_RawProfileLoader $loader
     *      New raw profile loader to use for this
     *      connection.
     */
    public function setRawProfileLoader(
        Erebot_Interface_RawProfileLoader $loader
    );

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
}

