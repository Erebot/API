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
 *      An abstract Event for WATCH list notifications.
 */
abstract class NotificationAbstract extends \Erebot\Event\WithSourceTextAbstract
{
    /// Timestamp the notification was issued at.
    protected $timestamp;

    /**
     * Constructs a new event related to a notification.
     *
     * \param Erebot::Interfaces::Connection $connection
     *      Connection the event originated from.
     *
     * \param string $source
     *      Nickname of the IRC user this notification is about.
     *
     * \param string $ident
     *      Identity of the IRC user this notification is about.
     *
     * \param string $host
     *      Hostname of the IRC user this notification is about.
     *
     * \param DateTime $timestamp
     *      Object that keeps track of when the notification
     *      was issued.
     *
     * \param string $text
     *      Message explaining why the notification was triggered.
     */
    public function __construct(
        \Erebot\Interfaces\Connection $connection,
        $source,
        $ident,
        $host,
        \DateTime $timestamp,
        $text
    ) {
        if ($ident !== null && $host !== null) {
            $source .= '!'.$ident.'@'.$host;
        }
        parent::__construct($connection, $source, $text);
        $this->timestamp = $timestamp;
    }

    /**
     * Returns the timestamp at which the notification
     * was issued.
     *
     * \retval DateTime
     *      Timestamp of the notification.
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
}
