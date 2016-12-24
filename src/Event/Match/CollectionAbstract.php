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

namespace Erebot\Event\Match;

/**
 * \brief
 *      Abstract class for a filter which groups
 *      several (sub-)filters together.
 *
 * This abstract class also implements the ArrayAccess & Countable
 * interfaces, so that you may count() the number of subfilters
 * associated with it and/or get/set those subfilters using the usual
 * array notation.
 */
abstract class CollectionAbstract implements
    \Erebot\Interfaces\Event\Match,
    \ArrayAccess,
    \Countable
{
    /// Subfilters of this filter.
    protected $submatchers;

    /**
     * Creates a new instance of this filter.
     *
     * \note
     *      You may pass instances that implement the
     *      Erebot::Interfaces::Event::Match interface as
     *      initial subfilters of this filter.
     */
    public function __construct()
    {
        $args = func_get_args();
        foreach ($args as $arg) {
            if (!($arg instanceof \Erebot\Interfaces\Event\Match)) {
                throw new \Erebot\InvalidValueException('Not a valid matcher');
            }
        }
        $this->submatchers = $args;
    }

    /// \copydoc Countable::count
    public function count()
    {
        return count($this->submatchers);
    }

    /// \copydoc ArrayAccess::offsetExists
    public function offsetExists($offset)
    {
        return isset($this->submatchers[$offset]);
    }

    /// \copydoc ArrayAccess::offsetGet
    public function offsetGet($offset)
    {
        return $this->submatchers[$offset];
    }

    /// \copydoc ArrayAccess::offsetSet
    public function offsetSet($offset, $value)
    {
        if (!($value instanceof \Erebot\Interfaces\Event\Match)) {
            throw new \Erebot\InvalidValueException('Not a valid matcher');
        }
        $this->submatchers[$offset] = $value;
    }

    /// \copydoc ArrayAccess::offsetUnset()
    public function offsetUnset($offset)
    {
        unset($this->submatchers[$offset]);
    }

    /**
     * Adds one or more subfilters to this filter.
     *
     * \retval Erebot::Event::Match::CollectionAbstract
     *      Returns this instance, so that multiple called
     *      to Erebot::Event::Match::CollectionAbstract::add()
     *      can be chained up together.
     *
     * \note
     *      You can pass one or more filters to this method
     *      to add them to this filter's subfilters.
     *
     * \note
     *      Duplicates of the same subfilter are silently ignored.
     */
    public function & add()
    {
        $filters = func_get_args();
        foreach ($filters as $filter) {
            if (!($filter instanceof \Erebot\Interfaces\Event\Match)) {
                throw new \Erebot\InvalidValueException('Not a valid matcher');
            }
            if (!in_array($filter, $this->submatchers, true)) {
                $this->submatchers[] = $filter;
            }
        }
        return $this;
    }

    /**
     * Removes one or more subfilters from this filter.
     *
     * \retval Erebot::Event::Match::CollectionAbstract
     *      Returns this instance, so that multiple called
     *      to Erebot::Event::Match::CollectionAbstract::remove()
     *      can be chained up together.
     *
     * \note
     *      You can pass one or more filters to this method
     *      to remove them from this filter's subfilters.
     *
     * \note
     *      Attempts to remove a filter which is not a
     *      subfilter of this one are silently ignored.
     */
    public function & remove()
    {
        $filters = func_get_args();
        foreach ($filters as $filter) {
            if (!($filter instanceof \Erebot\Interfaces\Event\Match)) {
                throw new \Erebot\InvalidValueException('Not a valid matcher');
            }
            $key = array_search($filter, $this->submatchers, true);
            if ($key !== false) {
                unset($this->submatchers[$key]);
            }
        }
        return $this;
    }
}
