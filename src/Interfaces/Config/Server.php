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
 *      Interface for an IRC server's configuration.
 *
 * This interface provides the necessary methods
 * to represent the configuration associated with
 * some IRC server.
 */
interface Server extends \Erebot\Interfaces\Config\Proxy
{
    /**
     * Returns the URL to use to connect to this IRC server.
     *
     * \retval string
     *      This server's connection URI.
     */
    public function getConnectionURI();

    /**
     * Returns the IRC network configuration upon which this
     * IRC server configuration depends.
     *
     * \retval Erebot::Interfaces::Config::Network
     *      The network configuration associated with this server
     *      configuration.
     */
    public function getNetworkCfg();
}
