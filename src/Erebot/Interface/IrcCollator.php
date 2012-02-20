<?php
/*
    This file is part of Erebot.

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
 *      Interface for a class handling an IRC collation.
 *
 * An IRC collation is used to compare different
 * IRC objets, eg. two IRC nicknames, in order to
 * find out whether they refer to the same thing
 * or not.
 */
interface Erebot_Interface_IrcCollator
{
    /**
     * Compares two string in a case-insensitive fashion
     * (like strcasecmp).
     *
     * \param $a
     *      First string to compare.
     *
     * \param $b
     *      Second string to compare.
     *
     * \retval int
     *      An integer less than, equal to or greater than zero if
     *      $a is found, respectively, to be less than, to match,
     *      or be greater than $b.
     */
    public function compare($a, $b);

    /**
     * Compares two string in a case-insensitive fashion
     * up to a given length (like strncasecmp).
     *
     * \param $a
     *      First string to compare.
     *
     * \param $b
     *      Second string to compare.
     *
     * \param $len
     *      Limit the comparison to only the first $len bytes
     *      of each string.
     *
     * \retval int
     *      An integer less than, equal to or greater than zero if
     *      the first $len bytes of $a are found, respectively,
     *      to be less than, to match, or be greater than the first
     *      $len bytes of $b.
     */
    public function limitedCompare($a, $b, $len);

    /**
     * Normalize (canonicalize) some IRC nickname.
     *
     * This method can be used to compare two IRC nicknames like this:
     * \code
     *      if ($conn->normalizeNick($nick1) == $conn->normalizeNick($nick2)) {
     *          // The two nicknames are considered equal.
     *      }
     * \endcode
     *
     * \param string $nick
     *      The nickname to canonicalize.
     *
     * \retval string
     *      A canonical representation of the nickname.
     *
     * \warning
     *      Make sure you use the same collation when comparing
     *      two nicknames or the result may be unpredictable.
     */
    public function normalizeNick($nick);
}

