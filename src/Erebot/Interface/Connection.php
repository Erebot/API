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
 *      Interface for IRC(S) connections.
 *
 * This interface provides the necessary methods
 * to handle an IRC(S) connection.
 */
interface Erebot_Interface_Connection
{
    /**
     * Returns whether this connection object
     * is currently connected to a server.
     *
     * \retval bool
     *      TRUE if the connection is really connected,
     *      FALSE otherwise.
     */
    public function isConnected();

    /**
     * Makes the actual connection to an IRC server,
     * using the configuration data passed to the
     * constructor.
     *
     * \throw Erebot_ConnectionFailureException
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
    public function disconnect($quitMessage = NULL);

    /**
     * Retrieves the configuration for a given channel.
     *
     * \param NULL|string $chan
     *      The name of the IRC channel for which a configuration
     *      must be retrieved. If $chan is NULL, the configuration
     *      associated with this object is returned instead
     *      (an instance of the Erebot_Interface_Config_Server).
     *
     * \retval Erebot_Interface_Config_Channel
     *      The configuration for the given channel, if there is one.
     *
     * \retval Erebot_Interface_Config_Server
     *      Otherwise, the configuration for the associated IRC server.
     *
     * \throw Erebot_NotFoundException
     *      No Erebot_Interface_Config_Channel object exists
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
     * \retval Erebot_Interface_Core
     *      An instance of the core class (Erebot).
     */
    public function getBot();

    /**
     * Sets the collator associated with this connection.
     *
     * \param Erebot_Interface_IrcCollator $collator
     *      The new collator to use.
     */
    public function setCollator(Erebot_Interface_IrcCollator $collator);

    /**
     * Returns the collator associated with this connection.
     *
     * \retval Erebot_Interface_IrcCollator
     *      The collator currently in use for this connection.
     */
    public function getCollator();
}

