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
 *      Interface for connections.
 */
interface Connection
{
    /**
     * Returns whether this connection object
     * is currently connected to a server.
     *
     * \retval bool
     *      \b true if the connection is really connected,
     *      \b false otherwise.
     */
    public function isConnected();

    /**
     * Makes the actual connection to an IRC server,
     * using the configuration data passed to the
     * constructor.
     *
     * \throw Erebot::ConnectionFailureException
     *      Thrown whenever the bot fails to establish
     *      a connection to the given server.
     */
    public function connect();

    /**
     * Disconnects the bot from that particular IRC server.
     *
     * \param string $quitMessage
     *      (optional) A message which will be visible
     *      by other users when the bot gets disconnected.
     *      If no message is given, the IrcConnector module
     *      is probed for its "quit_message" parameter.
     *      If no message is available, the bot quits with
     *      an empty string as its quit message.
     */
    public function disconnect($quitMessage = null);

    /**
     * Retrieves the configuration for a given channel.
     *
     * \param null|string $chan
     *      The name of the IRC channel for which a configuration
     *      must be retrieved. If $chan is \b null, the configuration
     *      associated with this object is returned instead
     *      (an instance of the Erebot::Interfaces::Config::Server).
     *
     * \retval Erebot::Interfaces::Config::Channel
     *      The configuration for the given channel, if there is one.
     *
     * \retval Erebot::Interfaces::Config::Server
     *      Otherwise, the configuration for the associated IRC server.
     *
     * \throw Erebot::NotFoundException
     *      No Erebot::Interfaces::Config::Channel object exists
     *      for the given channel.
     */
    public function getConfig($chan);

    /**
     * Returns the underlying transport implementation
     * for this connection.
     *
     * \retval stream
     *      Returns this connection's socket, as a PHP stream.
     *
     * \note
     *      You generally don't need any sort of access to this
     *      stream, but it may be useful in cases where you need
     *      to do a select() on the connection.
     */
    public function getSocket();

    /**
     * Returns the bot instance this connection
     * is associated with.
     *
     * \retval Erebot::Interfaces::Core
     *      An instance of the core class (Erebot).
     */
    public function getBot();

    /**
     * Returns the object used to handle I/O (input/output)
     * with this connection.
     *
     * \note
     *      Do not use this object directly unless you know
     *      what you're doing. Instead, use the methods from
     *      the appropriate interfaces:
     *      Erebot::Interfaces::SendingConnection for writing and
     *      Erebot::Interfaces::ReceivingConnection for reading.
     */
    public function getIO();
}
