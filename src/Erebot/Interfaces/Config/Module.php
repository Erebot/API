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
 *      Interface for a module's configuration.
 *
 * This interface provides the necessary methods
 * to represent the configuration associated with
 * a module.
 */
interface Module
{
    /**
     * Gets/sets the active flag on this module.
     *
     * \param null|bool $active
     *      An optional parameter which can be used to change the
     *      value of the active flag for this module.
     *
     * \retval bool
     *      The value of the active flag as it was before
     *      this method was called.
     *
     * \throw Erebot::InvalidValueException
     *      The new value for the active flag is not a valid boolean
     *      value.
     */
    public function isActive($active = null);

    /**
     * Returns the name of this module.
     *
     * \retval string
     *      The name of the module represented by this module configuration.
     */
    public function getName();

    /**
     * Returns the value for the given parameter.
     *
     * \param string $param
     *      The name of the parameter we are interested in.
     *
     * \retval string
     *      The value of the parameter.
     *
     * \throw Erebot::InvalidValueException
     *      The $param argument was not a valid parameter name.
     *
     * \throw Erebot::NotFoundException
     *      There was no parameter with this name defined in the
     *      configuration file.
     */
    public function getParam($param);

    /**
     * Returns the names of the parameters for this module.
     *
     * \retval array
     *      A list with the names (as strings) of the parameters
     *      configured for this module.
     */
    public function getParamsNames();
}
