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

/**
 * \brief
 *      Interface for the "ServerCapabilities" event.
 *
 * \note
 *      This event is special in the sense that Erebot's
 *      core does not emit it. Instead, a module is required
 *      (Erebot_Module_ServerCapabilities) to receive such
 *      an event.
 */
interface   Erebot_Interface_Event_ServerCapabilities
extends     Erebot_Interface_Event_Base_Generic
{
    /**
     * Returns the module associated with this event.
     *
     * \retval Erebot_Module_ServerCapabilities
     *      The module associated with this event.
     *      It can be used to determine what the
     *      current IRC server is capable of.
     */
    public function getModule();
}

