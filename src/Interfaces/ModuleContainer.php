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
 *      An interface for an object capable
 *      of managing modules.
 */
interface ModuleContainer
{
    /**
     * Loads a module for a specific channel or for the whole connection.
     *
     * \param string $module
     *      The name of the module to load.
     *
     * \param NULL|string $chan
     *      (optional) An IRC channel name. If given, the module will be
     *      loaded and a specific instance will be created for that
     *      $chan. Otherwise, an instance will be created that will be
     *      shared across channels on the same connection.
     *
     * \retval Erebot::Module::Base
     *      An instance of the module.
     *
     * \note
     *      Only one instance of a module is ever created for a channel
     *      or the pool of shared modules. Therefore, it is safe to call
     *      this method multiple times with the same parameters.
     *
     * \throw Erebot::InvalidValueException
     *      Thrown when invalid values are found in the (meta)data
     *      of the module.
     *
     * \throw Erebot::NotFoundException
     *      Thrown when a required dependency could not be loaded.
     *      You may want to load the required dependency and then
     *      try to load the module again.
     */
    public function loadModule($module, $chan = null);

    /**
     * Returns the modules loaded for a given channel
     * or for the whole connection.
     *
     * \param string $chan
     *      (optional) An IRC channel name. If given, both the modules
     *      which were specifically loaded for that channel and the
     *      shared modules are returned. Otherwise, only the shared
     *      modules are returned.
     *
     * \retval array
     *      A list of module instances implementing
     *      Erebot::Module::Base.
     */
    public function getModules($chan = null);

    /**
     * Returns an instance of a given module on a given channel.
     *
     * \param string $name
     *      The name of the module (ie. the name of the class
     *      implementing the feature we're interested in).
     *
     * \param string $chan
     *      (optional) An IRC channel name. If given, the bot will try
     *      to return an instance which is specific to that particular
     *      channel, before falling back to a shared instance.
     *      Otherwise, this method only looks for a shared instance.
     *
     * \param bool $autoload
     *      (optional) Whether the module should be autoloaded if it
     *      could not be found first time around (\b true) or not (\b false).
     *      The default is to autoload missing modules.
     *
     * \retval Erebot::Module::Base
     *      An instance of the given module.
     *
     * \throw Erebot::InvalidValueException
     *      Thrown when an invalid $type is passed.
     *
     * \throw Erebot::NotFoundException
     *      Thrown if no instance of the given module could be found.
     */
    public function getModule($name, $chan = null, $autoload = true);
}
