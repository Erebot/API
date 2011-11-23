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
 *      An abstract Event which applies to a channel,
 *      has a source, a target and even some text.
 */
abstract class  Erebot_Event_WithChanSourceTargetTextAbstract
extends         Erebot_Event_WithChanSourceTargetAbstract
implements      Erebot_Interface_Event_Base_Text
{
    /// Content of this event.
    protected $_text;

    /**
     * Creates a new event containing some text
     * and for which a source, a destination
     * (target) and a channel can be identified.
     *
     * \param Erebot_Interface_Connection $connection
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
        Erebot_Interface_Connection $connection,
                                    $chan,
                                    $source,
                                    $target,
                                    $text
    )
    {
        parent::__construct($connection, $chan, $source, $target);
        $this->_text = new Erebot_TextWrapper((string) $text);
    }

    /// \copydoc Erebot_Interface_Event_Base_Text::getText()
    public function getText()
    {
        return $this->_text;
    }
}

