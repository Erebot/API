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

namespace Erebot\Interfaces\Event\Base;

/**
 * \brief
 *      Interface for an event which has a source.
 */
interface Source extends \Erebot\Interfaces\Event\Base\Generic
{
    /**
     * Returns the source of the current message.
     * This will usually be some user's nickname
     * or the name of an IRC server.
     *
     * \retval Erebot::Interfaces::Identity
     *      The source of this message.
     */
    public function getSource();
}
