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
 *      Interface for a raw profile loader.
 *
 * A raw profile loader is an object capable of registering
 * raw profiles (see Erebot_Interface_RawProfile).
 * Once profiles have been registered with it,
 * Erebot_Interface_RawProfileLoader::getRawByName() can be
 * used to look for a raw numeric in the profiles currently
 * loaded given its name.
 */
interface   Erebot_Interface_RawProfileLoader
extends     ArrayAccess,
            Countable
{
    /**
     * Sets the profiles associated with this loader.
     *
     * \param mixed $profiles
     *      Either a single profile or an array of profiles
     *      to load. A profile can be expressed using either
     *      the name of the class/interface where it resides
     *      (as a string) or by passing an instance of the
     *      profile's class (as an object).
     */
    public function setProfiles($profiles = array());

    /**
     * Returns the names of the profiles currently loaded.
     *
     * \retval array
     *      Array of strings. Each string is the name of
     *      a profile (usually an interface name) currently
     *      registered with this loader.
     */
    public function getProfiles();

    /**
     * Looks for the raw numeric associated with
     * a given raw name.
     *
     * \param string $rawName
     *      Name of the raw whose numeric code
     *      we're interested in (eg. "RPL_WELCOME").
     *
     * \retval mixed
     *      Either an integer if the raw could be found
     *      in the registered profiles or NULL otherwise.
     *
     * \throw Erebot_InvalidValueException
     *      The given $rawName is not a valid raw name.
     *
     * \note
     *      This method does the lookup in reverse
     *      registration order. That is, profiles that
     *      have been registered last will be checked
     *      first.
     */
    public function getRawByName($rawName);
