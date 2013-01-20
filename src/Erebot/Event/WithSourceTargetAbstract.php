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
 *      An abstract Event with a source and a target.
 */
abstract class  Erebot_Event_WithSourceTargetAbstract
extends         Erebot_Event_Abstract
implements      Erebot_Interface_Event_Base_Source,
                Erebot_Interface_Event_Base_Target
{
    /// Source the event originated from.
    protected $_source;
    /// Target of the event (usually the bot).
    protected $_target;

    /**
     * Creates a new event for which a source
     *  and a destination (target) can be identified.
     *
     * \param Erebot_Interface_Connection $connection
     *      The connection this event came from.
     *
     * \param string $source
     *      Source identified for this event.
     *
     * \param string $target
     *      Target identified for this event.
     */
    public function __construct(
        Erebot_Interface_Connection $connection,
                                    $source,
                                    $target
    )
    {
        parent::__construct($connection);
        $this->_source = new Erebot_Identity($source);
        $this->_target = $target;
    }

    /// \copydoc Erebot_Interface_Event_Base_Source::getSource()
    public function getSource()
    {
        return $this->_source;
    }

    /// \copydoc Erebot_Interface_Event_Base_Target::getTarget()
    public function getTarget()
    {
        return $this->_target;
    }
}

