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
 *      Interface for a connection that receives data.
 */
interface ReceivingConnection extends \Erebot\Interfaces\Connection
{
    /**
     * Processes data from the incoming buffer.
     *
     * Once this method has been called, all lines awaiting
     * processing in the incoming buffer have been transferred
     * to the incoming FIFO.
     * You must call Erebot::Connection::processQueuedData()
     * after that in order to process the lines in the FIFO.
     * This is done so that a throttling policy may be put
     * in place if needed (eg. for an anti-flood system).
     */
    public function read();

    /**
     * Processes all lines in the incoming FIFO.
     * This method will dispatch the proper events
     * for each line in the FIFO.
     */
    public function process();
}
