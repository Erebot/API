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
 *      A raw profile.
 *
 * A raw profile is just an interface that provides numeric
 * constants. The name of the constant is known as the "raw name"
 * while the value of the constant is known as the "raw numeric"
 * or "raw code".
 *
 * There is no need to provide concrete classes implementing
 * the profiles. Instead, a raw profile loader is used
 * (see Erebot_Interface_RawProfileLoader) to manage the
 * profiles.
 *
 * Each IRC connection (Erebot_Connection) has a raw profile
 * loader associated with it. To define a new profile, create
 * a new interface that extends this one and adds constants,
 * then register it through the raw profile loader associated
 * with your IRC connection.
 */
interface Erebot_Interface_RawProfile
{
}
