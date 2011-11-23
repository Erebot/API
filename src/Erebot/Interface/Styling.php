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
 *      Interface for styling (formatting) capabilities.
 *
 *  This interface provides constants to format messages
 *  before they can be sent.
 *
 *  Most of the interface is the same as what the Smarty
 *  templating engine uses, so if you're familiar with
 *  Smarty, you should have no problem using it.
 */
interface Erebot_Interface_Styling
{
    // Control codes.

    /// Mark the following text as being bold.
    const CODE_BOLD         = "\002";
    /// Change the color of the following text.
    const CODE_COLOR        = "\003";
    /// Reset the styles.
    const CODE_RESET        = "\017";
    /// Swao the foreground & background colors.
    const CODE_REVERSE      = "\026";
    /// Underline the text that follows.
    const CODE_UNDERLINE    = "\037";


    // mIRC/PIRCH colors.

    /// White.
    const COLOR_WHITE       = 0;
    /// Black.
    const COLOR_BLACK       = 1;
    /// Blue.
    const COLOR_BLUE        = 2;
    /// Alias for Erebot_Styling::COLOR_NAVY_BLUE.
    const COLOR_NAVY_BLUE   = 2;
    /// Alias for Erebot_Styling::COLOR_DARK_BLUE.
    const COLOR_DARK_BLUE   = 2;
    /// Green.
    const COLOR_GREEN       = 3;
    /// Alias for Erebot_Styling::COLOR_DARK_GREEN.
    const COLOR_DARK_GREEN  = 3;
    /// Red.
    const COLOR_RED         = 4;
    /// Brown.
    const COLOR_BROWN       = 5;
    /// Purple.
    const COLOR_PURPLE      = 6;
    /// Orange.
    const COLOR_ORANGE      = 7;
    /// Alias for Erebot_Styling::COLOR_ORANGE (sounds odd, doesn't it?).
    const COLOR_OLIVE       = 7;
    /// Yellow.
    const COLOR_YELLOW      = 8;
    /// Light green.
    const COLOR_LIGHT_GREEN = 9;
    /// Alias for Erebot_Styling::COLOR_LIGHT_GREEN.
    const COLOR_LIME_GREEN  = 9;
    /// Cyan.
    const COLOR_CYAN        = 10;
    /// Alias for Erebot_Styling::COLOR_CYAN.
    const COLOR_TEAL        = 10;
    /// Alias for Erebot_Styling::COLOR_CYAN.
    const COLOR_DARK_CYAN   = 10;
    /// Light cyan.
    const COLOR_LIGHT_CYAN  = 11;
    /// Alias for Erebot_Styling::COLOR_LIGHT_CYAN.
    const COLOR_AQUA_LIGHT  = 11;
    /// Light blue.
    const COLOR_LIGHT_BLUE  = 12;
    /// Alias for Erebot_Styling::COLOR_LIGHT_BLUE.
    const COLOR_ROYAL_BLUE  = 12;
    /// Pink.
    const COLOR_PINK        = 13;
    /// Alias for Erebot_Styling::COLOR_HOT_PINK.
    const COLOR_HOT_PINK    = 13;
    /// Gray.
    const COLOR_GRAY        = 14;
    /// Alias for Erebot_Styling::COLOR_GRAY.
    const COLOR_GREY        = 14;
    /// Alias for Erebot_Styling::COLOR_GRAY.
    const COLOR_DARK_GRAY   = 14;
    /// Alias for Erebot_Styling::COLOR_GRAY.
    const COLOR_DARK_GREY   = 14;
    /// Light gray.
    const COLOR_LIGHT_GRAY  = 15;
    /// Alias for Erebot_Styling::COLOR_LIGHT_GRAY.
    const COLOR_LIGHT_GREY  = 15;


    /**
     * Add a value to a variable which will be passed
     * to the template as an array.
     * Unlike Erebot_Styling::append_by_ref(),
     * this method assigns the variable by value.
     *
     * \param string $varname
     *      Name of the array variable to set.
     *
     * \param mixed $var
     *      Value to append to the array.
     *
     * \param mixed $merge
     *      Whether to merge the values (TRUE)
     *      or not (FALSE).
     */
    public function append($varname, $var, $merge = NULL);

    /**
     * Add a value to a variable which will be passed
     * to the template as an array.
     * Unlike Erebot_Styling::append(), this method
     * assigns the variable by reference.
     *
     * \param string $varname
     *      Name of the array variable to set.
     *
     * \param mixed $var
     *      Value to append to the array.
     *
     * \param mixed $merge
     *      Whether to merge the values (TRUE)
     *      or not (FALSE).
     */
    public function append_by_ref($varname, &$var, $merge = NULL);

    /**
     * Assign a value to a variable which will be
     * passed to the template.
     * Unlike Erebot_Styling::assign_by_ref(), this
     * method assigns the variable by value.
     *
     * \param string $name
     *      Name of the variable to assign.
     *
     * \param mixed $value
     *      Value for that variable.
     */
    public function assign($name, $value);

    /**
     * Assign a value to a variable which will be
     * passed to the template.
     * Unlike Erebot_Styling::assign(), this method
     * assigns the variable by reference.
     *
     * \param string $name
     *      Name of the variable to assign.
     *
     * \param mixed $value
     *      Value for that variable, as a reference.
     */
    public function assign_by_ref($name, &$value);

    /**
     * Unsets any previous value assigned to
     * the templates' variables.
     */
    public function clear_all_assign();

    /**
     * Unsets any previous value assigned to
     * a given variable.
     *
     * \param string $varname
     *      Name of the variable to unset.
     */
    public function clear_assign($varname);

    /**
     * Renders the template using assigned
     * variables.
     *
     * \retval string
     *      The formatted result for this template.
     *
     * \deprecated
     *      Use Erebot_Styling::__toString() instead.
     */
    public function render();

    /**
     * Returns the template, rendered using the values
     * previously assigned to its variables.
     *
     * \retval string
     *      The formatted result for this template.
     *
     * \note
     *      This method is magical: it is called automatically
     *      by PHP whenever the template is used in a string
     *      context. Hence, you may use it like this:
     *      <code>
     *          var_dump((string) $tpl);
     *      </code>
     */
    public function __toString();

    /**
     * Returns either all variables assigned to the template,
     * or the value assigned to a particular variable.
     *
     * \param NULL|string $varname
     *      If given, this must be the name of a variable
     *      assigned to the template.
     *
     * \retval mixed
     *      If $varname was given, returns the current value
     *      assigned to the variable which goes by that name.
     * \retval dict(string=>mixed)
     *      Otherwise, returns all variables currently assigned
     *      to this template, as an associative array mapping
     *      the variables' names to their values.
     */
    public function get_template_vars($varname = NULL);
}

