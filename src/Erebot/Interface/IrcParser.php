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
 *      Interface for a class that can be used
 *      to parse incoming messages from an IRC server
 *      and create events as necessary.
 */
interface Erebot_Interface_IrcParser
{
    /**
     * Returns the mapping of interface names
     * to their factory.
     *
     * \retval array
     *      Mapping of event interfaces names
     *      to their factory.
     */
    public function getEventClasses();

    /**
     * Returns the name of the class used to create
     * events for a certain interface.
     *
     * \param string $iface
     *      The name of the interface describing
     *      the type of event.
     *
     * \retval string
     *      Name of the class to use to create events
     *      for the given interface.
     *
     * \retval NULL
     *      Returned when no class has been registered yet
     *      to create events for the given interface.
     *
     * \note
     *      The name of the interface is case-insensitive.
     */
    public function getEventClass($iface);

    /**
     * Sets the mapping from event interfaces names
     * to their factory.
     *
     * \param array $events
     *      Mapping from interfaces names to their factory.
     */
    public function setEventClasses($events);

    /**
     * Sets the class to use when creating events
     * for a certain interface.
     *
     * \param string $iface
     *      Interface to associate the class with.
     *
     * \param string $cls
     *      Class to use when creating events for that interface.
     *
     * \throw Erebot_InvalidValueException
     *      The given class does not implement the given
     *      interface and therefore cannot be used as a
     *      factory.
     *
     * \note
     *      The name of the interface is case-insensitive.
     */
    public function setEventClass($iface, $cls);

    /**
     * Factory to create an event matching the given interface,
     * passing any additional parameters given to this method
     * to the constructor for that event.
     *
     * \param string $iface
     *      Name of the interface describing
     *      the type of event to create.
     *
     * \retval Erebot_Interface_Event_Base_Generic
     *      The event that was produced.
     *      This will be an instance implementing
     *      the given interface and a subclass of
     *      Erebot_Interface_Event_Base_Generic.
     *
     * \note
     *      You may pass additional parameters to this method.
     *      They will be passed as is to the event's constructor.
     */
    public function makeEvent($iface /* , ... */);

    /**
     * Parses a single message from an IRC server.
     *
     * \param string $msg
     *      A single IRC message to parse, with the
     *      trailing "\r\n" sequence already removed.
     *
     * \note
     *      Events/raws are dispatched as necessary
     *      by this method.
     */
    public function parseLine($msg);
}

