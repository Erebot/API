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
 *      An abstract Event which has a source and applies to a channel.
 */
abstract class WithChanSourceAbstract extends \Erebot\Event\AbstractEvent implements
    \Erebot\Interfaces\Event\Base\Chan,
    \Erebot\Interfaces\Event\Base\Source
{
    /// IRC channel this event relates to.
    protected $chan;

    /// Source the event originated from.
    protected $source;

    /**
     * Creates a new event dealing with an IRC
     * channel and for which a source can be
     * identified.
     *
     * \param Erebot::Interfaces::Connection $connection
     *      The connection this event came from.
     *
     * \param string $chan
     *      IRC channel this event applies to.
     *
     * \param string $source
     *      Source identified for this event.
     */
    public function __construct(
        \Erebot\Interfaces\Connection $connection,
        $chan,
        $source
    ) {
        parent::__construct($connection);
        $this->chan   = $chan;
        $this->source = new \Erebot\Identity($source);
    }

    public function getChan()
    {
        return $this->chan;
    }

    public function getSource()
    {
        return $this->source;
    }
}
