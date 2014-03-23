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
 *      Interface for event handlers.
 *
 * This interface provides the necessary methods to represent
 * a structure capable of handling events from an IRC server.
 */
interface EventHandler
{
    /**
     * Sets the callback associated with this handler.
     *
     * \param ::Erebot::CallableWrapper::CallableInterface $callback
     *      This callable object will be called
     *      whenever an event is received that
     *      matches the criteria set by this event
     *      handler's filter.
     */
    public function setCallback(\Erebot\CallableWrapper\CallableInterface $callback);

    /**
     * Returns a reference to the callback which was associated
     * with this handler during construction.
     *
     * \retval callback
     *      The callback associated with this handler.
     */
    public function getCallback();

    /**
     * Sets the filter associated with this event handler.
     *
     * \param ::Erebot::Interfaces::Event::Match $filter
     *      (optional) The new filter associated with this event handler.
     *      Its criterion must sucessfully match the contents of
     *      an event for that event to trigger this event handler's
     *      callback.
     */
    public function setFilter(\Erebot\Interfaces\Event\Match $filter = null);

    /**
     * Returns the filter currently associated with this event handler.
     *
     * \retval ::Erebot::Interfaces::Event::Match
     *      The current filter associated with this event handler,
     *      or NULL if no filter has been set yet.
     */
    public function getFilter();

    /**
     * Given an event, this method does its best to handler it.
     *
     * \param ::Erebot::Interfaces::Event::Base::Generic $event
     *      An event to try to handle.
     *
     * \note
     *      It is this method's responsability to make appropriate
     *      checks and act upon the result of those checks.
     *      It may for example check that the event matches the
     *      filters (on type, target and/or content) associated
     *      with the handler.
     */
    public function handleEvent(\Erebot\Interfaces\Event\Base\Generic $event);
}
