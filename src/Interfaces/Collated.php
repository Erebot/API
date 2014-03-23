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
 *      Interface for an object that uses a collation.
 */
interface Collated
{
    /**
     * Sets the collator associated with this connection.
     *
     * \param Erebot::Interfaces::IrcCollator $collator
     *      The new collator to use.
     */
    public function setCollator(\Erebot\Interfaces\IrcCollator $collator);

    /**
     * Returns the collator associated with this connection.
     *
     * \retval Erebot::Interfaces::IrcCollator
     *      The collator currently in use for this connection.
     */
    public function getCollator();
}
