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

interface Erebot_Interface_Styling
{
    public function append($varname, $var, $merge = NULL);
    public function append_by_ref($varname, &$var, $merge = NULL);
    public function assign($name, $value);
    public function assign_by_ref($name, &$value);
    public function clear_all_assign();
    public function clear_assign($varname);
    public function render();
    public function get_template_vars($varname = NULL);
}

