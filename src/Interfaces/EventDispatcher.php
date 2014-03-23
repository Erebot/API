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
 *      Interface for a class that can
 *      dispatch events to event handlers.
 */
interface EventDispatcher
{
    /**
     * Registers a numeric handler on this connection.
     *
     * \param Erebot::Interfaces::NumericHandler $handler
     *      The handler to register.
     */
    public function addNumericHandler(\Erebot\Interfaces\NumericHandler $handler);

    /**
     * Unregisters a numeric handler on this connection.
     *
     * \param Erebot::Interfaces::NumericHandler $handler
     *      The handler to unregister.
     *
     * \throw Erebot::NotFoundException
     *      Thrown when the given handler could not be found,
     *      such as when it was not registered on this connection.
     */
    public function removeNumericHandler(\Erebot\Interfaces\NumericHandler $handler);

    /**
     * Registers an event handler on this connection.
     *
     * \param Erebot::Interfaces::EventHandler $handler
     *      The handler to register.
     */
    public function addEventHandler(\Erebot\Interfaces\EventHandler $handler);

    /**
     * Unregisters an event handler on this connection.
     *
     * \param Erebot::Interfaces::EventHandler $handler
     *      The handler to unregister.
     *
     * \throw Erebot::NotFoundException
     *      Thrown when the given handler could not be found,
     *      such as when it was not registered on this connection.
     */
    public function removeEventHandler(\Erebot\Interfaces\EventHandler $handler);

    /**
     * Dispatches the given event to handlers
     * which have been registered for this type of event.
     *
     * \param Erebot::Interfaces::Event::Base::Generic $event
     *      An event to dispatch.
     *
     * \note
     *      For the purposes of this method, numeric messages (objects
     *      implementing the Erebot::Interfaces::Event::Numeric interface)
     *      are considered "events" too.
     */
    public function dispatch(\Erebot\Interfaces\Event\Base\Generic $event);
}
