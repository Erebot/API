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
 *      Interface for a class that holds a reference
 *      to an IRC numeric.
 *
 * This class holds a reference to an IRC numeric using
 * its name (eg. "RPL_WELCOME"). The actual numeric code
 * associated with this reference may vary dynamically depending
 * on the numeric profile currently loaded for the connection.
 */
interface Erebot_Interface_NumericReference
{
    /**
     * Returns the name of the numeric
     * this object holds a reference for.
     *
     * \retval string
     *      Name of the numeric, such
     *      as "RPL_WELCOME".
     */
    public function getName();

    /**
     * Retrieve the actual numeric code
     * associated with this reference.
     *
     * \retval int
     *      Numeric code associated with this reference,
     *      such as 1 for "RPL_WELCOME".
     *
     * \note
     *      The actual value may vary depending on
     *      the current numeric profile for the
     *      connection associated with this reference.
     *      Do not use a cache for this value.
     */
    public function getValue();
}
