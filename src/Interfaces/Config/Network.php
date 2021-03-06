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

namespace Erebot\Interfaces\Config;

/**
 * \brief
 *      Interface for an IRC network's configuration.
 *
 * This interface provides the necessary methods
 * to represent the configuration associated with
 * some IRC network.
 */
interface Network extends \Erebot\Interfaces\Config\Proxy
{
    /**
     * Returns the name of this IRC network.
     *
     * \retval string
     *      The name of this IRC network.
     */
    public function getName();

    /**
     * Returns the configuration object for a particular IRC server.
     *
     * \param string $server
     *      The name of the IRC server whose configuration we're interested in.
     *
     * \retval Erebot::Interfaces::Config::Server
     *      The configuration object for that server.
     *
     * \throw Erebot::NotFoundException
     *      No such server has been configured on this IRC network.
     */
    public function getServerCfg($server);

    /**
     * Returns all IRC server configurations.
     *
     * \retval array
     *      A list of all server configuration instances
     *      stored by this network configuration, as objects
     *      implementing Erebot::Interfaces::Config::Server.
     */
    public function getServers();

    /**
     * Returns the configuration object for a particular IRC channel.
     *
     * \param string $channel
     *      The name of the IRC channel whose configuration
     *      we're interested in.
     *
     * \retval Erebot::Interfaces::Config::Channel
     *      The configuration object for that channel.
     *
     * \throw Erebot::NotFoundException
     *      No such channel has been configured on this IRC network.
     */
    public function getChannelCfg($channel);

    /**
     * Returns all IRC channel configurations.
     *
     * \retval array
     *      A list of all channel configuration instances
     *      stored by this network configuration, as objects
     *      implementing Erebot::Interfaces::Config::Channel.
     */
    public function getChannels();
}
