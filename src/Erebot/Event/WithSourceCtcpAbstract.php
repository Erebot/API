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
 *      An abstract CTCP Event which applies to the bot
 *      and contains some text.
 */
abstract class  Erebot_Event_WithSourceCtcpAbstract
extends         Erebot_Event_WithSourceTextAbstract
implements      Erebot_Interface_Event_Base_Ctcp
{
    /// The type of CTCP message represented by this event.
    protected $_ctcpType;

    /**
     * Creates a new event representing a CTCP message.
     *
     * \param Erebot_Interface_Connection $connection
     *      The connection this event came from.
     *
     * \param string $source
     *      Source identified for this event.
     *
     * \param string $ctcpType
     *      Type of CTCP message being represented.
     *
     * \param string $text
     *      Text contained in this CTCP message.
     */
    public function __construct(
        Erebot_Interface_Connection $connection,
                                    $source,
                                    $ctcpType,
                                    $text
    )
    {
        parent::__construct($connection, $source, $text);
        $this->_ctcpType = $ctcpType;
    }

    /// \copydoc Erebot_Interface_Event_Base_Ctcp::getCtcpType()
    public function getCtcpType()
    {
        return $this->_ctcpType;
    }
}

