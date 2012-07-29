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
 *      Interface for numeric message handlers.
 *
 * This interface provides the necessary methods to handle
 * a numeric message from an IRC server.
 */
interface Erebot_Interface_NumericHandler
{
    /**
     * Sets the numeric code associated with this handler.
     *
     * \param int|Erebot_NumericReference $numeric
     *      New numeric code to assign to this handler,
     *      or a reference to it.
     */
    public function setNumeric($numeric);

    /**
     * Returns the numeric code associated with this handler.
     *
     * \retval int|Erebot_NumericReference
     *      The numeric code for this handler,
     *      or a reference to it.
     */
    public function getNumeric();

    /**
     * Sets the callback function/method associated with
     * this handler.
     *
     * \param Erebot_Interface_Callable $callback
     *      New callable associated with this handler.
     */
    public function setCallback(Erebot_Interface_Callable $callback);

    /**
     * Returns the callback function/method associated with
     * this handler.
     *
     * \retval callback
     *      The callback for this handler.
     */
    public function getCallback();

    /**
     * Given a numeric message, this methods tries to handle it.
     *
     * \param Erebot_Interface_Event_Numeric $numeric
     *      The numeric message to try to handle.
     *
     * \note
     *      It is the implementation's duty to make any appropriate
     *      checks on the message and take any action depending on
     *      the result of those checks.
     */
    public function handleNumeric(Erebot_Interface_Event_Numeric $numeric);
}

