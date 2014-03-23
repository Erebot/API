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

namespace Erebot\Event;

/**
 * \brief
 *      An abstract Event containing some text.
 */
abstract class WithTextAbstract extends \Erebot\Event\AbstractEvent implements
    \Erebot\Interfaces\Event\Base\Text
{
    /// Content of this event.
    protected $text;

    /**
     * Creates a new event containing some text.
     *
     * \param Erebot::Interface::Connection $connection
     *      The connection this event came from.
     *
     * \param string $text
     *      Text contained in this event.
     */
    public function __construct(
        \Erebot\Interfaces\Connection $connection,
        $text
    ) {
        parent::__construct($connection);
        $this->text = new \Erebot\TextWrapper((string) $text);
    }

    public function getText()
    {
        return $this->text;
    }
}
