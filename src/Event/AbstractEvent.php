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

namespace Erebot\Event;

/**
 * \brief
 *      An abstract Event.
 */
abstract class AbstractEvent implements \Erebot\Interfaces\Event\Base\Generic
{
    /// @TODO add support for these events or remove them...
#    const ON_CHAT           = 30;
#    const ON_CONNECTFAIL    = 50;
#    const ON_DCCSERVER      = 80;
#    const ON_ERROR          = 130;
#    const ON_FILERCVD       = 150;
#    const ON_FILESENT       = 160;
#    const ON_GETFAIL        = 170;
#    const ON_MODE           = 240;  // *
#    const ON_NOSOUND        = 260;
#    const ON_SENDFAIL       = 350;
#    const ON_SERV           = 360;
#    const ON_SERVERMODE     = 370;
#    const ON_SERVEROP       = 380;
#    const ON_SNOTICE        = 390;
#    const ON_WALLOPS        = 440;

    /// Whether the default action should be prevented or not.
    protected $halt;

    /// Connection the event originated from.
    protected $connection;

    /**
     * Constructs a new event.
     *
     * \param Erebot::Interfaces::Connection $connection
     *      Connection the event originated from.
     *      This can be used later on by event handlers
     *      to interact with the connection.
     */
    public function __construct(\Erebot\Interfaces\Connection $connection)
    {
        $this->halt         = false;
        $this->connection   = $connection;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function preventDefault($prevent = null)
    {
        $res = $this->halt;
        if ($prevent !== null) {
            if (!is_bool($prevent)) {
                throw new \Erebot\InvalidValueException('Bad prevention value');
            }

            $this->halt = $prevent;
        }
        return $res;
    }
}
