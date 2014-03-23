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
 *      Abstract filter that matches events based on their content (text).
 *
 * Subclasses must provide the logic for the matching algorithm
 * by overriding the _match() method.
 */
abstract class TextAbstract implements \Erebot\Interfaces\Event\Match
{
    /// Pattern used in comparisons, as a string.
    protected $pattern;

    /// Boolean or null indicating whether a prefix is required or not.
    protected $requirePrefix;

    /**
     * Creates a new instance of this filter.
     *
     * \param string $pattern
     *      Pattern to use in text comparisons.
     *
     * \param bool|null $requirePrefix
     *      (optional) Whether a prefix will be required (\b true),
     *      allowed (\b null) or disallowed (\b false).
     *      The default is to prohibit the use of a prefix.
     *
     * \throw Erebot::InvalidValueException
     *      The given value for $pattern or $requirePrefix is invalid.
     */
    public function __construct($pattern, $requirePrefix = false)
    {
        $this->setPattern($pattern);
        $this->setPrefixRequirement($requirePrefix);
    }

    /**
     * Returns the pattern associated with this filter.
     *
     * \retval string
     *      Pattern associated with this filter.
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * Sets the pattern associated with this filter.
     *
     * \param string $pattern
     *      Pattern to use in text comparisons.
     *
     * \throw Erebot::InvalidValueException
     *      The given value for $pattern is invalid.
     */
    public function setPattern($pattern)
    {
        if (!\Erebot\Utils::stringifiable($pattern)) {
            throw new \Erebot\InvalidValueException('Pattern must be a string');
        }

        $this->pattern = $pattern;
    }

    /**
     * Returns the prefix requirement constraint for this filter.
     *
     * \retval bool|null
     *      Either \b true if a prefix is required,
     *      \b null if a prefix is allowed,
     *      \b false if a prefix is disallowed.
     */
    public function getPrefixRequirement()
    {
        return $this->requirePrefix;
    }

    /**
     * Sets the constraint on prefix requirement.
     *
     * \param bool|null $requirePrefix
     *      (optional) Whether a prefix will be required (\b true),
     *      allowed (\b null) or disallowed (\b false).
     *      The default is to prohibit the use of a prefix.
     *
     * \throw Erebot::InvalidValueException
     *      The given value for $requirePrefix is invalid.
     */
    public function setPrefixRequirement($requirePrefix = false)
    {
        if ($requirePrefix !== null && !is_bool($requirePrefix)) {
            throw new \Erebot\InvalidValueException(
                '$requirePrefix must be a boolean or null'
            );
        }

        $this->requirePrefix = $requirePrefix;
    }

    public function match(\Erebot\Interfaces\Event\Base\Generic $event)
    {
        if (!($event instanceof \Erebot\Interfaces\Event\Base\Text)) {
            return false;
        }

        $prefix = $event
            ->getConnection()->getConfig(null)
            ->getMainCfg()->getCommandsPrefix();

        $result = $this->realMatch($prefix, $event->getText());
        if (!is_bool($result)) {
            throw new \Erebot\InvalidValueException('Invalid return value');
        }
        return $result;
    }

    /**
     * Actual method used to make the comparison against
     * the incoming event. This method is passed the contents
     * of the event and may use the values of the $_pattern
     * and $_requirePrefix instance attributes to make the
     * comparison.
     *
     * \param string $prefix
     *      Current prefix for commands, as defined
     *      in the configuration file.
     *
     * \param string $text
     *      Content of the incoming event.
     *
     * \retval bool
     *      \b true if the event's content passes the filter,
     *      \b false otherwise.
     */
    abstract protected function realMatch($prefix, $text);
}
