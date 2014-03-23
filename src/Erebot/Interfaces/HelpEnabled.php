<?php
/*
    This file is part of Erebot, a modular IRC bot written in PHP.

    Copyright © 2013 François Poirotte

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
 *      Interface for a module that implements an help method.
 *
 * This interface provides an help method for Erebot's modules.
 * Such a method is called when some user requests help on the module
 * or a command provided by the bot.
 */
interface HelpEnabled
{
    /**
     * Provides help about the current module.
     *
     * \param Erebot::Interfaces::Event::Base::TextMessage $event
     *      Some help request.
     *
     * \param Erebot::Interfaces::TextWrapper $words
     *      Parameters passed with the help request.
     *      This is the same as the module's name when help is requested
     *      on the module itself (as opposed to help on a specific command
     *      provided by the module).
     *
     * \retval boolean
     *      (optional) Indicates whether the help request was handled
     *      by this method (\b true) or not (\b false). Unhandled help
     *      requests are passed to the next help method registered until
     *      either some help method handles the request or all methods
     *      have been tried with no success.
     *      If omitted, \b false is assumed.
     */
    public function getHelp(
        \Erebot\Interfaces\Event\Base\TextMessage $event,
        \Erebot\Interfaces\TextWrapper            $words
    );
}
