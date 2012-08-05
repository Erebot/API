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
 *      A fake interface that contains information about
 *      all numerics Erebot supports.
 *
 * \note
 *      Some numerics may not be supported by the IRC server
 *      you're making Erebot connect to. This list is only
 *      informative about what Erebot supports, not about
 *      what may actually be used in real life applications.
 */
interface Erebot_Interface_Numerics
{
    /**
     * \TODO
     */
    const ERR_ACCEPTEXIST           = NULL;

    /**
     * \TODO
     */
    const ERR_ACCEPTFULL            = NULL;

    /**
     * \TODO
     */
    const ERR_ACCEPTNOT             = NULL;

    /**
     * \TODO
     */
    const ERR_ADMONLY               = NULL;

    /**
     * \brief
     *      Returned when someone tries to add the +z mode
     *      on a channel but some users are not connected
     *      using a secure (SSL) connection.
     *
     * \format{<channel> :all members of the channel must be connected via SSL}
     *
     * \note
     *      (InspIRCd) Part of the m_sslmode module.
     */
    const ERR_ALLMUSTSSL            = NULL;

    /// Alias for Erebot_Interface_Numerics::ERR_ALREADYREGISTRED.
    const ERR_ALREADYREGISTERED     = NULL;

    /**
     * \brief
     *      Returned by the server to any link which tries to
     *      change part of the registered details (such as
     *      password or user details from second USER message).
     *
     * \format{:Unauthorized command (already registered)}
     */
    const ERR_ALREADYREGISTRED      = NULL;

    /**
     * \TODO
     */
    const ERR_ATTACKDENY            = NULL;

    /**
     * \brief
     *      This numeric is sent back to you if you specify
     *      an invalid mask for a channel.
     *
     * \format{<chan mask> :Bad Channel Mask}
     */
    const ERR_BADCHANMASK           = NULL;

    /**
     * \TODO
     */
    const ERR_BADCHANNAME           = NULL;

    /**
     * \brief
     *      Returned when trying to JOIN a channel for which
     *      a key was set and was either not given or incorrect.
     *
     * \format{<channel> :Cannot join channel (+k)}
     */
    const ERR_BADCHANNELKEY         = NULL;

    /**
     * \TODO
     */
    const ERR_BADEXPIRE             = NULL;

    /**
     * \TODO
     */
    const ERR_BADFEATVALUE          = NULL;

    /**
     * \TODO
     */
    const ERR_BADLOGSYS             = NULL;

    /**
     * \TODO
     */
    const ERR_BADLOGTYPE            = NULL;

    /**
     * \TODO
     */
    const ERR_BADLOGVALUE           = NULL;

    /**
     * \brief
     *      Returned when an invalid mask was passed to
     *      <tt>"PRIVMSG $<server>"</tt> or <tt>"PRIVMSG #<host>"</tt>.
     *
     * \format{<mask> :Bad Server/host mask}
     */
    const ERR_BADMASK               = NULL;

    /**
     * \TODO
     */
    const ERR_BADPING               = NULL;

    /**
     * \brief
     *      Returned when attempting to add a ban on a channel
     *      for which the banlist is already full.
     *
     * \format{<channel> <char> :Channel list is full}
     */
    const ERR_BANLISTFULL           = NULL;

    /**
     * \brief
     *      Returned when trying to JOIN a channel from which
     *      you've been banned.
     *
     * \format{<channel> :Cannot join channel (+b)}
     */
    const ERR_BANNEDFROMCHAN        = NULL;

    /**
     * \TODO
     */
    const ERR_BANNEDNICK            = NULL;

    /**
     * \TODO
     *
     * \format{<channel> :Cannot change nickname while banned on channel}
     * \format{<channel> :Cannot change nickname while banned on channel or channel is moderated}
     * \format{<channel> :Cannot change nickname while banned or moderated on channel}
     */
    const ERR_BANNICKCHANGE         = NULL;

    /**
     * \TODO
     */
    const ERR_BANONCHAN             = NULL;

    /**
     * \TODO
     */
    const ERR_CANNOTCHANGECHANMODE  = NULL;

    /**
     * \TODO
     */
    const ERR_CANNOTDOCOMMAND       = NULL;

    /**
     * \TODO
     */
    const ERR_CANNOTKNOCK           = NULL;

    /**
     * \brief
     *      Sent by the server when attempting to send
     *      a PRIVMSG on a channel when you're not allowed
     *      to do so.
     *
     * \format{<channel name> :Cannot send to channel}
     *
     *  Sent to a user who is either (a) not on a channel
     *  which is mode +n or (b) not a chanop (or mode +v) on
     *  a channel which has mode +m set or where the user is
     *  banned and is trying to send a PRIVMSG message to
     *  that channel.
     */
    const ERR_CANNOTSENDTOCHAN      = NULL;

    /// Alias for Erebot_Interface_Numerics::ERR_NONICKCHANGE.
    const ERR_CANTCHANGENICK        = NULL;

    /**
     * \TODO
     */
    const ERR_CANTJOINOPERSONLY     = NULL;

    /**
     * \brief
     *      Any attempts to use the KILL command on a server
     *      will be refused and this error returned directly
     *      to the client.
     *
     * \format{:You can't kill a server!}
     */
    const ERR_CANTKILLSERVER        = NULL;

    /**
     * \brief
     *      Returned when the server
     *      could not load a module.
     *
     * \format{<module> :Failed to load module <module>: <reason>}
     */
    const ERR_CANTLOADMODULE        = NULL;

    /**
     * \brief
     *      Returned when a module on the IRC server
     *      prevents you from sending a message to
     *      some user.
     *
     * \format{<user> :You are not permitted to send private messages to this user (+c set)}
     * \format{<user> :You are not permitted to send private messages to this user}
     *
     * \note
     *      (InspIRCd) Part of the m_commonchans & m_restrictmsg modules.
     *
     * \note
     *      (InspIRCd) The m_commonchans module adds " (+c set)" to the
     *      message.
     */
    const ERR_CANTSENDTOUSER        = NULL;

    /**
     * \brief
     *      Returned when the server failed to unload
     *      a module.
     *
     * \format{<module> :Failed to unload module <module>: <reason>}
     */
    const ERR_CANTUNLOADMODULE      = NULL;

    /**
     * \TODO
     */
    const ERR_CHANBANREASON         = NULL;

    /**
     * \brief
     *      Returned when trying to JOIN a channel for which
     *      a limit has been set and reached.
     *
     * \format{<channel> :Cannot join channel (+l)}
     */
    const ERR_CHANNELISFULL         = NULL;

    /**
     * \TODO
     */
    const ERR_CHANOPEN              = NULL;

    /// Alias for Erebot_Interface_Numerics::ERR_CHANOPRIVSNEEDED.
    const ERR_CHANOPPRIVSNEEDED     = NULL;

    /**
     * \brief
     *      Any command requiring 'chanop' privileges (such as
     *      MODE messages) will return this error if the client
     *      making the attempt is not a channel operator on the
     *      specified channel.
     *
     * \format{<channel> :You're not channel operator}
     */
    const ERR_CHANOPRIVSNEEDED      = NULL;

    /**
     * \TODO
     */
    const ERR_CHANOWNPRIVNEEDED     = NULL;

    /**
     * \TODO
     */
    const ERR_CHANSECURED           = NULL;

    /**
     * \brief
     *      Returned to someone who tries to rejoin a channel
     *      right after being kicked while a delay is required.
     *
     * \format{<channel> :You must wait <delay> seconds after being kicked to rejoin (+J)}
     *
     * \note
     *      (InspIRCd) Part of the m_kicknorejoin module.
     */
    const ERR_DELAYREJOIN           = NULL;

    /**
     * \TODO
     */
    const ERR_DESYNC                = NULL;

    /**
     * \TODO
     */
    const ERR_DISABLED              = NULL;

    /**
     * \TODO
     */
    const ERR_DONTCHEAT             = NULL;

    /**
     * \TODO
     */
    const ERR_ERRONEOUSNICKNAME     = NULL;

    /**
     * \brief
     *      Returned after receiving a NICK message which contains
     *      characters which do not fall in the defined set.
     *
     * \format{<nick> :Erroneous nickname}
     */
    const ERR_ERRONEUSNICKNAME      = NULL;

    /**
     * \TODO
     */
    const ERR_EXEMPTLISTFULL        = NULL;

    /**
     * \brief
     *      Generic error message used to report a failed file
     *      operation during the processing of a message.
     *
     * \format{:File error doing <file op> on <file>}
     */
    const ERR_FILEERROR             = NULL;

    /**
     * \TODO
     */
    const ERR_GHOSTEDCLIENT         = NULL;

    /**
     * \TODO
     */
    const ERR_HELPNOTFOUND          = NULL;

    /**
     * \TODO
     */
    const ERR_HOSTILENAME           = NULL;

    /**
     * \TODO
     */
    const ERR_HTMDISABLED           = NULL;

    /**
     * \TODO
     */
    const ERR_INPUTTOOLONG          = NULL;

    /**
     * \TODO
     */
    const ERR_INVALIDCAPCMD         = NULL;

    /**
     * \brief
     *      Returned when an invalid subcommand is used
     *      with the CAP command.
     *
     * \format{<subcommand> :Invalid CAP subcommand}
     *
     * \note
     *      (InspIRCd) Part of the m_cap module.
     */
    const ERR_INVALIDCAPSUBCOMMAND  = NULL;

    /**
     * \TODO
     */
    const ERR_INVALIDKEY            = NULL;

    /**
     * \TODO
     */
    const ERR_INVALIDUSERNAME       = NULL;

    /**
     * \brief
     *      Returned when trying to JOIN a channel which requires
     *      an invitation and you've not been invited.
     *
     * \format{<channel> :Cannot join channel (+i)}
     */
    const ERR_INVITEONLYCHAN        = NULL;

    /**
     * \TODO
     */
    const ERR_ISCHANSERVICE         = NULL;

    /**
     * \TODO
     */
    const ERR_ISOPERLCHAN           = NULL;

    /**
     * \brief
     *      Sent when attempting to set a key for a channel
     *      which already has one.
     *
     * \format{<channel> :Channel key already set}
     */
    const ERR_KEYSET                = NULL;

    /// Alias for Erebot_Interface_Numerics::ERR_DELAYREJOIN.
    const ERR_KICKNOREJOIN          = NULL;

    /**
     * \TODO
     */
    const ERR_KILLDENY              = NULL;

    /**
     * \TODO
     */
    const ERR_KNOCKDISABLED         = NULL;

    /**
     * \TODO
     */
    const ERR_KNOCKONCHAN           = NULL;

    /// Alias for Erebot_Interface_Numerics::ERR_NUMERIC_ERR.
    const ERR_LAST_ERR_MSG          = NULL;

    /**
     * \TODO
     */
    const ERR_LASTERROR             = NULL;

    /**
     * \TODO
     */
    const ERR_LINKCHANNEL           = NULL;

    /**
     * \TODO
     */
    const ERR_LINKFAIL              = NULL;

    /**
     * \TODO
     */
    const ERR_LINKSET               = NULL;

    /**
     * \TODO
     *
     * \format{:Bad list syntax, type /quote list ? or /raw list ?}
     * \format{:Bad list syntax, type /QUOTE HELP LIST}
     */
    const ERR_LISTSYNTAX            = NULL;

    /**
     * \TODO
     */
    const ERR_LONGMASK              = NULL;

    /**
     * \TODO
     */
    const ERR_MASKTOOWIDE           = NULL;

    /**
     * \TODO
     */
    const ERR_MONLISTFULL           = NULL;

    /**
     * \brief
     *      Returned to a user trying to send a message
     *      to a service without specifying the proper
     *      hostname (ie. "/msg nickserv ..." instead
     *      of "/msg nickserv@services.dal.net ...").
     *
     * \note
     *      This numeric is used in an attempt to protect
     *      users against abuse by other users changing
     *      their nick to "NickServ" etc. after a netsplit.
     *
     * \note
     *      Whether this numeric is used or not when
     *      a message is received without a hostname
     *      depends on the server's configuration.
     *
     * \format{:Error! "/msg <service>" is no longer supported. Use "/msg <service>\@<host>" or "/<service>" instead.}
     */
    const ERR_MSGSERVICES           = NULL;

    /**
     * \TODO
     */
    const ERR_NCHANGETOOFAST        = NULL;

    /**
     * \brief
     *      Returned by the server by numerous commands to
     *      indicate to the client that it didn't supply
     *      enough parameters.
     *
     * \format{<command> :Not enough parameters}
     */
    const ERR_NEEDMOREPARAMS        = NULL;

    /**
     * \TODO
     */
    const ERR_NEEDPONG              = NULL;

    /**
     * \TODO
     *
     * \format{<channel> :You need a registered nick to join that channel.}
     * \format{<channel> :You need to identify to a registered nick to <action> that channel. For help with registering your nickname, type "/msg <nick>@<host> help register" or see <URL>}
     * \format{<channel> :Cannot join channel (+r)}
     * \format{<channel> :Cannot join channel (+r): this channel requires authentication -- you can obtain an account from <URL>}
     */
    const ERR_NEEDREGGEDNICK        = NULL;

    /**
     * \brief
     *      Returned by a server to a client when it detects
     *      a nickname collision (registered of a NICK that
     *      already exists by another server).
     *
     * \format{<nick> :Nickname collision KILL from <user>@<host>}
     */
    const ERR_NICKCOLLISION         = NULL;

    /**
     * \brief
     *      Returned when a NICK message is processed that results
     *      in an attempt to change to a currently existing
     *      nickname.
     *
     * \format{<nick> :Nickname is already in use}
     */
    const ERR_NICKNAMEINUSE         = NULL;

    /**
     * \TODO
     */
    const ERR_NICKTOOFAST           = NULL;

    /**
     * \brief
     *      Returned by a server in response to an ADMIN message
     *      when there is an error in finding the appropriate
     *      information.
     *
     * \format{<server> :No administrative info available}
     */
    const ERR_NOADMININFO           = NULL;

    /**
     * \brief
     *      Returned when attempting to set modes on a channel
     *      which does not support modes.
     *
     * \format{<channel> :Channel doesn't support modes}
     */
    const ERR_NOCHANMODES           = NULL;

    /**
     * \TODO
     */
    const ERR_NOCOLORSONCHAN        = NULL;

    /**
     * \TODO
     */
    const ERR_NOCTCP                = NULL;

    /**
     * \TODO
     */
    const ERR_NOCTCPALLOWED         = NULL;

    /**
     * \TODO
     *
     * \format{<channel> :You cannot use control codes on this channel. Not sent: <message>}
     */
    const ERR_NOCTRLSONCHAN         = NULL;

    /**
     * \TODO
     */
    const ERR_NOFEATURE             = NULL;

    /**
     * \TODO
     */
    const ERR_NOHIDING              = NULL;

    /**
     * \TODO
     */
    const ERR_NOINVITE              = NULL;

    /**
     * \brief
     *      Returned by the summon after a SUMMON command for a
     *      user was unable to be performed since they were not
     *      logged in.
     *
     * \format{<user> :User not logged in}
     */
    const ERR_NOLOGIN               = NULL;

    /**
     * \TODO
     */
    const ERR_NOMANAGER             = NULL;

    /**
     * \brief
     *      Server's MOTD file could not be opened by the server.
     *
     * \format{:MOTD File is missing}
     */
    const ERR_NOMOTD                = NULL;

    /**
     * \TODO
     */
    const ERR_NONICKCHANGE          = NULL;

    /**
     * \brief
     *      Returned when a nickname parameter is expected
     *      for a command and isn't found.
     *
     * \format{:No nickname given}
     */
    const ERR_NONICKNAMEGIVEN       = NULL;

    /**
     * \TODO
     *
     * \format{:You must identify to a registered nick to private message <nick>}
     * \format{<nick> :You must identify to a registered nick to private message that person}
     */
    const ERR_NONONREG              = NULL;

    /**
     * \brief
     *      If a client sends an OPER message and the server
     *      has not been configured to allow connections from
     *      the client's host as an operator, this error will
     *      be returned.
     *
     * \format{:No O-lines for your host}
     */
    const ERR_NOOPERHOST            = NULL;

    /**
     * \TODO
     */
    const ERR_NOOPERMOTD            = NULL;

    /**
     * \brief
     *      PING or PONG message missing the originator parameter.
     *
     * \format{:No origin specified}
     */
    const ERR_NOORIGIN              = NULL;

    /**
     * \brief
     *      Returned to a client which attempts to register
     *      with a server which does not been setup to allow
     *      connections from the host the attempted connection
     *      is tried.
     *
     * \format{:Your host isn't among the privileged}
     */
    const ERR_NOPERMFORHOST         = NULL;

    /**
     * \brief
     *      Any command requiring operator privileges to operate
     *      will return this error to indicate the attempt was
     *      unsuccessful.
     *
     * \format{:Permission Denied- You're not an IRC operator}
     */
    const ERR_NOPRIVILEGES          = NULL;

    /**
     * \TODO
     */
    const ERR_NOPRIVS               = NULL;

    /**
     * \brief
     *      Used to indicate a recipient was expected
     *      for the given command.
     *
     * \format{:No recipient given (<command>)}
     */
    const ERR_NORECIPIENT           = NULL;

    /**
     * \brief
     *      Sent to indicate that the server does not
     *      have any rules defined.
     *
     * \format{:RULES File is missing}
     */
    const ERR_NORULES               = NULL;

    /// This numeric is not used anymore.
    const ERR_NOSERVICEHOST         = NULL;

    /**
     * \brief
     *      Returned to a user trying to send a message
     *      to a person they share no common channel with
     *      and user mode +C is enabled for that person.
     *
     * \format{:You cannot message that person because you do not share a common channel with them.}
     */
    const ERR_NOSHAREDCHAN          = NULL;

    /**
     * \TODO
     */
    const ERR_NOSSL                 = NULL;

    /**
     * \brief
     *      Used to indicate the given channel name
     *      is invalid.
     *
     * \format{<channel name> :No such channel}
     */
    const ERR_NOSUCHCHANNEL         = NULL;

    /**
     * \TODO
     */
    const ERR_NOSUCHGLINE           = NULL;

    /**
     * \TODO
     */
    const ERR_NOSUCHJUPE            = NULL;

    /**
     * \brief
     *      Used to indicate the nickname parameter
     *      supplied to a command is currently unused.
     *
     * \format{<nickname> :No such nick/channel}
     */
    const ERR_NOSUCHNICK            = NULL;

    /**
     * \brief
     *      Used to indicate the server name given
     *      currently doesn't exist.
     *
     * \format{<server name> :No such server}
     */
    const ERR_NOSUCHSERVER          = NULL;

    /**
     * \brief
     *      Returned to a client which is attempting to send a SQUERY
     *      to a service which does not exist.
     *
     * \format{<service name> :No such service}
     */
    const ERR_NOSUCHSERVICE         = NULL;

    /// Alias for Erebot_Interface_Numerics::ERR_WORDFILTERED.
    const ERR_NOSWEAR               = NULL;

    /**
     * \brief
     *      Sent when a command did not receive any text when it was
     *      expecting some.
     *
     * \format{:No text to send}
     */
    const ERR_NOTEXTTOSEND          = NULL;

    /**
     * \TODO
     */
    const ERR_NOTFORHALFOPS         = NULL;

    /**
     * \TODO
     */
    const ERR_NOTFORUSERS           = NULL;

    /**
     * \TODO
     */
    const ERR_NOTLOWEROPLEVEL       = NULL;

    /**
     * \TODO
     */
    const ERR_NOTMANAGER            = NULL;

    /**
     * \brief
     *      Returned by the server whenever a client tries to
     *      perform a channel affecting command for which the
     *      client isn't a member.
     *
     * \format{<channel> :You're not on that channel}
     */
    const ERR_NOTONCHANNEL          = NULL;

    /**
     * \brief
     *      Returned when an invalid use of <tt>"PRIVMSG $<server>"</tt>
     *      or <tt>"PRIVMSG #<host>"</tt> is attempted (when it doesn't
     *      contain a top-level domain).
     *
     * \format{<mask> :No toplevel domain specified}
     */
    const ERR_NOTOPLEVEL            = NULL;

    /**
     * \brief
     *      Returned by the server to indicate that the client
     *      must be registered before the server will allow it
     *      to be parsed in detail.
     *
     * \format{:You have not registered}
     */
    const ERR_NOTREGISTERED         = NULL;

    /**
     * \TODO
     */
    const ERR_NOTSSLCLIENT          = NULL;

    /// Alias for Erebot_Interface_Numerics::ERR_NUMERIC_ERR.
    const ERR_NUMERICERR            = NULL;

    /**
     * \brief
     *      Sent when an invalid numeric is received.
     *
     * \format{Numeric error! yikes!}
     * \format{Numeric error!}
     *
     * \note
     *      UnrealIRCd uses the shorter version,
     *      the longer one being used by Bahamut.
     *
     * \note
     *      Due to the absence of a leading ':',
     *      both messages are decoded as separate
     *      tokens by IRC clients rather than as a
     *      single token containing the full message.
     */
    const ERR_NUMERIC_ERR           = NULL;

    /**
     * \TODO
     *
     * \format{<channel> :Only servers can change that mode}
     */
    const ERR_ONLYSERVERSCANCHANGE  = NULL;

    /**
     * \TODO
     */
    const ERR_OPERONLY              = NULL;  // UnrealIRCd

    /**
     * \TODO
     */
    const ERR_OPERONLYCHAN          = NULL;

    /**
     * \TODO
     */
    const ERR_OPERSPVERIFY          = NULL;

    /**
     * \TODO
     *
     * \format{:You cannot message that person while you are <mode>, so your message was not sent}
     */
    const ERR_OWNMODE               = NULL;

    /**
     * \brief
     *      Returned to indicate a failed attempt at registering
     *      a connection for which a password was required and
     *      was either not given or incorrect.
     *
     * \format{:Password incorrect}
     */
    const ERR_PASSWDMISMATCH        = NULL;

    /**
     * \TODO
     */
    const ERR_QUARANTINED           = NULL;

    /**
     * \TODO
     */
    const ERR_QUERYTOOLONG          = NULL;

    /**
     * \brief
     *      Sent by the server to a user upon connection to indicate
     *      the restricted nature of the connection (user mode "+r")
     *
     * \format{:Your connection is restricted!}
     */
    const ERR_RESTRICTED            = NULL;

    /**
     * \TODO
     */
    const ERR_SECUREONLYCHAN        = NULL;

    /**
     * \TODO
     */
    const ERR_SERVERONLY            = NULL;

    /**
     * \TODO
     */
    const ERR_SERVICECONFUSED       = NULL;

    /**
     * \TODO
     */
    const ERR_SERVICENAMEINUSE      = NULL;

    /**
     * \TODO
     *
     * \format{<service> :Services are currently down. Please try again later.}
     * \format{<service> :Services is currently down. Please wait a few moments, and then try again.}
     * \format{<service> :Services are currently unavailable.}
     * \format{:Services is currently down.}
     */
    const ERR_SERVICESDOWN          = NULL;

    /**
     * \brief
     *      This error is sent back when you try to add
     *      someone to your silence list and the list is
     *      already full.
     *
     * \format{<mask> :Your silence list is full}
     */
    const ERR_SILELISTFULL          = NULL;

    /**
     * \TODO
     */
    const ERR_SSLCLIENTSONLY        = NULL;

    /**
     * \TODO
     */
    const ERR_SSLONLYCHAN           = NULL;

    /// Alias for Erebot_Interface_Numerics::ERR_STARTTLSFAIL.
    const ERR_STARTTLS              = NULL;

    /**
     * \brief
     *      Returned to a client after STARTTLS command to indicate
     *      that the attempt to negotiate a secure channel for the
     *      communication to take place has failed.
     *
     * \format{:STARTTLS failure}
     *
     * \note
     *      Upon receiving this message, the client may proceed with
     *      the communication (even though data will be exchanged in
     *      plain text), or it may choose to close the connection
     *      entirely.
     */
    const ERR_STARTTLSFAIL          = NULL;

    /**
     * \TODO
     */
    const ERR_STATSKLINE            = NULL;

    /**
     * \brief
     *      Returned by any server which does not support the SUMMON command,
     *      either because it was not implemented or it was disabled (in the
     *      configuration).
     *
     * \format{:SUMMON has been disabled}
     */
    const ERR_SUMMONDISABLED        = NULL;

    /**
     * \TODO
     */
    const ERR_TARGCHANGE            = NULL;

    // Misspelled in Bahamut.
    /// Alias for Erebot_Interface_Numerics::ERR_TARGETTOOFAST.
    const ERR_TARGETTOFAST          = NULL;

    /**
     * \TODO
     */
    const ERR_TARGETTOOFAST         = NULL;

    /**
     * \TODO
     */
    const ERR_TARGUMODEG            = NULL;

    /**
     * \brief
     *      This numeric is sent by the IRC server
     *      when two many AWAY commands have been
     *      issued by the user in a few seconds.
     *
     * \format{:Too Many aways - Flood Protection activated}
     */
    const ERR_TOOMANYAWAY           = NULL;

    /**
     * \brief
     *      Sent to a user when they have joined the maximum
     *      number of allowed channels and they try to join
     *      another channel.
     *
     * \format{<channel name> :You have joined too many channels}
     */
    const ERR_TOOMANYCHANNELS       = NULL;

    /**
     * \brief
     *      This numeric is sent to you if you try to add
     *      someone to your DCC allow list and the list
     *      is already full.
     *
     * \format{<peer> :Your dcc allow list is full. Maximum size is <limit> entries}
     */
    const ERR_TOOMANYDCC            = NULL;

    /**
     * \TODO
     */
    const ERR_TOOMANYJOINS          = NULL;

    /**
     * \TODO
     */
    const ERR_TOOMANYKNOCK          = NULL;

    /**
     * \brief
     *      Returned by a server in response to a LIST or NAMES
     *      message to indicate the result contains too many
     *      items to be returned to the client.
     *
     * \format{<channel> :Output too long (try locally)}
     */
    const ERR_TOOMANYMATCHES        = NULL;

    /**
     * \brief
     *      Used when several targets match the given parameters
     *      for a command.
     *
     * \format{<target> :<error code> recipients. <abort message>}
     *
     *  There are several occasions when this numeric may be used:
     *  -   Returned to a client which is attempting to send a
     *      PRIVMSG/NOTICE using the user\@host destination format
     *      and for a user\@host which has several occurrences.
     *
     *  -   Returned to a client which tries to send a
     *      PRIVMSG/NOTICE to too many recipients.
     *
     *  -   Returned to a client which is attempting to JOIN a safe
     *      channel using the shortname when there are more than one
     *      such channel.
     *
     * \note
     *      RFC 1459 defines a slightly different (less meaningful) message:
     *      <tt>"<target> :Duplicate recipients. No message delivered"</tt>
     */
    const ERR_TOOMANYTARGETS        = NULL;

    /**
     * \TODO
     */
    const ERR_TOOMANYUSERS          = NULL;

    /**
     * \brief
     *      The server will send this numeric back to you
     *      if you try to add someone to your watch list
     *      and the list is already full.
     *
     * \format{<mask> :Maximum size for WATCH-list is <limit> entries}
     */
    const ERR_TOOMANYWATCH          = NULL;

    /**
     * \brief
     *      Returned by the server to indicate that a MODE
     *      message was sent with a nickname parameter and
     *      that the a mode flag sent was not recognized.
     *
     * \format{:Unknown MODE flag}
     */
    const ERR_UMODEUNKNOWNFLAG      = NULL;

    /**
     * \brief
     *      Returned when a resource needed to perform the given
     *      action is unavailable.
     *
     * \format{<nick/channel> :Nick/channel is temporarily unavailable}
     *
     *  This error is:
     *  -   Returned by a server to a user trying to join a channel
     *      currently blocked by the channel delay mechanism.
     *
     *  -   Returned by a server to a user trying to change nickname
     *      when the desired nickname is blocked by the nick delay
     *      mechanism.
     */
    const ERR_UNAVAILRESOURCE       = NULL;

    /**
     * \brief
     *      Any MODE requiring "channel creator" privileges will
     *      return this error if the client making the attempt is not
     *      a channel operator on the specified channel.
     *
     * \format{:You're not the original channel operator}
     */
    const ERR_UNIQOPPRIVSNEEDED     = NULL;

    /**
     * \TODO
     */
    const ERR_UNIQOPRIVSNEEDED      = NULL;

    /**
     * \TODO
     */
    const ERR_UNKNOWNCAPCMD         = NULL;

    /**
     * \brief
     *      Returned to a registered client to indicate that the
     *      command sent is unknown by the server.
     *
     * \format{<command> :Unknown command}
     */
    const ERR_UNKNOWNCOMMAND        = NULL;

    /**
     * \brief
     *      Returned when trying to set a mode which is not
     *      recognized by the server on a channel.
     *
     * \format{<char> :is unknown mode char to me for <channel>}
     *
     * Sent when the client sets an AWAY message.
     */
    const ERR_UNKNOWNMODE           = NULL;

    /**
     * \brief
     *      Returned when someone tries to set
     *      an invalid server notice mask.
     *
     * \format{<mask> :is unknown snomask char to me}
     */
    const ERR_UNKNOWNSNOMASK        = NULL;

    /**
     * \TODO
     */
    const ERR_UPASSNOTSET           = NULL;

    /**
     * \TODO
     */
    const ERR_UPASS_SAME_APASS      = NULL;

    /**
     * \TODO
     */
    const ERR_UPASSSET              = NULL;

    /**
     * \brief
     *      Returned by the server to indicate that the target
     *      user of the command is not on the given channel.
     *
     * \format{<nick> <channel> :They aren't on that channel}
     */
    const ERR_USERNOTINCHANNEL      = NULL;

    /**
     * \TODO
     */
    const ERR_USERNOTONSERV         = NULL;

    /**
     * \brief
     *      Returned when a client tries to invite a user to
     *      a channel they are already on.
     *
     * \format{<user> <channel> :is already on channel}
     */
    const ERR_USERONCHANNEL         = NULL;

    /**
     * \brief
     *      Returned by any server which does not support the USERS command,
     *      either because it was not implemented or it was disabled (in the
     *      configuration).
     *
     * \format{:USERS has been disabled}
     */
    const ERR_USERSDISABLED         = NULL;

    /**
     * \brief
     *      Error sent to any user trying to view or change
     *      the user mode for a user other than themselves.
     *
     * \format{:Cannot change mode for other users}
     */
    const ERR_USERSDONTMATCH        = NULL;

    /**
     * \TODO
     */
    const ERR_VOICENEEDED           = NULL;

    /**
     * \brief
     *      Returned by WHOWAS to indicate there is no history
     *      information for that nickname.
     *
     * \format{<nickname> :There was no such nickname}
     */
    const ERR_WASNOSUCHNICK         = NULL;

    /**
     * \TODO
     */
    const ERR_WHOLIMEXCEED          = NULL;

    /**
     * \TODO
     */
    const ERR_WHOSYNTAX             = NULL;

    /**
     * \brief
     *      Returned when an invalid use of <tt>"PRIVMSG $<server>"</tt>
     *      or <tt>"PRIVMSG #<host>"</tt> is attempted (when the top-level
     *      domain contains wildcard characters).
     *
     * \format{<mask> :Wildcard in toplevel domain}
     */
    const ERR_WILDTOPLEVEL          = NULL;

    /**
     * \brief
     *      Returned when a message has been blocked
     *      because it contained a censored word.
     *
     * \format{<channel> <index> :Your message contained a censored word, and was blocked}
     *
     * \note
     *      (InspIRCd) Part of the m_censor module.
     */
    const ERR_WORDFILTERED          = NULL;

    /**
     * \TODO
     */
    const ERR_WRONGPONG             = NULL;

    /**
     * \brief
     *      Returned after an attempt to connect and register
     *      yourself with a server which has been setup to
     *      explicitly deny connections to you.
     *
     * \format{:You are banned from this server}
     */
    const ERR_YOUREBANNEDCREEP      = NULL;

    /**
     * \brief
     *      Sent by a server to a user to inform him/her
     *      that access to the server will soon be denied.
     *
     * \format{}
     *
     * \note
     *      An empty string is sent by the IRC server as the message
     *      for this numeric.
     */
    const ERR_YOUWILLBEBANNED       = NULL;

    /**
     * \TODO
     */
    const RPL_ACCEPTLIST            = NULL;

    /**
     * \brief
     *      Returned as the last numeric in response to an
     *      ADMIN message, giving an email where the server's
     *      administrator can be reached.
     *
     * \format{:<admin info>}
     *
     * \note
     *      RFC 2812 requires that a valid email address
     *      be used in this numeric.
     */
    const RPL_ADMINEMAIL            = NULL;

    /**
     * \brief
     *      Returned in response to an ADMIN message,
     *      usually giving information on the city,
     *      state and country where the server is located.
     *
     * \format{:<admin info>}
     */
    const RPL_ADMINLOC1             = NULL;

    /**
     * \brief
     *      Returned in response to an ADMIN message,
     *      usually giving information on the institution
     *      hosting the server.
     *
     * \format{:<admin info>}
     */
    const RPL_ADMINLOC2             = NULL;

    /**
     * \brief
     *      Returned as the first numeric in response to an
     *      ADMIN message.
     *
     * \format{<server> :Administrative info}
     */
    const RPL_ADMINME               = NULL;

    /**
     * \TODO
     */
    const RPL_ALIST                 = NULL;

    /**
     * \TODO
     */
    const RPL_APASSWARN_CLEAR       = NULL;

    /**
     * \TODO
     */
    const RPL_APASSWARN_SECRET      = NULL;

    /**
     * \TODO
     */
    const RPL_APASSWARN_SET         = NULL;

    /**
     * \brief
     *      RPL_AWAY is sent to any client sending a
     *      PRIVMSG to a client which is away.
     *
     * \format{<nick> :<away message>}
     *
     * \note
     *      RPL_AWAY is only sent by the server
     *      to which the client is connected.
     */
    const RPL_AWAY                  = NULL;

    /**
     * \TODO
     */
    const RPL_BANLIST               = NULL;

    /**
     * \brief
     *      Sent during connection to point the connecting user
     *      to another server that may be used to reduce lag.
     *
     * \format{<server> <port> :Please use this Server/Port instead}
     *
     * \note
     *      This numeric is defined as numeric 005 by RFC 2812,
     *      but this usage is widely ignored by existing
     *      implementations as it conflicts with the definition
     *      of Erebot_Interface_Numerics::RPL_ISUPPORT.
     */
    const RPL_BOUNCE                = NULL;

    /// Alias for Erebot_Interface_Numerics::RPL_CREATIONTIME.
    const RPL_CHANNELCREATED        = NULL;

    /**
     * \brief
     *      Sent in response to a MODE command or upon joining
     *      an IRC channel, containing the modes that are in
     *      effect on that IRC channel.
     *
     * \format{<channel> <modes> <parameters>}
     */
    const RPL_CHANNELMODEIS         = NULL;

    /**
     * \TODO
     */
    const RPL_CLEARWATCH            = NULL;

    /**
     * \TODO
     *
     * \format{<nb closed>: Connections Closed}
     */
    const RPL_CLOSEEND              = NULL;

    /**
     * \TODO
     *
     * \format{<nick> :Closed. Status = <status>}
     */
    const RPL_CLOSING               = NULL;

    /**
     * \brief
     *      Sent in response to a COMMANDS command,
     *      one RPL_COMMAND is returned for each
     *      extra command supported by the server.
     *
     * \format{:<command> <module> <min. parameters> <penalty>}
     */
    const RPL_COMMANDS              = NULL;

    /**
     * \brief
     *      Sent in response to a COMMANDS command,
     *      marks the end of the server's response.
     *
     * \format{:End of COMMANDS list}
     */
    const RPL_COMMANDSEND           = NULL;

    /**
     * \TODO
     */
    const RPL_COMMANDSYNTAX         = NULL;

    /**
     * \brief
     *      Last time the IRC server was restarted.
     *
     * \format{This server was created <date>}
     */
    const RPL_CREATED               = NULL;

    /**
     * \TODO
     *
     * \format{<channel> <timestamp>}
     */
    const RPL_CREATIONTIME          = NULL;

    /**
     * \brief
     *      This numeric is sent as a reply to several commands
     *      dealing with the DCCALLOW list.
     */
    const RPL_DCCINFO               = NULL;

    /**
     * \brief
     *      This numeric is sent in response to a DCCALLOW LIST command
     *      for every person that is currently present in your DCC allow
     *      list.
     *
     * \format{:<peer>}
     */
    const RPL_DCCLIST               = NULL;

    /**
     * \brief
     *      This numeric is sent back to you after every command
     *      to add or remove some user from your DCC allow list.
     *
     * \note
     *      The message changes depending on the type of action
     *      that occurred (user addition or user removal).
     *
     * \format{:<peer> has been added to your DCC allow list}
     * \format{:<peer> has been removed from your DCC allow list}
     */
    const RPL_DCCSTATUS             = NULL;

    /**
     * \TODO
     */
    const RPL_DELNAMREPLY           = NULL;

    /**
     * \TODO
     */
    const RPL_DUMPING               = NULL;

    /**
     * \TODO
     */
    const RPL_DUMPRPL               = NULL;

    /// Alias for Erebot_Interface_Numerics::RPL_MAPEND.
    const RPL_ENDMAP                = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFACCEPT           = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFALIST            = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFBANLIST          = NULL;

    /**
     * \brief
     *      Marks the end of either the DCCALLOW HELP command
     *      or the DCCALLOW LIST command.
     *
     * \format{:End of DCCALLOW <command>}
     */
    const RPL_ENDOFDCCLIST          = NULL;

    /**
     * \brief
     *      Marks the end of the exception list for a channel.
     *
     * \format{<channel> :End of Channel Exception List}
     */
    const RPL_ENDOFEXCEPTLIST       = NULL;

    ///  Alias for Erebot_Interface_Numerics::RPL_ENDOFEXCEPTLIST.
    const RPL_ENDOFEXEMPTLIST       = NULL;

    ///  Alias for Erebot_Interface_Numerics::RPL_ENDOFEXCEPTLIST.
    const RPL_ENDOFEXLIST           = NULL;

    /**
     * \brief
     *      Marks the end of the G-line list.
     *
     * \format{:End of G-line List}
     */
    const RPL_ENDOFGLIST            = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFHELP             = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFINFO             = NULL;

    ///  Alias for Erebot_Interface_Numerics::RPL_ENDOFINVITELIST.
    const RPL_ENDOFINVEXLIST        = NULL;

    /**
     * \brief
     *      Marks the end of the invite list.
     *
     * \format{:End of /INVITE list.}
     * \format{:End of Invite list}
     * \format{<channel> :End of Channel Invite List}
     *
     * \note
     *      The exact format for this numeric depends
     *      on the implementation.
     */
    const RPL_ENDOFINVITELIST       = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFIRCOPS           = NULL;

    /**
     * \brief
     *      Marks the end of the JUPE list.
     *
     * \format{:End of Jupe List}
     */
    const RPL_ENDOFJUPELIST         = NULL;

    /**
     * \brief
     *      Marks the end of the links for this server.
     *
     * \format{<mask> :End of /LINKS list.}
     */
    const RPL_ENDOFLINKS            = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFMODLIST          = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFMONLIST          = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFMOTD             = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFNAMES            = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFOMOTD            = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFOPERMOTD         = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFQLIST            = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFREOPLIST         = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFRSACHALLENGE2    = NULL;

    /**
     * \brief
     *      Marks the end of the server rules.
     *
     * \format{:End of RULES command.}
     */
    const RPL_ENDOFRULES            = NULL;

    /// Unused numeric.
    const RPL_ENDOFSERVICES         = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFSETTINGS         = NULL;

    /**
     * \brief
     *      Marks the end of the silence list.
     *
     * \format{:End of Silence List}
     */
    const RPL_ENDOFSILELIST         = NULL;

    /**
     * \brief
     *      Marks the end of the STATS report.
     *
     * \format{<stats letter> :End of STATS report}
     */
    const RPL_ENDOFSTATS            = NULL;

    /// Alias for Erebot_Interface_Numerics::RPL_TRACEEND.
    const RPL_ENDOFTRACE            = NULL;

    /**
     * \TODO
     */
    const RPL_ENDOFUSERS            = NULL;

    /**
     * \brief
     *      Marks the end of a WATCH command.
     *
     * \format{:End of WATCH <command>}
     */
    const RPL_ENDOFWATCHLIST        = NULL;

    /**
     * \brief
     *      Marks the end of the results to a WHO.
     *
     * \format{<mask> :End of /WHO list.}
     */
    const RPL_ENDOFWHO              = NULL;

    /**
     * \brief
     *      The RPL_ENDOFWHOIS reply is used to mark
     *      the end of processing a WHOIS message.
     *
     * \format{<nick> :End of WHOIS list}
     */
    const RPL_ENDOFWHOIS            = NULL;

    /**
     * \brief
     *      Sent in response to a WHOWAS, marks
     *      the end of the WHOWAS message processing.
     *
     * \format{<nick> :End of WHOWAS}
     */
    const RPL_ENDOFWHOWAS           = NULL;

    /**
     * \TODO
     */
    const RPL_EODUMP                = NULL;

    /**
     * \TODO
     */
    const RPL_ETRACE                = NULL;

    /**
     * \TODO
     */
    const RPL_ETRACEEND             = NULL;

    /**
     * \TODO
     */
    const RPL_ETRACEFULL            = NULL;

    /**
     * \TODO
     */
    const RPL_ETRACE_FULL           = NULL;

    /**
     * \brief
     *      Sent by the server in response to a MODE \#channel +e
     *      command for every entry currently in the ban exception
     *      list.
     *
     * \format{<channel> <nick>!<ident>@<host>}
     * \format{<channel> <nick>!<ident>@<host> <who> <when>}
     */
    const RPL_EXCEPTLIST            = NULL;

    ///  Alias for Erebot_Interface_Numerics::RPL_EXCEPTLIST.
    const RPL_EXEMPTLIST            = NULL;

    ///  Alias for Erebot_Interface_Numerics::RPL_EXCEPTLIST.
    const RPL_EXLIST                = NULL;

    /**
     * \TODO
     */
    const RPL_FEATURE               = NULL;

    /**
     * \brief
     *      This numeric is used to display information
     *      about an entry in the G-line list.
     *
     * \format{<user> <expire> <last modification> <lifetime> <local> <flags> :<reason>}
     * \format{<user>@<host> <expire> <last modification> <lifetime> <local> <flags> :<reason>}
     */
    const RPL_GLIST                 = NULL;

    /**
     * \TODO
     *
     * \format{:Current global users: <nb global users> Max: <max global users>}
     * \format{:Current Global Users: <nb global users>  Max: <max global users>}
     * \format{:Current global users: <nb global users>  Max: <max global users>}
     * \format{<nb global users> <max global users> :Current global users <nb global users>, max <max global users>}
     *
     * \note
     *      Though the general format for this numeric is roughly the same
     *      for every IRCd, multiple variations can be found in the wild,
     *      making it quite hard to parse this numeric.
     */
    const RPL_GLOBALUSERS           = NULL;

    /**
     * \TODO
     */
    const RPL_GONEAWAY              = NULL;

    /**
     * \TODO
     */
    const RPL_HELLO                 = NULL;

    /**
     * \TODO
     */
    const RPL_HELPFWD               = NULL;

    /**
     * \TODO
     */
    const RPL_HELPHDR               = NULL;

    /**
     * \TODO
     */
    const RPL_HELPHLP               = NULL;

    /**
     * \TODO
     */
    const RPL_HELPIGN               = NULL;

    /**
     * \TODO
     */
    const RPL_HELPOP                = NULL;

    /**
     * \TODO
     */
    const RPL_HELPSTART             = NULL;

    /**
     * \TODO
     */
    const RPL_HELPTLR               = NULL;

    /**
     * \TODO
     */
    const RPL_HELPTXT               = NULL;

    /**
     * \TODO
     */
    const RPL_HOSTHIDDEN            = NULL;

    /**
     * \TODO
     */
    const RPL_INFO                  = NULL;

    /**
     * \TODO
     *
     * \format{:Server INFO}
     */
    const RPL_INFOSTART             = NULL;

    ///  Alias for Erebot_Interface_Numerics::RPL_INVITELIST.
    const RPL_INVEXLIST             = NULL;

    /**
     * \brief
     *      The numeric is sent for every entry on the invite list
     *      for a channel when the invite list has been requested.
     *
     * \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_INVITELIST            = NULL;

    /**
     * \brief
     *      Returned by the server to indicate that the
     *      attempted INVITE message was successful and is
     *      being passed onto the end client.
     *
     * \format{<nick> <channel>}
     */
    const RPL_INVITING              = NULL;

    /**
     * \TODO
     */
    const RPL_IRCOPS                = NULL;

    /**
     * \TODO
     */
    const RPL_ISCAPTURED            = NULL;

    /**
     * \brief
     *      Reply format used by ISON to list replies
     *      to the query list.
     *
     * \format{:*1<nick> *( " " <nick> )}
     */
    const RPL_ISON                  = NULL;

    /**
     * \TODO
     */
    const RPL_ISSUEDINVITE          = NULL;

    /**
     * \TODO
     */
    const RPL_ISUNCAPTURED          = NULL;

    /**
     * \brief
     *      Gives information of the specific commands/options
     *      supported by the server.
     *
     * \format{<features+> :are supported by this server}
     *
     * \note
     *      This numeric conflicts with the one defined in RFC 2812
     *      for Erebot_Interface_Numerics::RPL_BOUNCE.
     */
    const RPL_ISUPPORT              = NULL;

    /**
     * \brief
     *      This numeric is used to display information
     *      about an entry in the JUPE list.
     *
     * \format{<server> <expire> <local> <active> :<reason>}
     */
    const RPL_JUPELIST              = NULL;

    /// Unused numeric.
    const RPL_KILLDONE              = NULL;

    /**
     * \TODO
     */
    const RPL_KNOCK                 = NULL;

    /**
     * \TODO
     */
    const RPL_KNOCKDLVR             = NULL;

    /**
     * \brief
     *      Sent in response to a LINKS command for every server
     *      currently linked to this one that matches a given mask.
     *
     * \note
     *      The format for this numeric changes depending
     *      on the implementation.
     */
    const RPL_LINKS                 = NULL;

    /**
     * \brief
     *      Sent in response to a LIST command,
     *      contains the actual response data.
     *
     * \format{<channel> <# visible> :<topic>}
     */
    const RPL_LIST                  = NULL;

    /**
     * \brief
     *      Sent in response to a LIST command,
     *      marks the end of the server's response.
     *
     * \format{:End of LIST}
     *
     * \note
     *      If there are no channels available to return,
     *      only Erebot_Interface_Numerics::RPL_LISTEND
     *      will be sent.
     */
    const RPL_LISTEND               = NULL;

    /**
     * \brief
     *      Obsolete numeric used to mark the beginning
     *      of a reply to a LIST command.
     */
    const RPL_LISTSTART             = NULL;

    /**
     * \TODO
     */
    const RPL_LISTSYNTAX            = NULL;

    /**
     * \TODO
     */
    const RPL_LISTUSAGE             = NULL;

    /**
     * \brief
     *      Mostly an alias for Erebot_Interface_Numerics::RPL_TRYAGAIN,
     *      except that the text is worded slightly differently.
     *
     * \format{<command> :Server load is temporarily too heavy. Please wait a while and try again.}
     *
     * \note
     *      Although the name and the text imply that it is the server's load
     *      that causes this reply, in practice it seems to be sent whenever
     *      a user attempts to request too much information from a server.
     *      For example, if you attempt too many STATS requests in a short
     *      period of time, you will get this error. 
     */
    const RPL_LOAD2HI               = NULL;

    /**
     * \brief
     *      Returned after a module was
     *      successfully loaded.
     *
     * \format{<module> :Module <module> successfully loaded}
     */
    const RPL_LOADEDMODULE          = NULL;

    /**
     * \TODO
     *
     * \format{:Current local users: <nb local users> Max: <max local users>}
     * \format{:Current Local Users: <nb local users>  Max: <max local users>}
     * \format{:Current local users: <nb local users>  Max: <max local users>}
     * \format{<nb local users> <max local users> :Current local users <nb local users>, max <max local users>}
     *
     * \note
     *      Though the general format for this numeric is roughly the same
     *      for every IRCd, multiple variations can be found in the wild,
     *      making it quite hard to parse this numeric.
     */
    const RPL_LOCALUSERS            = NULL;

    /**
     * \brief
     *      Sent when someone on your watch list logs offline.
     *
     * \format{<nick> <ident> <host> <timestamp> :logged offline}
     */
    const RPL_LOGOFF                = NULL;

    /**
     * \brief
     *      Sent when someone on your watch list logs online.
     *
     * \format{<nick> <ident> <host> <timestamp> :logged online}
     */
    const RPL_LOGON                 = NULL;

    /**
     * \brief
     *      Sent in response to a LUSERS message to indicate
     *      how many IRC channels have been formed, if any.
     *
     * \format{<integer> :channels formed}
     */
    const RPL_LUSERCHANNELS         = NULL;

    /**
     * \brief
     *      In processing an LUSERS message, the server
     *      sends this numeric to indicate how many clients
     *      and servers are connected (global count).
     *
     * \format{:There are <integer> users and <integer> services on <integer> servers}
     */
    const RPL_LUSERCLIENT           = NULL;

    /**
     * \brief
     *      In processing an LUSERS message, the server
     *      sends this numeric to indicate how many clients
     *      and servers are connected (local count).
     *
     * \format{:I have <integer> clients and <integer> servers}
     */
    const RPL_LUSERME               = NULL;

    /**
     * \brief
     *      Sent in response to a LUSERS message to indicate
     *      how many IRC operators are currently connected,
     *      if any.
     *
     * \format{<integer> :operator(s) online}
     */
    const RPL_LUSEROP               = NULL;

    /**
     * \brief
     *      Sent in response to a LUSERS message to indicate
     *      how many unknown connections there are, if any.
     *
     * \format{<integer> :unknown connection(s)}
     */
    const RPL_LUSERUNKNOWN          = NULL;

    /**
     * \brief
     *      Sent as a response to a MAP command,
     *      with information on the network's map.
     *
     * \note
     *      Unfortunately, the format of this numeric
     *      changes heavily depending on the IRCd.
     */
    const RPL_MAP                   = NULL;

    /**
     * \brief
     *      Marks the end of the network's map.
     *
     * \format{:End of /MAP}
     */
    const RPL_MAPEND                = NULL;

    /**
     * \brief
     *      Sent as a response to a MAP command,
     *      to indicate that the network contains
     *      more servers than what was displayed.
     *
     * \note
     *      Unfortunately, the format of this numeric
     *      changes heavily depending on the IRCd.
     */
    const RPL_MAPMORE               = NULL;

    /**
     * \TODO
     */
    const RPL_MAPSTART              = NULL;

    /**
     * \brief
     *      Gives statistics about certain metrics
     *      collected by the IRC server, like the
     *      number of users currently connected
     *      (globally).
     *
     * \format{:<server count> server<agreement> and <user count> user<agreement>, average <average count> users per server}
     *
     * \note
     *      "s" is automatically added to the words
     *      "server" or "user" depending on the actual
     *      number of servers and users currently
     *      connected.
     *
     * \note
     *      (InspIRCd) Part of the m_spanningtree module.
     */
    const RPL_MAPUSERS              = NULL;

    /**
     * \TODO
     */
    const RPL_MODLIST               = NULL;

    /**
     * \TODO
     */
    const RPL_MONLIST               = NULL;

    /**
     * \TODO
     */
    const RPL_MONOFFLINE            = NULL;

    /**
     * \TODO
     */
    const RPL_MONONLINE             = NULL;

    /**
     * \TODO
     */
    const RPL_MOTD                  = NULL;

    /**
     * \TODO
     */
    const RPL_MOTDSTART             = NULL;

    /**
     * \brief
     *      Supported user and channel modes.
     * 
     * \format{<servername> <version> <available user modes> <available channel modes>}
     */
    const RPL_MYINFO                = NULL;

    /**
     * \TODO
     *
     * \format{<port> :Port to local server is\r\n}
     */
    const RPL_MYPORTIS              = NULL;

    /// Alias for Erebot_Interface_Numerics::RPL_NAMREPLY.
    const RPL_NAMEREPLY             = NULL;

    /**
     * \brief
     *      This numeric is used in response to a NAMES command
     *      or upon joining a channel and contains the nicknames
     *      of users currently in the channel with their status.
     *
     * \format{<channel> :<status><nick>( <status <nick>)*}
     */
    const RPL_NAMREPLY              = NULL;

    /**
     * \TODO
     */
    const RPL_NMODEIS               = NULL;

    /// Dummy reply number. Not used.
    const RPL_NONE                  = NULL;

    /**
     * \TODO
     */
    const RPL_NOTAWAY               = NULL;

    /**
     * \TODO
     */
    const RPL_NOTESTLINE            = NULL;

    /**
     * \TODO
     */
    const RPL_NOTOPERANYMORE        = NULL;

    /**
     * \brief
     *      Sent when joining a channel or issuing
     *      a TOPIC command and no topic has been
     *      set yet.
     *
     * \format{<channel> :No topic is set}
     */
    const RPL_NOTOPIC               = NULL;

    /// Alias for Erebot_Interface_Numerics::RPL_NOTOPIC.
    const RPL_NOTOPICSET            = NULL;

    /**
     * \TODO
     */
    const RPL_NOUSERS               = NULL;

    /**
     * \brief
     *      Sent when the client sets an AWAY message.
     *
     * \format{:You have been marked as being away}
     */
    const RPL_NOWAWAY               = NULL;

    /**
     * \TODO
     */
    const RPL_NOWISAWAY             = NULL;

    /**
     * \brief
     *      Sent after a nick has been added to your watch list
     *      and that person is currently offline.
     *
     * \format{<nick> * * 0 :is offline}
     */
    const RPL_NOWOFF                = NULL;

    /**
     * \brief
     *      Sent after a nick has been added to your watch list
     *      and that person is currently online.
     *
     * \format{<nick> <ident> <host> <timestamp> :is online}
     */
    const RPL_NOWON                 = NULL;

    /**
     * \TODO
     */
    const RPL_OMOTD                 = NULL;

    /**
     * \TODO
     */
    const RPL_OMOTDSTART            = NULL;

    /**
     * \TODO
     */
    const RPL_OPERMOTD              = NULL;

    /**
     * \TODO
     */
    const RPL_OPERMOTDSTART         = NULL;

    /**
     * \TODO
     */
    const RPL_PRIVS                 = NULL;

    /**
     * \TODO
     */
    const RPL_PROTOCTL              = NULL;

    /**
     * \TODO
     */
    const RPL_QLIST                 = NULL;

    /**
     * \TODO
     */
    const RPL_REAWAY                = NULL;

    /// Alias for Erebot_Interface_Numerics::RPL_BOUNCE.
    const RPL_REDIR                 = NULL;

    /**
     * \brief
     *      If the REHASH option is used and an operator sends
     *      a REHASH message, an RPL_REHASHING is sent back to
     *      the operator.
     *
     * \format{<config file> :Rehashing}
     */
    const RPL_REHASHING             = NULL;

    /**
     * \TODO
     */
    const RPL_REMOTEISUPPORT        = NULL;

    /**
     * \TODO
     */
    const RPL_REOPLIST              = NULL;

    /**
     * \TODO
     */
    const RPL_RSACHALLENGE          = NULL;

    /**
     * \TODO
     */
    const RPL_RSACHALLENGE2         = NULL;

    /**
     * \brief
     *      This numeric is sent to you for every
     *      rule in use on this server.
     *
     * \format{:- <rule>}
     */
    const RPL_RULES                 = NULL;

    /// Alias for Erebot_Interface_Numerics::RPL_ENDOFRULES.
    const RPL_RULESEND              = NULL;

    /// Alias for Erebot_Interface_Numerics::RPL_RULESTART.
    const RPL_RULESSTART            = NULL;

    /**
     * \brief
     *      Marks the start of the server rules.
     *
     * \format{:- <server> Server Rules - }
     */
    const RPL_RULESTART             = NULL;

    /**
     * \brief
     *      Reply to a R(egexp) WHO command.
     */
    const RPL_RWHOREPLY             = NULL;

    /**
     * \TODO
     */
    const RPL_SAVENICK              = NULL;

    /// Alias for Erebot_Interface_Numerics::RPL_CREATED.
    const RPL_SERVERCREATED         = NULL;

    /// Alias for Erebot_Interface_Numerics::RPL_MYINFO.
    const RPL_SERVERVERSION         = NULL;

    /// Unused numeric.
    const RPL_SERVICE               = NULL;

    /// Unused numeric.
    const RPL_SERVICEINFO           = NULL;

    /**
     * \brief
     *      When listing services in reply to a SERVLIST message,
     *      a separate RPL_SERVLIST is sent for each service.
     *
     * \format{<name> <server> <mask> <type> <hopcount> <info>}
     */
    const RPL_SERVLIST              = NULL;

    /**
     * \brief
     *      Marks the end of the list of services,
     *      sent in response to a SERVLIST message.
     *
     * \format{<mask> <type> :End of service listing}
     */
    const RPL_SERVLISTEND           = NULL;

    /**
     * \TODO
     */
    const RPL_SETTINGS              = NULL;

    /**
     * \brief
     *      This numeric is sent in reply to a SILENCE
     *      command with no argument for each entry in
     *      your silence list.
     *
     * \format{<mask>}
     */
    const RPL_SILELIST              = NULL;

    /**
     * \TODO
     */
    const RPL_SNOMASK               = NULL;

    /**
     * \TODO
     */
    const RPL_SNOMASKIS             = NULL;

    /**
     * \TODO
     */
    const RPL_SPAMCMDFWD            = NULL;

    /**
     * \TODO
     */
    const RPL_SQLINE                = NULL;

    /**
     * \TODO
     */
    const RPL_SQLINE_NICK           = NULL;

    /// Alias for Erebot_Interface_Numerics::RPL_STARTTLSOK.
    const RPL_STARTTLS              = NULL;

    /**
     * \brief
     *      Returned to a client after a STARTTLS command to indicate
     *      that the server is ready to proceed with data encrypted
     *      using the SSL/TLS protocol.
     *
     * \format{:STARTTLS successful\, go ahead with TLS handshake}
     *
     * \note
     *      Upon receiving this message, the client should proceed
     *      with a TLS handshake. Once the handshake is completed,
     *      data may be exchanged securely between the server and
     *      the client.
     */
    const RPL_STARTTLSOK            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSALINE            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSBANVER           = NULL;

    /**
     * \brief
     *      This numeric is used for every entry configured
     *      through B-lines (bounces).
     *
     * \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSBLINE            = NULL;

    /**
     * \brief
     *      This numeric is used for every entry configured
     *      through C-lines (connect).
     *
     * \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSCLINE            = NULL;

    /**
     * \TODO
     *
     * \format{D <IP address> <soft local limit> <soft global limit> <global limit>}
     */
    const RPL_STATSCLONE            = NULL;

    /**
     * \brief
     *      Reports statistics on commands usage.
     *
     * \format{<command> <count> <byte count> <remote count>}
     */
    const RPL_STATSCOMMANDS         = NULL;

    /**
     * \TODO
     *
     * \format{:Highest connection count: <nb connections> (<nb clients> clients)}
     * \format{:Highest connection count: <nb connections> (<nb clients> clients) (<SYNs> connections received)}
     */
    const RPL_STATSCONN             = NULL;

    /**
     * \TODO
     */
    const RPL_STATSCOUNT            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSDEBUG            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSDEFINE           = NULL;

    /**
     * \brief
     *      This numeric is used for every entry configured
     *      through D-lines (deny link).
     *
     * \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSDLINE            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSELINE            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSENGINE           = NULL;

    /**
     * \TODO
     */
    const RPL_STATSEXCEPTTKL        = NULL;

    /**
     * \TODO
     */
    const RPL_STATSFLINE            = NULL;  // UltimateIRCd

    /**
     * \TODO
     */
    const RPL_STATSGLINE            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSHELP             = NULL;

    /**
     * \brief
     *      This numeric is used for every entry configured
     *      through H-lines (hub).
     *
     * \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSHLINE            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSIAUTH            = NULL;

    /**
     * \brief
     *      This numeric is used for every entry configured
     *      through I-lines (allow).
     *
     * \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSILINE            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSJLINE            = NULL;

    /**
     * \brief
     *      This numeric is used for every entry configured
     *      through K-lines (ban user).
     *
     * \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSKLINE            = NULL;

    /**
     * \brief
     *      Reports statistics on a connection.
     *
     * \format{<linkname> <sendq> <sent messages> <sent Kbytes> <received messages> <received Kbytes> <time open>}
     *
     *  <tt>\<linkname\></tt> identifies the particular connection,
     *  <tt>\<sendq\></tt> is the amount of data that is queued and
     *  waiting to be sent <tt>\<sent messages\></tt> the number of
     *  messages sent, and <tt>\<sent Kbytes\></tt> the amount of
     *  data sent, in Kbytes.
     *  <tt>\<received messages\></tt> and <tt>\<received Kbytes\></tt> are
     *  the equivalent of <tt>\<sent messages\></tt> and <tt>\<sent Kbytes\></tt>
     *  for received data, respectively.
     *  <tt>\<time open\></tt> indicates how long ago the connection
     *  was opened, in seconds.
     */
    const RPL_STATSLINKINFO         = NULL;

    /**
     * \brief
     *      This numeric is used for every entry configured
     *      through L-lines (leaf).
     *
     * \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSLLINE            = NULL;

    /**
     * \brief
     *      This numeric is used for every entry configured
     *      through N-lines (accept connection).
     *
     * \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSNLINE            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSOLDNLINE         = NULL;

    /**
     * \brief
     *      This numeric is used for every entry configured
     *      through O-lines (oper).
     *
     * \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSOLINE            = NULL;

    /**
     * \TODO
     *
     * \format{<buffer> <sequence #> <# received> <mean pings in window> <preference value>}
     */
    const RPL_STATSPING             = NULL;

    /**
     * \TODO
     */
    const RPL_STATSPLINE            = NULL;

    /**
     * \brief
     *      This numeric is used for every entry configured
     *      through Q-lines (ban nick).
     *
     * \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSQLINE            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSRLINE            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSSLINE            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSSPAMF            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSTLINE            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSULINE            = NULL;

    /**
     * \brief
     *      Reports the server uptime.
     *
     * \format{:Server Up <days> days <hours>:<minutes>:<seconds>}
     */
    const RPL_STATSUPTIME           = NULL;

    /**
     * \TODO
     */
    const RPL_STATSVERBOSE          = NULL;

    /**
     * \brief
     *      This numeric is used for every entry configured
     *      through V-lines (deny version).
     *
     * \note
     *      A deny version list is used to prevent linking
     *      to another IRC server depending on the version
     *      and compile flags for the IRCd used by that
     *      server.
     *
     * \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSVLINE            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSXLINE            = NULL;

    /**
     * \brief
     *      This numeric is used for every entry configured
     *      through Y-lines (class).
     *
     * \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSYLINE            = NULL;

    /**
     * \TODO
     */
    const RPL_STATSZLINE            = NULL;

    /**
     * \brief
     *      Returned by a server answering a SUMMON message to
     *      indicate that it is summoning that user.
     *
     * \format{<user> :Summoning user to IRC}
     */
    const RPL_SUMMONING             = NULL;

    /**
     * \brief
     *      Returned by InspIRCd to indicate a mistake
     *      regarding the syntax of a command and to
     *      provide a hint as to the correct syntax.
     *
     * \format{:SYNTAX <command> <syntax>}
     */
    const RPL_SYNTAX                = NULL;

    /**
     * \TODO
     */
    const RPL_TARGNOTIFY            = NULL;

    /**
     * \TODO
     */
    const RPL_TARGUMODEG            = NULL;

    /**
     * \TODO
     */
    const RPL_TESTLINE              = NULL;

    /**
     * \TODO
     */
    const RPL_TESTMASK              = NULL;

    /**
     * \TODO
     */
    const RPL_TESTMASKGECOS         = NULL;

    /**
     * \TODO
     */
    const RPL_TEXT                  = NULL;

    /**
     * \brief
     *      When replying to the TIME message, a server MUST send
     *      the reply using the RPL_TIME format below.
     *
     * \format{<server> :<string showing server's local time>}
     *
     * \note
     *      The string showing the time need only contain the correct
     *      time there. There is no further requirement for the day
     *      and time string.
     */
    const RPL_TIME                  = NULL;

    /**
     * \brief
     *      Sent when joining a channel or issuing
     *      a TOPIC command; contains the current
     *      topic.
     *
     * \format{<channel> :<topic>}
     */
    const RPL_TOPIC                 = NULL;

    /// Alias for Erebot_Interface_Numerics::RPL_TOPICWHOTIME.
    const RPL_TOPICTIME             = NULL;

    /**
     * \TODO
     *
     * \format{<channel> <nick> <timestamp>}
     */
    const RPL_TOPICWHOTIME          = NULL;

    /**
     * \TODO
     */
    const RPL_TOPIC_WHO_TIME        = NULL;

    /**
     * \TODO
     */
    const RPL_TRACECAPTURED         = NULL;

    /**
     * \brief
     *      Used when tracing connections to give information
     *      on a class of connections.
     *
     * \format{Class <class> <count>}
     */
    const RPL_TRACECLASS            = NULL;

    /**
     * \brief
     *      Used when tracing connections which have not been
     *      fully established and are still attempting to connect.
     *
     * \format{Try. <class> <server>}
     */
    const RPL_TRACECONNECTING       = NULL;

    /**
     * \brief
     *      RPL_TRACEEND is sent to indicate the end of the list
     *      of replies to a TRACE command.
     *
     * \format{<server name> <version & debug level> :End of TRACE}
     */
    const RPL_TRACEEND              = NULL;

    /**
     * \brief
     *      Used when tracing connections which have not been
     *      fully established and are in the process of completing
     *      the "server handshake".
     *
     * \format{H.S. <class> <server>}
     */
    const RPL_TRACEHANDSHAKE        = NULL;

    /**
     * \brief
     *      RPL_TRACELINK is sent by any server which handles
     *      a TRACE message and has to pass it on to another
     *      server.
     *
     * \format{Link <version & debug level> <destination> <next server> V<protocol version> <link uptime in seconds> <backstream sendq> <upstream sendq>}
     */
    const RPL_TRACELINK             = NULL;

    /**
     * \brief
     *      Used to indicate that TRACE information is being logged
     *      to a file on the IRC server.
     *
     * \format{File <logfile> <debug level>}
     */
    const RPL_TRACELOG              = NULL;

    /**
     * \brief
     *      RPL_TRACENEWTYPE is to be used for any connection
     *      which does not fit in the other categories but is
     *      being displayed anyway.
     *
     * \format{<newtype> 0 <client name>}
     */
    const RPL_TRACENEWTYPE          = NULL;

    /**
     * \brief
     *      Used when tracing connections to give information
     *      on IRC operators.
     *
     * \format{Oper <class> <nick>}
     */
    const RPL_TRACEOPERATOR         = NULL;

    /**
     * \brief
     *      Unused numeric.
     */
    const RPL_TRACERECONNECT        = NULL;

    /**
     * \brief
     *      Used when tracing connections to give information
     *      on IRC servers.
     *
     * \format{Serv <class> <int>S <int>C <server> <nick!user|*!*>@<host|server> V<protocol version>}
     */
    const RPL_TRACESERVER           = NULL;

    /**
     * \brief
     *      Used when tracing connections to give information
     *      on IRC services.
     *
     * \format{Service <class> <name> <type> <active type>}
     */
    const RPL_TRACESERVICE          = NULL;

    /**
     * \brief
     *      Used when tracing connections which have not been
     *      fully established and are unknown.
     *
     * \format{???? <class> [<client IP address in dot form>]}
     */
    const RPL_TRACEUNKNOWN          = NULL;

    /**
     * \brief
     *      Used when tracing connections to give information
     *      on (non-operator) IRC clients.
     *
     * \format{User <class> <nick>}
     */
    const RPL_TRACEUSER             = NULL;

    /**
     * \brief
     *      When a server drops a command without processing it,
     *      it MUST use the reply RPL_TRYAGAIN to inform the
     *      originating client.
     *
     * \format{<command> :Please wait a while and try again.}
     *
     * \note
     *      This is mostly an alias for Erebot_Interface_Numerics::RPL_LOAD2HI
     *      except the text is worded slightly differently.
     */
    const RPL_TRYAGAIN              = NULL;

    /**
     * \TODO
     */
    const RPL_UMODEGMSG             = NULL;

    /**
     * \brief
     *      To answer a query about a client's own mode,
     *      RPL_UMODEIS is sent back.
     *
     * \format{<user mode string>}
     */
    const RPL_UMODEIS               = NULL;

    /**
     * \brief
     *      Sent went the client removes an AWAY message.
     *
     * \format{:You are no longer marked as being away}
     */
    const RPL_UNAWAY                = NULL;

    /**
     * \brief
     *      This numeric is used to indicate the creator
     *      of a local IRC channel.
     *
     * \format{<channel> <creator>}
     */
    const RPL_UNIQOPIS              = NULL;

    /**
     * \brief
     *      Returned after a module was
     *      successfully unloaded.
     *
     * \format{<module> :Module <module> successfully unloaded}
     */
    const RPL_UNLOADEDMODULE        = NULL;

    /**
     * \brief
     *      Reply format used by USERHOST to list
     *      replies to the query list.
     *
     * \format{:*1<reply> *( " " <reply> )}
     *
     * The reply string is composed as follows:
     *
     * \code reply = nickname [ "*" ] "=" ( "+" / "-" ) hostname \endcode
     *
     * The '*' indicates whether the client has registered
     * as an Operator.  The '-' or '+' characters represent
     * whether the client has set an AWAY message or not
     * respectively.
     */
    const RPL_USERHOST              = NULL;

    /**
     * \TODO
     */
    const RPL_USERIP                = NULL;

    /**
     * \TODO
     */
    const RPL_USERS                 = NULL;

    /**
     * \TODO
     */
    const RPL_USERSSTART            = NULL;

    /**
     * \TODO
     */
    const RPL_USINGSSL              = NULL;

    /**
     * \brief
     *      Reply by the server showing its version details.
     *
     * \format{<version>.<debuglevel> <server> :<comments>}
     *
     *  The <tt>\<version\></tt> is the version of the software being
     *  used (including any patchlevel revisions) and the
     *  <tt>\<debuglevel\></tt> is used to indicate if the server is
     *  running in "debug mode".
     *
     *  The "comments" field may contain any comments about
     *  the version or further version details.
     */
    const RPL_VERSION               = NULL;

    /**
     * \brief
     *      This numeric is sent back for every entry in your
     *      watch list when the WATCH s or WATCH S command is used.
     *
     * \format{:<nick>}
     */
    const RPL_WATCHLIST             = NULL;

    /**
     * \brief
     *      Sent by the server after it receives a request
     *      to remove someone from the watch list.
     *
     * \format{<nick> <ident> <host> <timestamp> :stopped watching}
     */
    const RPL_WATCHOFF              = NULL;

    /**
     * \brief
     *      Displays how many people are on your watch list
     *      and how many have added you to their watch list.
     *
     * \format{:You have <mine> and are on <others> WATCH entries}
     */
    const RPL_WATCHSTAT             = NULL;

    /**
     * \brief
     *      First numeric sent to a client
     *      after its connection (welcome message).
     *
     * \format{Welcome to the Internet Relay Network <nick>!<user>@<host>}
     */
    const RPL_WELCOME               = NULL;

    /**
     * \TODO
     */
    const RPL_WHOHOST               = NULL;

    /**
     * \TODO
     */
    const RPL_WHOISACCOUNT          = NULL;

    /**
     * \TODO
     */
    const RPL_WHOISACTUALLY         = NULL;

    /**
     * \TODO
     */
    const RPL_WHOISADMIN            = NULL;

    /**
     * \TODO
     */
    const RPL_WHOISBOT              = NULL;

    /**
     * \brief
     *      Sent in response to a WHOIS, listing
     *      the public channels the target user is on.
     *
     * \format{<nick> :*( ( "@" / "+" ) <channel> " " )}
     *
     * \note
     *      For each reply set, RPL_WHOISCHANNELS may appear
     *      more than once (for long lists of channel names).
     *
     * \note
     *      The '@' and '+' characters next to the channel name
     *      indicate whether a client is a channel operator or
     *      has been granted permission to speak on a moderated
     *      channel.
     */
    const RPL_WHOISCHANNELS         = NULL;

    /**
     * \brief
     *      Redundant and not needed but reserved.
     */
    const RPL_WHOISCHANOP           = NULL;

    /**
     * \TODO
     */
    const RPL_WHOISHELPOP           = NULL;

    /**
     * \TODO
     */
    const RPL_WHOISHOST             = NULL;

    /**
     * \brief
     *      Sent in response to a WHOIS, indicating
     *      how much time the target user has spent idle.
     *
     * \format{<nick> <integer> :seconds idle}
     */
    const RPL_WHOISIDLE             = NULL;

    /**
     * \TODO
     */
    const RPL_WHOISLOGGEDIN         = NULL;

    /**
     * \TODO
     */
    const RPL_WHOISMODES            = NULL;

    /**
     * \brief
     *      Sent in response to a WHOIS, indicating
     *      that the target user is an IRC operator.
     *
     * \format{<nick> :is an IRC operator}
     */
    const RPL_WHOISOPERATOR         = NULL;

    /**
     * \TODO
     */
    const RPL_WHOISREGNICK          = NULL;

    /**
     * \TODO
     */
    const RPL_WHOISSADMIN           = NULL;

    /**
     * \TODO
     */
    const RPL_WHOISSECURE           = NULL;

    /**
     * \brief
     *      Sent in response to a WHOIS or WHOWAS,
     *      indicating the IRC server the target user
     *      was connected to.
     *
     * \format{<user> <server> :<other information>}
     */
    const RPL_WHOISSERVER           = NULL;

    /**
     * \TODO
     */
    const RPL_WHOISSERVICES         = NULL;

    /**
     * \TODO
     */
    const RPL_WHOISSPECIAL          = NULL;

    /**
     * \TODO
     */
    const RPL_WHOISSVCMSG           = NULL;

    /**
     * \TODO
     *
     * \format{<user> :User is squelched (warned)}
     * \format{<user> :User is squelched (silent)}
     */
    const RPL_WHOISTEXT             = NULL;

    /**
     * \brief
     *      Sent in response to a WHOIS, giving
     *      a few information on the target user.
     *
     * \format{<nick> <user> <host> * :<real name>}
     *
     * \note
     *      The '*' in RPL_WHOISUSER is there as the
     *      literal character and not as a wild card.
     */
    const RPL_WHOISUSER             = NULL;

    /**
     * \brief
     *      Sent back for every user that matches the criteria
     *      for the current WHO command.
     *
     * \format{<channel> <user name> <hostname> <server> <nick> <status> :<hops> <realname>}
     */
    const RPL_WHOREPLY              = NULL;

    /**
     * \TODO
     */
    const RPL_WHOSPCRPL             = NULL;

    /**
     * \brief
     *      Sent in response to a WHOWAS, giving
     *      information on the target user.
     *
     * \format{<nick> <user> <host> * :<real name>}
     */
    const RPL_WHOWASUSER            = NULL;

    /// Alias for Erebot_Interface_Numerics::RPL_YOUREOPER.
    const RPL_YOUAREOPER            = NULL;

    /**
     * \brief
     *      Returned by InspIRCd when a VHOST is used.
     *
     * \format{<hostname> :is now your displayed host}
     */
    const RPL_YOURDISPLAYEDHOST     = NULL;

    /**
     * \brief
     *      RPL_YOUREOPER is sent back to a client which has
     *      just successfully issued an OPER message and gained
     *      operator status.
     *
     * \format{:You are now an IRC operator}
     */
    const RPL_YOUREOPER             = NULL;

    /**
     * \brief
     *      Sent by the server to a service upon successful
     *      registration.
     *
     * \format{You are service <servicename>}
     */
    const RPL_YOURESERVICE          = NULL;

    /**
     * \brief
     *      Gives the name/version of the server we're connected to.
     *
     * \format{Your host is <servername>\, running version <ver>}
     */
    const RPL_YOURHOST              = NULL;

    /// Alias for Erebot_Interface_Numerics::RPL_YOURHOST.
    const RPL_YOURHOSTIS            = NULL;

    /**
     * \brief
     *      Sent on connect by some IRC servers
     *      to notify the newly-connected user
     *      about his unique user ID.
     *
     * \format{<UUID> :your unique ID}
     */
    const RPL_YOURID                = NULL;

    /// Alias for Erebot_Interface_Numerics::RPL_YOURID.
    const RPL_YOURUUID              = NULL;
}

