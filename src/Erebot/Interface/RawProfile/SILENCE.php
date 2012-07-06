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
 *      Raw profile for servers that support
 *      the SILENCE command.
 */
interface   Erebot_Interface_RawProfile_SILENCE
extends     Erebot_Interface_RawProfile
{
    /**
     * \brief
     *      This numeric is sent in reply to a SILENCE
     *      command with no argument for each entry in
     *      your silence list.
     *
     * \format{"<mask>"}
     */
    const RPL_SILELIST              = 271;

    /**
     * \brief
     *      Marks the end of the silence list.
     *
     * \format{":End of Silence List"}
     */
    const RPL_ENDOFSILELIST         = 272;

    /**
     * \brief
     *      This error is sent back when you try to add
     *      someone to your silence list and the list is
     *      already full.
     *
     * \format{"<mask> :Your silence list is full"}
     */
    const ERR_SILELISTFULL          = 511;
}

