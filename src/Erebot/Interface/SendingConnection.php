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
 *      Interface for a connection that sends data.
 */
interface   Erebot_Interface_SendingConnection
extends     Erebot_Interface_Connection
{
    /**
     * Sends a single line of data from the outgoing FIFO
     * to the underlying socket.
     *
     * This method is misnamed, because it acts on a FIFO
     * rather than on raw data.
     * This method can be called multiple times (such as
     * in a loop) to send all lines in the outgoing FIFO.
     * This is done so that a throttling policy may be put
     * in place if needed (eg. for an anti-flood system).
     */
    public function write();
}
