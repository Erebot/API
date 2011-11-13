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
 *      Raw profile for InspIRCd's extensions.
 *
 * This raw profile defines the constants associated with
 * InspIRCd's extensions.
 */
interface   Erebot_Interface_RawProfile_InspIRCd
extends     Erebot_Interface_RawProfile_RFC2812,
            Erebot_Interface_RawProfile_005,
            Erebot_Interface_RawProfile_UniqueUserID,
            Erebot_Interface_RawProfile_RULES,
            Erebot_Interface_RawProfile_MAP,
            Erebot_Interface_RawProfile_STARTTLS
{
    /**
     *  \brief
     *      Gives statistics about certain metrics
     *      collected by the IRC server, like the
     *      number of users currently connected
     *      (globally).
     *
     *  \format{":%d server%s and %d user%s, average %.2f users per server"}
     *
     *  \note
     *      A "s" is automatically added to the words
     *      "server" or "user" depending on the actual
     *      number of servers and users currently
     *      connected.
     *
     * \note
     *      Part of the m_spanningtree module.
     */
    const RPL_MAPUSERS              = 270;

    /**
     *  \brief
     *      Returned by InspIRCd to indicate a mistake
     *      regarding the syntax of a command and to
     *      provide a hint as to the correct syntax.
     *
     *  \format{":SYNTAX <command> <syntax>"}
     */
    const RPL_SYNTAX                = 304;

    /**
     *  \brief
     *      Returned by InspIRCd when a VHOST is used.
     *
     *  \format{"<hostname> :is now your displayed host"}
     */
    const RPL_YOURDISPLAYEDHOST     = 396;

    /**
     *  \brief
     *      Returned when an invalid subcommand is used
     *      with the CAP command.
     *
     *  \format{"<subcommand> :Invalid CAP subcommand"}
     *
     * \note
     *      Part of the m_cap module.
     */
    const ERR_INVALIDCAPSUBCOMMAND  = 410;

    /**
     *  \brief
     *      Returned when someone tries to add the +z mode
     *      on a channel but some users are not connected
     *      using a secure (SSL) connection.
     *
     *  \format{
     *      "<channel> :all members of the channel
     *      must be connected via SSL"
     *  }
     *
     * \note
     *      Part of the m_sslmode module.
     */
    const ERR_ALLMUSTSSL            = 490;

    /**
     *  \brief
     *      Returned to someone who tries to rejoin a channel
     *      right after being kicked while a delay is required.
     *
     *  \format{
     *      "<channel> :You must wait <delay> seconds
     *      after being kicked to rejoin (+J)"
     *  }
     *
     * \note
     *      Part of the m_kicknorejoin module.
     */
    const ERR_DELAYREJOIN           = 495;

    /// Alias for Erebot_Interface_RawProfile_InspIRCd::ERR_DELAYREJOIN.
    const ERR_KICKNOREJOIN          = 495;

    /**
     *  \brief
     *      Returned when someone tries to set
     *      an invalid server notice mask.
     *
     *  \format{"<mask> :is unknown snomask char to me"}
     */
    const ERR_UNKNOWNSNOMASK        = 501;

    /**
     *  \brief
     *      Returned when a module on the IRC server
     *      prevents you from sending a message to
     *      some user.
     *
     *  \format{
     *      "<user> :You are not permitted to send
     *      private messages to this user (+c set)"
     *  }
     *  \format{
     *      "<user> :You are not permitted to send
     *      private messages to this user"
     *  }
     *
     * \note
     *      Part of the m_commonchans & m_restrictmsg modules.
     *
     * \note
     *      The m_commonchans module adds " (+c set)" to the
     *      message.
     */
    const ERR_CANTSENDTOUSER        = 531;

    /**
     *  \brief
     *      Sent in response to a COMMANDS command,
     *      one RPL_COMMAND is returned for each
     *      extra command supported by the server.
     *
     *  \format{":<command> <module> <min. parameters> <penalty>"}
     */
    const RPL_COMMANDS              = 702;

    /**
     *  \brief
     *      Sent in response to a COMMANDS command,
     *      marks the end of the server's response.
     *
     *  \format{":End of COMMANDS list"}
     */
    const RPL_COMMANDSEND           = 703;

    /**
     *  \brief
     *      Returned when a message has been blocked
     *      because it contained a censored word.
     *
     *  \format{
     *      "<channel> <index> :Your message contained
     *      a censored word, and was blocked"
     *  }
     *
     * \note
     *      Part of the m_censor module.
     */
    const ERR_WORDFILTERED          = 936;

    /// Alias for Erebot_Interface_RawProfile_InspIRCd::ERR_WORDFILTERED.
    const ERR_NOSWEAR               = 936;

    /**
     *  \brief
     *      Returned when the server failed to unload
     *      a module.
     *
     *  \format{"<module> :Failed to unload module <module>: <reason>"}
     */
    const ERR_CANTUNLOADMODULE      = 972;


    /**
     *  \brief
     *      Returned after a module was
     *      successfully unloaded.
     *
     *  \format{"<module> :Module <module> successfully unloaded"}
     */
    const RPL_UNLOADEDMODULE        = 973;


    /**
     *  \brief
     *      Returned when the server
     *      could not load a module.
     *
     *  \format{"<module> :Failed to load module <module>: <reason>"}
     */
    const ERR_CANTLOADMODULE        = 974;


    /**
     *  \brief
     *      Returned after a module was
     *      successfully loaded.
     *
     *  \format{"<module> :Module <module> successfully loaded"}
     */
    const RPL_LOADEDMODULE          = 975;
}

