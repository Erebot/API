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
 *      An abstract Event which applies to a channel,
 *      has a source, a target and even some text.
 */
abstract class WithChanSourceTargetTextAbstract extends \Erebot\Event\WithChanSourceTargetAbstract implements
    \Erebot\Interfaces\Event\Base\Text
{
    /// Content of this event.
    protected $text;

    /**
     * Creates a new event containing some text
     * and for which a source, a destination
     * (target) and a channel can be identified.
     *
     * \param Erebot::Interfaces::Connection $connection
     *      The connection this event came from.
     *
     * \param string $chan
     *      IRC channel this event applies to.
     *
     * \param string $source
     *      Source identified for this event.
     *
     * \param string $target
     *      Target identified for this event.
     *
     * \param string $text
     *      Text contained in this event.
     */
    public function __construct(
        \Erebot\Interfaces\Connection $connection,
        $chan,
        $source,
        $target,
        $text
    ) {
        parent::__construct($connection, $chan, $source, $target);
        $this->text = new \Erebot\TextWrapper((string) $text);
    }

    public function getText()
    {
        return $this->text;
    }
}
