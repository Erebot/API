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
 *  It also provides a method to render templates easily.
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
     * Constructs a new renderer.
     *
     * \param Erebot_Interface_I18n $translator
     *      A translator that can be used to improve
     *      the rendering process.
     */
    public function __construct(Erebot_Interface_I18n $translator);

    /**
     * Alias for Erebot_Interface_Styling::render(),
     * compatible with internationalization tools
     * such as xgettext.
     *
     * \param string $template
     *      A template to render.
     *
     * \param array $vars
     *      (optional) An array of variables that can be
     *      used to change the way the template will be
     *      rendered.
     *
     * \retval string
     *      The formatted result for this template.
     *
     * \note
     *      The name of this method was chosen so that
     *      tools such as xgettext can mark the template
     *      as being some message to translate.
     *      If you DO NOT want this behaviour, use
     *      Erebot_Interface_Styling::render() instead.
     */
    public function gettext($template, array $vars = array());

    /**
     * Renders a template using the given variables.
     *
     * \param string $template
     *      A template to render.
     *
     * \param array $vars
     *      (optional) An array of variables that can be
     *      used to change the way the template will be
     *      rendered.
     *
     * \retval string
     *      The formatted result for this template.
     *
     * \note
     *      Erebot_Interface_Styling::gettext() is preferred
     *      as it makes external tools such as xgettext add
     *      the template to the list of messages to translate.
     */
    public function render($template, array $vars = array());
}

