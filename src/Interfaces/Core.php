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
 *      Interface for core features.
 *
 * This interface provides the necessary methods
 * to get a basic instance of the bot running.
 */
interface Core
{
    /**
     * Returns a list of all connections handled by the bot.
     *
     * \retval array
     *      A list of connections handled by this instance,
     *      as objects implementing Erebot::Interfaces::Connection.
     *
     * \note
     *      There is not much use for this method actually. The only
     *      case where you might need it is when you're willing to
     *      broadcast a message/command to all connections (such as
     *      to signal the bot shutting down).
     */
    public function getConnections();

    /**
     * Starts the bot.
     *
     * \param Erebot::Interfaces::ConnectionFactory $factory
     *      Factory to use to create new connections.
     *
     * \attention
     *      This method does not return until the bot drops its connections.
     *      Therefore, this MUST be the last method you call in your script.
     */
    public function start(\Erebot\Interfaces\ConnectionFactory $factory);

    /**
     * Stops the bot.
     */
    public function stop();

    /**
     * Returns a list of all \link Erebot::TimerInterface timers\endlink
     * currently registered.
     *
     * \retval array
     *      A list of timers registered for this instance,
     *      as objects implementing Erebot::TimerInterface.
     */
    public function getTimers();

    /**
     * Registers a timer for this instance.
     *
     * \param Erebot::TimerInterface $timer
     *      A timer to register.
     */
    public function addTimer(\Erebot\TimerInterface $timer);

    /**
     * Unregisters a timer.
     *
     * \param Erebot::TimerInterface $timer
     *      A timer to unregister.
     */
    public function removeTimer(\Erebot\TimerInterface $timer);

    /**
     * Adds a (new) connection to the bot.
     *
     * Once a new connection has been created, use this method to add
     * it to the pool of connections the bot must process.
     * This enables the connection to send and receive messages.
     *
     * \param Erebot::Interfaces::Connection $connection
     *      Adds a connection to the list of connections handled by
     *      this instance of the bot.
     *
     * \throw Erebot::InvalidValueException
     *      This connection is already part of the connection pool
     *      handled by this instance of the bot.
     */
    public function addConnection(\Erebot\Interfaces\Connection $connection);

    /**
     * Removes a connection from the bot.
     *
     * Use this method to remove a connection from the pool of connections
     * the bot must process, such as when the connection is lost with the
     * remote IRC server.
     *
     * \param Erebot::Interfaces::Connection $connection
     *      Removes a connection from the list of connections handled by
     *      this instance of the bot.
     *
     * \throw Erebot::NotFoundException
     *      The given connection is not part of the connection pool
     *      handled by this instance of the bot.
     */
    public function removeConnection(\Erebot\Interfaces\Connection $connection);

    /**
     * Returns the translation of a message in the primary language.
     *
     * Use this method to get a translated message in the primary language.
     * That is, using the language defined in the "language" attribute of
     * the "configuration" tag in your XML configuration file.
     *
     * \param string $message
     *      The original message to translate, in english.
     *
     * \retval string
     *      The translation for this message or the original (english)
     *      message if no translation is available.
     */
    public function gettext($message);

    /**
     * Returns the number of seconds elapsed since the bot was last started.
     *
     * \retval false
     *      The bot is not running (Erebot::Interfaces::Core::start() has not
     *      been called yet).
     *
     * \retval integer
     *      The number of seconds elapsed since the was last started.
     */
    public function getRunningTime();
}
