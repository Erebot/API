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

/**
 * \brief
 *      Abstract implementation for a callable.
 *
 * This basic implementation only forwards calls
 * to the __invoke() magic method to
 * Erebot_Interface_Callable::invokeArgs()
 * so that derived classes need not worry
 * about that.
 *
 * \note
 *      The signature of this class is compatible with the
 *      \a callable typehint introduced in PHP 5.4.0
 *      (http://svn.php.net/viewvc?view=revision&revision=315001).
 */
abstract class  Erebot_CallableAbstract
implements      Erebot_Interface_Callable
{
    /// \copydoc Erebot_Interface_Callable::__invoke()
    public function __invoke(/* ... */)
    {
        // HACK:    we use debug_backtrace() to get (and pass along)
        //          references for call_user_func_array().

        // Starting with PHP 5.4.0, it is possible to limit
        // the number of stack frames returned.
        if (version_compare(PHP_VERSION, '5.4', '>='))
            $bt = debug_backtrace(0, 1);
        // Starting with PHP 5.3.6, the first argument
        // to debug_backtrace() is a bitmask of options.
        else if (version_compare(PHP_VERSION, '5.3.6', '>='))
            $bt = debug_backtrace(0);
        else
            $bt = debug_backtrace(FALSE);

        if (isset($bt[0]['args']))
            $args =& $bt[0]['args'];
        else
            $args = array();
        return call_user_func(array($this, 'invokeArgs'), $args);
    }
}
