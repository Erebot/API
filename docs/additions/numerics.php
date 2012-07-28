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
class   Erebot_Interface_Numerics
{
    /**
     * \brief
     *      Gives information of the specific commands/options
     *      supported by the server.
     *
     * \format{"<features+> :are supported by this server"}
     *
     * \note
     *      This numeric conflicts with the one defined in RFC 2812
     *      for RPL_BOUNCE.
     */
    const RPL_ISUPPORT              = NULL;

    const RPL_STATSCLONE            = NULL;

    const RPL_WHOISTEXT             = NULL;

    /**
     * \brief
     *      Reply to a R(egexp) WHO command.
     */
    const RPL_RWHOREPLY             = NULL;

    const ERR_NOCTRLSONCHAN         = NULL;

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
     * \format{":Error! \"/msg %s\" is no longer supported.
                Use \"/msg %s@%s\" or \"/%s\" instead."}
     */
    const ERR_MSGSERVICES           = NULL;

    /**
     * \brief
     *      Returned to a user trying to send a message
     *      to a person they share no common channel with
     *      and user mode +C is enabled for that person.
     *
     * \format{":You cannot message that person because you
     *          do not share a common channel with them."}
     */
    const ERR_NOSHAREDCHAN          = NULL;

    /**
     *  \TODO
     *
     * \format{":You cannot message that person while you are <mode>,
     *          so your message was not sent"}
     */
    const ERR_OWNMODE               = NULL;

    const RPL_STATSCONN             = NULL;

    const RPL_LOCALUSERS            = NULL;

    const RPL_GLOBALUSERS           = NULL;

    const RPL_CREATIONTIME          = NULL;

    const RPL_TOPICWHOTIME          = NULL;

    const ERR_BANNICKCHANGE         = NULL;

    const ERR_SERVICESDOWN          = NULL;

    const ERR_ONLYSERVERSCANCHANGE  = NULL;

    const ERR_NEEDREGGEDNICK        = NULL;

    const ERR_NONONREG              = NULL;

    const ERR_LISTSYNTAX            = NULL;

    /**
     *  \brief
     *      Gives statistics about certain metrics
     *      collected by the IRC server, like the
     *      number of users currently connected
     *      (globally).
     *
     *  \format{
     *      ":<server count> server<agreement> and <user count>
     *      user<agreement>, average <average count> users per server"
     *  }
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
    const RPL_MAPUSERS              = NULL;

    /**
     *  \brief
     *      Returned by InspIRCd to indicate a mistake
     *      regarding the syntax of a command and to
     *      provide a hint as to the correct syntax.
     *
     *  \format{":SYNTAX <command> <syntax>"}
     */
    const RPL_SYNTAX                = NULL;

    /**
     *  \brief
     *      Returned by InspIRCd when a VHOST is used.
     *
     *  \format{"<hostname> :is now your displayed host"}
     */
    const RPL_YOURDISPLAYEDHOST     = NULL;

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
    const ERR_INVALIDCAPSUBCOMMAND  = NULL;

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
    const ERR_ALLMUSTSSL            = NULL;

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
    const ERR_DELAYREJOIN           = NULL;

    /**
     *  \brief
     *      Returned when someone tries to set
     *      an invalid server notice mask.
     *
     *  \format{"<mask> :is unknown snomask char to me"}
     */
    const ERR_UNKNOWNSNOMASK        = NULL;

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
    const ERR_CANTSENDTOUSER        = NULL;

    /**
     *  \brief
     *      Sent in response to a COMMANDS command,
     *      one RPL_COMMAND is returned for each
     *      extra command supported by the server.
     *
     *  \format{":<command> <module> <min. parameters> <penalty>"}
     */
    const RPL_COMMANDS              = NULL;

    /**
     *  \brief
     *      Sent in response to a COMMANDS command,
     *      marks the end of the server's response.
     *
     *  \format{":End of COMMANDS list"}
     */
    const RPL_COMMANDSEND           = NULL;

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
    const ERR_WORDFILTERED          = NULL;

    /**
     *  \brief
     *      Returned when the server failed to unload
     *      a module.
     *
     *  \format{"<module> :Failed to unload module <module>: <reason>"}
     */
    const ERR_CANTUNLOADMODULE      = NULL;


    /**
     *  \brief
     *      Returned after a module was
     *      successfully unloaded.
     *
     *  \format{"<module> :Module <module> successfully unloaded"}
     */
    const RPL_UNLOADEDMODULE        = NULL;


    /**
     *  \brief
     *      Returned when the server
     *      could not load a module.
     *
     *  \format{"<module> :Failed to load module <module>: <reason>"}
     */
    const ERR_CANTLOADMODULE        = NULL;


    /**
     *  \brief
     *      Returned after a module was
     *      successfully loaded.
     *
     *  \format{"<module> :Module <module> successfully loaded"}
     */
    const RPL_LOADEDMODULE          = NULL;

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
     * \brief
     *      Marks the end of the network's map.
     *
     * \format{":End of /MAP"}
     */
    const RPL_MAPEND                = NULL;

    const RPL_SERVICEINFO           = NULL;

    const RPL_ENDOFSERVICES         = NULL;

    const RPL_SERVICE               = NULL;

    /// Dummy reply number. Not used.
    const RPL_NONE                  = NULL;

    const RPL_KILLDONE              = NULL;

    const RPL_CLOSING               = NULL;

    const RPL_CLOSEEND              = NULL;

    const RPL_INFOSTART             = NULL;

    const RPL_MYPORTIS              = NULL;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through C-lines (connect).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSCLINE            = NULL;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through N-lines (accept connection).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSNLINE            = NULL;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through I-lines (allow).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSILINE            = NULL;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through K-lines (ban user).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSKLINE            = NULL;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through Q-lines (ban nick).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSQLINE            = NULL;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through Y-lines (class).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSYLINE            = NULL;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through V-lines (deny version).
     *
     *  \note
     *      A deny version list is used to prevent linking
     *      to another IRC server depending on the version
     *      and compile flags for the IRCd used by that
     *      server.
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSVLINE            = NULL;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through L-lines (leaf).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSLLINE            = NULL;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through H-lines (hub).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSHLINE            = NULL;

    const RPL_STATSSLINE            = NULL;

    const RPL_STATSPING             = NULL;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through B-lines (bounces).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSBLINE            = NULL;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through D-lines (deny link).
     *
     * \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSDLINE            = NULL;

    /**
     * \brief
     *      This numeric is not used anymore.
     */
    const ERR_NOSERVICEHOST         = NULL;

    /**
     *  \brief
     *      Used when tracing connections to give information
     *      on a class of connections.
     *
     *  \format{"Class <class> <count>"}
     */
    const RPL_TRACECLASS            = NULL;

    /**
     *  \brief
     *      When listing services in reply to a SERVLIST message,
     *      a separate RPL_SERVLIST is sent for each service.
     *
     *  \format{"<name> <server> <mask> <type> <hopcount> <info>"}
     */
    const RPL_SERVLIST              = NULL;

    /**
     *  \brief
     *      Marks the end of the list of services,
     *      sent in response to a SERVLIST message.
     *
     *  \format{"<mask> <type> :End of service listing"}
     */
    const RPL_SERVLISTEND           = NULL;

    /**
     * \brief
     *      Sent by a server to a user to inform him/her
     *      that access to the server will soon be denied.
     *
     * \format{""}
     */
    const ERR_YOUWILLBEBANNED       = NULL;

    /**
     * \brief
     *      This numeric is sent back to you if you specify
     *      an invalid mask for a channel.
     *
     * \format{"<chan mask> :Bad Channel Mask"}
     */
    const ERR_BADCHANMASK           = NULL;

    /**
     * \brief
     *      Sent when an invalid numeric is received.
     *
     * \format{"Numeric error! yikes!"}
     * \format{"Numeric error!"}
     *
     * \note
     *      UnrealIRCd uses the shorter version,
     *      the longer one being used by Bahamut.
     *
     * \note
     *      Due to the absence of a leading ':',
     *      both messages are decoded as 3 separate
     *      tokens by IRC clients rather than a
     *      single token containing the full message.
     */
    const ERR_NUMERIC_ERR           = NULL;

    /**
     *  \brief
     *      RPL_TRACELINK is sent by any server which handles
     *      a TRACE message and has to pass it on to another
     *      server.
     *
     *  \format{
     *      "Link \<version & debug level\> \<destination\>
     *      \<next server\> V\<protocol version\>
     *      \<link uptime in seconds\> \<backstream sendq\>
     *      \<upstream sendq\>"
     *  }
     */
    const RPL_TRACELINK             = NULL;

    /**
     *  \brief
     *      Used when tracing connections which have not been
     *      fully established and are still attempting to connect.
     *
     *  \format{"Try. <class> <server>"}
     */
    const RPL_TRACECONNECTING       = NULL;

    /**
     *  \brief
     *      Used when tracing connections which have not been
     *      fully established and are in the process of completing
     *      the "server handshake".
     *
     *  \format{"H.S. <class> <server>"}
     */
    const RPL_TRACEHANDSHAKE        = NULL;

    /**
     *  \brief
     *      Used when tracing connections which have not been
     *      fully established and are unknown.
     *
     *  \format{"???? <class> [<client IP address in dot form>]"}
     */
    const RPL_TRACEUNKNOWN          = NULL;

    /**
     *  \brief
     *      Used when tracing connections to give information
     *      on IRC operators.
     *
     *  \format{"Oper <class> <nick>"}
     */
    const RPL_TRACEOPERATOR         = NULL;

    /**
     *  \brief
     *      Used when tracing connections to give information
     *      on (non-operator) IRC clients.
     *
     *  \format{"User <class> <nick>"}
     */
    const RPL_TRACEUSER             = NULL;

    /**
     *  \brief
     *      Used when tracing connections to give information
     *      on IRC servers.
     *
     *  \format{
     *      "Serv <class> <int>S <int>C <server>
     *      <nick!user|*!*>@<host|server> V<protocol version>"
     *  }
     */
    const RPL_TRACESERVER           = NULL;

    /**
     *  \brief
     *      Used when tracing connections to give information
     *      on IRC services.
     *
     *  \format{"Service <class> <name> <type> <active type>"}
     */
    const RPL_TRACESERVICE          = NULL;

    /**
     *  \brief
     *      RPL_TRACENEWTYPE is to be used for any connection
     *      which does not fit in the other categories but is
     *      being displayed anyway.
     *
     *  \format{"<newtype> 0 <client name>"}
     */
    const RPL_TRACENEWTYPE          = NULL;

    /**
     *  \brief
     *      Reports statistics on a connection.
     *
     *  \format{
     *      "\<linkname\> \<sendq\> \<sent messages\>
     *      \<sent Kbytes\> \<received messages\>
     *      \<received Kbytes\> \<time open\>"
     *  }
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
     *  \brief
     *      Reports statistics on commands usage.
     *
     *  \format{"<command> <count> <byte count> <remote count>"}
     */
    const RPL_STATSCOMMANDS         = NULL;

    /**
     *  \brief
     *      Marks the end of the STATS report.
     *
     *  \format{"<stats letter> :End of STATS report"}
     */
    const RPL_ENDOFSTATS            = NULL;

    /**
     *  \brief
     *      To answer a query about a client's own mode,
     *      RPL_UMODEIS is sent back.
     *
     *  \format{"<user mode string>"}
     */
    const RPL_UMODEIS               = NULL;

    /**
     *  \brief
     *      Reports the server uptime.
     *
     *  \format{":Server Up %d days %d:%02d:%02d"}
     */
    const RPL_STATSUPTIME           = NULL;

    /**
     *  \brief
     *      This numeric is used for every entry configured
     *      through O-lines (oper).
     *
     *  \note
     *      The format for this numeric is highly dependent
     *      on the implementation.
     */
    const RPL_STATSOLINE            = NULL;

    /**
     *  \brief
     *      In processing an LUSERS message, the server
     *      sends this raw to indicate how many clients
     *      and servers are connected (global count).
     *
     *  \format{
     *      ":There are <integer> users and <integer>
     *      services on <integer> servers"
     *  }
     */
    const RPL_LUSERCLIENT           = NULL;

    /**
     *  \brief
     *      Sent in response to a LUSERS message to indicate
     *      how many IRC operators are currently connected,
     *      if any.
     *
     *  \format{"<integer> :operator(s) online"}
     */
    const RPL_LUSEROP               = NULL;

    /**
     *  \brief
     *      Sent in response to a LUSERS message to indicate
     *      how many unknown connections there are, if any.
     *
     *  \format{"<integer> :unknown connection(s)"}
     */
    const RPL_LUSERUNKNOWN          = NULL;

    /**
     *  \brief
     *      Sent in response to a LUSERS message to indicate
     *      how many IRC channels have been formed, if any.
     *
     *  \format{"<integer> :channels formed"}
     */
    const RPL_LUSERCHANNELS         = NULL;

    /**
     *  \brief
     *      In processing an LUSERS message, the server
     *      sends this raw to indicate how many clients
     *      and servers are connected (local count).
     *
     *  \format{":I have <integer> clients and <integer> servers"}
     */
    const RPL_LUSERME               = NULL;

    /**
     *  \brief
     *      Returned as the first raw in response to an
     *      ADMIN message.
     *
     *  \format{"<server> :Administrative info"}
     */
    const RPL_ADMINME               = NULL;

    /**
     *  \brief
     *      Returned in response to an ADMIN message,
     *      usually giving information on the city,
     *      state and country where the server is located.
     *
     *  \format{":<admin info>"}
     */
    const RPL_ADMINLOC1             = NULL;

    /**
     *  \brief
     *      Returned in response to an ADMIN message,
     *      usually giving information on the institution
     *      hosting the server.
     *
     *  \format{":<admin info>"}
     */
    const RPL_ADMINLOC2             = NULL;

    /**
     *  \brief
     *      Returned as the last raw in response to an
     *      ADMIN message, giving an email where the server's
     *      administrator can be reached.
     *
     *  \format{":<admin info>"}
     *
     *  \note
     *      RFC 2812 makes it a requirement that this raw
     *      contain a valid email address.
     */
    const RPL_ADMINEMAIL            = NULL;

    /**
     *  \brief
     *      Used to indicate that TRACE information is being logged
     *      to a file on the IRC server.
     *
     *  \format{"File <logfile> <debug level>"}
     */
    const RPL_TRACELOG              = NULL;

    /**
     *  \brief
     *      RPL_AWAY is sent to any client sending a
     *      PRIVMSG to a client which is away.
     *
     *  \format{"<nick> :<away message>"}
     *
     * \note
     *      RPL_AWAY is only sent by the server
     *      to which the client is connected.
     */
    const RPL_AWAY                  = NULL;

    /**
     *  \brief
     *      Reply format used by USERHOST to list
     *      replies to the query list.
     *
     *  \format{":*1<reply> *( " " <reply> )"}
     *
     * The reply string is composed as follows:
     *
     * <tt>reply = nickname [ "*" ] "=" ( "+" / "-" ) hostname</tt>
     *
     * The '*' indicates whether the client has registered
     * as an Operator.  The '-' or '+' characters represent
     * whether the client has set an AWAY message or not
     * respectively.
     */
    const RPL_USERHOST              = NULL;

    /**
     *  \brief
     *      Sent went the client removes an AWAY message.
     *
     *  \format{":You are no longer marked as being away"}
     */
    const RPL_UNAWAY                = NULL;

    /**
     *  \brief
     *      Sent when the client sets an AWAY message.
     *
     *  \format{":You have been marked as being away"}
     */
    const RPL_NOWAWAY               = NULL;

    /**
     *  \brief
     *      Sent in response to a WHOIS, giving
     *      a few information on the target user.
     *
     *  \format{"<nick> <user> <host> * :<real name>"}
     *
     *  \note
     *      The '*' in RPL_WHOISUSER is there as the
     *      literal character and not as a wild card.
     */
    const RPL_WHOISUSER             = NULL;

    /**
     *  \brief
     *      Sent in response to a WHOIS or WHOWAS,
     *      indicating the IRC server the target user
     *      was connected to.
     *
     *  \format{"<user> <server> :<other information>"}
     */
    const RPL_WHOISSERVER           = NULL;

    /**
     *  \brief
     *      Sent in response to a WHOIS, indicating
     *      that the target user is an IRC operator.
     *
     *  \format{"<nick> :is an IRC operator"}
     */
    const RPL_WHOISOPERATOR         = NULL;

    /**
     *  \brief
     *      Sent in response to a WHOWAS, giving
     *      information on the target user.
     *
     *  \format{"<nick> <user> <host> * :<real name>"}
     */
    const RPL_WHOWASUSER            = NULL;

    /**
     *  \brief
     *      Marks the end of the results to a WHO.
     *
     *  \format{"<mask> :End of /WHO list."}
     */
    const RPL_ENDOFWHO              = NULL;

    /**
     *  \brief
     *      Sent in response to a WHOIS, indicating
     *      how much time the target user has spent idle.
     *
     *  \format{"<nick> <integer> :seconds idle"}
     */
    const RPL_WHOISIDLE             = NULL;

    /**
     *  \brief
     *      The RPL_ENDOFWHOIS reply is used to mark
     *      the end of processing a WHOIS message.
     *
     *  \format{"<nick> :End of WHOIS list"}
     */
    const RPL_ENDOFWHOIS            = NULL;

    /**
     *  \brief
     *      Sent in response to a WHOIS, listing
     *      the public channels the target user is on.
     *
     *  \format{"\<nick\> :*( ( "@" / "+" ) \<channel\> " " )"}
     *
     *  \note
     *      For each reply set, RPL_WHOISCHANNELS may appear
     *      more than once (for long lists of channel names).
     *
     *  \note
     *      The '@' and '+' characters next to the channel name
     *      indicate whether a client is a channel operator or
     *      has been granted permission to speak on a moderated
     *      channel.
     */
    const RPL_WHOISCHANNELS         = NULL;

    /**
     *  \brief
     *      Obsolete raw used to mark the beginning
     *      of a reply to a LIST command.
     */
    const RPL_LISTSTART             = NULL;

    /**
     *  \brief
     *      Sent in response to a LIST command,
     *      contains the actual response data.
     *
     *  \format{"<channel> <# visible> :<topic>"}
     */
    const RPL_LIST                  = NULL;

    /**
     *  \brief
     *      Sent in response to a LIST command,
     *      marks the end of the server's response.
     *
     *  \format{":End of LIST"}
     *
     *  \note
     *      If there are no channels available to return,
     *      only Erebot_Interface_Numerics::RPL_LISTEND
     *      will be sent.
     */
    const RPL_LISTEND               = NULL;

    /**
     *  \brief
     *      Sent in response to a MODE command or upon joining
     *      an IRC channel, containing the modes that are in
     *      effect on that IRC channel.
     *
     *  \format{"<channel> <modes> <parameters>"}
     */
    const RPL_CHANNELMODEIS         = NULL;

    /**
     *  \brief
     *      Sent when joining a channel or issuing
     *      a TOPIC command and no topic has been
     *      set yet.
     *
     *  \format{"<channel> :No topic is set"}
     */
    const RPL_NOTOPIC               = NULL;

    /// Alias for Erebot_Interface_Numerics::RPL_NOTOPIC.
    const RPL_NOTOPICSET            = NULL;

    /**
     *  \brief
     *      Sent when joining a channel or issuing
     *      a TOPIC command; contains the current
     *      topic.
     *
     *  \format{"<channel> :<topic>"}
     */
    const RPL_TOPIC                 = NULL;

    /**
     *  \brief
     *      Returned by the server to indicate that the
     *      attempted INVITE message was successful and is
     *      being passed onto the end client.
     *
     *  \format{"<nick> <channel>"}
     */
    const RPL_INVITING              = NULL;

    /**
     *  \brief
     *      Returned by a server answering a SUMMON message to
     *      indicate that it is summoning that user.
     *
     *  \format{"<user> :Summoning user to IRC"}
     */
    const RPL_SUMMONING             = NULL;

    /**
     *  \brief
     *      Reply by the server showing its version details.
     *
     *  \format{"<version>.<debuglevel> <server> :<comments>"}
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
     *  \brief
     *      Sent back for every user that matches the criteria
     *      for the current WHO command.
     *
     *  \format{"<channel> <user name> <hostname> <server>
                 <nick> <status> :<hops> <realname>"}
     */
    const RPL_WHOREPLY              = NULL;

    /**
     *  \brief
     *      This numeric is used in response to a NAMES command
     *      or upon joining a channel and contains the nicknames
     *      of users currently in the channel with their status.
     *
     * \format{"<channel prefix><channel> :<status><nick>( <status <nick>)*"}
     */
    const RPL_NAMREPLY              = NULL;

    /**
     *  \brief
     *      Sent in response to a LINKS command for every server
     *      currently linked to this one that matches a given mask.
     *
     *  \note
     *      The format for this numeric changes depending
     *      on the implementation.
     */
    const RPL_LINKS                 = NULL;

    /**
     *  \brief
     *      Marks the end of the links for this server.
     *
     *  \format{"<mask> :End of /LINKS list."}
     */
    const RPL_ENDOFLINKS            = NULL;

    const RPL_ENDOFNAMES            = NULL;

    const RPL_BANLIST               = NULL;

    const RPL_ENDOFBANLIST          = NULL;

    /**
     *  \brief
     *      Sent in response to a WHOWAS, marks
     *      the end of the WHOWAS message processing.
     *
     *  \format{"<nick> :End of WHOWAS"}
     */
    const RPL_ENDOFWHOWAS           = NULL;

    const RPL_INFO                  = NULL;

    const RPL_MOTD                  = NULL;

    const RPL_ENDOFINFO             = NULL;

    const RPL_MOTDSTART             = NULL;

    const RPL_ENDOFMOTD             = NULL;

    /**
     *  \brief
     *      RPL_YOUREOPER is sent back to a client which has
     *      just successfully issued an OPER message and gained
     *      operator status.
     *
     *  \format{":You are now an IRC operator"}
     */
    const RPL_YOUREOPER             = NULL;

    /**
     *  \brief
     *      If the REHASH option is used and an operator sends
     *      a REHASH message, an RPL_REHASHING is sent back to
     *      the operator.
     *
     *  \format{"<config file> :Rehashing"}
     */
    const RPL_REHASHING             = NULL;

    /**
     *  \brief
     *      When replying to the TIME message, a server MUST send
     *      the reply using the RPL_TIME format below.
     *
     *  \format{"<server> :<string showing server's local time>"}
     *
     *  \note
     *      The string showing the time need only contain the correct
     *      time there. There is no further requirement for the day
     *      and time string.
     */
    const RPL_TIME                  = NULL;

    const RPL_USERSSTART            = NULL;

    const RPL_USERS                 = NULL;

    const RPL_ENDOFUSERS            = NULL;

    const RPL_NOUSERS               = NULL;

    /**
     *  \brief
     *      Used to indicate the nickname parameter
     *      supplied to a command is currently unused.
     *
     *  \format{"<nickname> :No such nick/channel"}
     */
    const ERR_NOSUCHNICK            = NULL;

    /**
     *  \brief
     *      Used to indicate the server name given
     *      currently doesn't exist.
     *
     *  \format{"<server name> :No such server"}
     */
    const ERR_NOSUCHSERVER          = NULL;

    /**
     *  \brief
     *      Used to indicate the given channel name
     *      is invalid.
     *
     *  \format{"<channel name> :No such channel"}
     */
    const ERR_NOSUCHCHANNEL         = NULL;

    /**
     *  \brief
     *      Sent by the server when attempting to send
     *      a PRIVMSG on a channel when you're not allowed
     *      to do so.
     *
     *  \format{"<channel name> :Cannot send to channel"}
     *
     *  Sent to a user who is either (a) not on a channel
     *  which is mode +n or (b) not a chanop (or mode +v) on
     *  a channel which has mode +m set or where the user is
     *  banned and is trying to send a PRIVMSG message to
     *  that channel.
     */
    const ERR_CANNOTSENDTOCHAN      = NULL;

    /**
     *  \brief
     *      Sent to a user when they have joined the maximum
     *      number of allowed channels and they try to join
     *      another channel.
     *
     *  \format{"<channel name> :You have joined too many channels"}
     */
    const ERR_TOOMANYCHANNELS       = NULL;

    /**
     *  \brief
     *      Returned by WHOWAS to indicate there is no history
     *      information for that nickname.
     *
     *  \format{"<nickname> :There was no such nickname"}
     */
    const ERR_WASNOSUCHNICK         = NULL;

    /**
     *  \brief
     *      Used when several targets match the given parameters
     *      for a command.
     *
     *  \format{"<target> :<error code> recipients. <abort message>"}
     *
     *  There are several occasions when this raw may be used:
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
     *  \note
     *      RFC 1459 defines a slightly different (less meaningful) message:
     *      <tt>"<target> :Duplicate recipients. No message delivered"</tt>
     */
    const ERR_TOOMANYTARGETS        = NULL;

    /**
     *  \brief
     *      PING or PONG message missing the originator parameter.
     *
     *  \format{":No origin specified"}
     */
    const ERR_NOORIGIN              = NULL;

    /**
     *  \brief
     *      Used to indicate a recipient was expected
     *      for the given command.
     *
     *  \format{":No recipient given (<command>)"}
     */
    const ERR_NORECIPIENT           = NULL;

    /**
     *  \brief
     *      Sent when a command did not receive any text when it was
     *      expecting some.
     *
     *  \format{":No text to send"}
     */
    const ERR_NOTEXTTOSEND          = NULL;

    /**
     *  \brief
     *      Returned when an invalid use of <tt>"PRIVMSG $<server>"</tt>
     *      or <tt>"PRIVMSG #<host>"</tt> is attempted (when it doesn't
     *      contain a top-level domain).
     *
     *  \format{"<mask> :No toplevel domain specified"}
     */
    const ERR_NOTOPLEVEL            = NULL;

    /**
     *  \brief
     *      Returned when an invalid use of <tt>"PRIVMSG $<server>"</tt>
     *      or <tt>"PRIVMSG #<host>"</tt> is attempted (when the top-level
     *      domain contains wildcard characters).
     *
     *  \format{"<mask> :Wildcard in toplevel domain"}
     */
    const ERR_WILDTOPLEVEL          = NULL;

    /**
     *  \brief
     *      Returned to a registered client to indicate that the
     *      command sent is unknown by the server.
     *
     *  \format{"<command> :Unknown command"}
     */
    const ERR_UNKNOWNCOMMAND        = NULL;

    /**
     *  \brief
     *      Server's MOTD file could not be opened by the server.
     *
     *  \format{":MOTD File is missing"}
     */
    const ERR_NOMOTD                = NULL;

    /**
     *  \brief
     *      Returned by a server in response to an ADMIN message
     *      when there is an error in finding the appropriate
     *      information.
     *
     *  \format{"<server> :No administrative info available"}
     */
    const ERR_NOADMININFO           = NULL;

    /**
     *  \brief
     *      Generic error message used to report a failed file
     *      operation during the processing of a message.
     *
     *  \format{":File error doing <file op> on <file>"}
     */
    const ERR_FILEERROR             = NULL;

    /**
     *  \brief
     *      Returned when a nickname parameter is expected
     *      for a command and isn't found.
     *
     *  \format{":No nickname given"}
     */
    const ERR_NONICKNAMEGIVEN       = NULL;

    /**
     *  \brief
     *      Returned after receiving a NICK message which contains
     *      characters which do not fall in the defined set.
     *
     *  \format{"<nick> :Erroneous nickname"}
     */
    const ERR_ERRONEUSNICKNAME      = NULL;

    /**
     *  \brief
     *      Returned when a NICK message is processed that results
     *      in an attempt to change to a currently existing
     *      nickname.
     *
     *  \format{"<nick> :Nickname is already in use"}
     */
    const ERR_NICKNAMEINUSE         = NULL;

    /**
     *  \brief
     *      Returned by a server to a client when it detects
     *      a nickname collision (registered of a NICK that
     *      already exists by another server).
     *
     *  \format{"<nick> :Nickname collision KILL from <user>@<host>"}
     */
    const ERR_NICKCOLLISION         = NULL;

    /**
     *  \brief
     *      Returned by the server to indicate that the target
     *      user of the command is not on the given channel.
     *
     *  \format{"<nick> <channel> :They aren't on that channel"}
     */
    const ERR_USERNOTINCHANNEL      = NULL;

    /**
     *  \brief
     *      Returned by the server whenever a client tries to
     *      perform a channel affecting command for which the
     *      client isn't a member.
     *
     *  \format{"<channel> :You're not on that channel"}
     */
    const ERR_NOTONCHANNEL          = NULL;

    /**
     *  \brief
     *      Returned when a client tries to invite a user to
     *      a channel they are already on.
     *
     *  \format{"<user> <channel> :is already on channel"}
     */
    const ERR_USERONCHANNEL         = NULL;

    /**
     *  \brief
     *      Returned by the summon after a SUMMON command for a
     *      user was unable to be performed since they were not
     *      logged in.
     *
     *  \format{"<user> :User not logged in"}
     */
    const ERR_NOLOGIN               = NULL;

    /**
     *  \brief
     *      Returned by any server which does not support the SUMMON command,
     *      either because it was not implemented or it was disabled (in the
     *      configuration).
     *
     *  \format{":SUMMON has been disabled"}
     */
    const ERR_SUMMONDISABLED        = NULL;

    /**
     *  \brief
     *      Returned by any server which does not support the USERS command,
     *      either because it was not implemented or it was disabled (in the
     *      configuration).
     *
     *  \format{":USERS has been disabled"}
     */
    const ERR_USERSDISABLED         = NULL;

    /**
     *  \brief
     *      Returned by the server to indicate that the client
     *      must be registered before the server will allow it
     *      to be parsed in detail.
     *
     *  \format{":You have not registered"}
     */
    const ERR_NOTREGISTERED         = NULL;

    /**
     *  \brief
     *      Returned by the server by numerous commands to
     *      indicate to the client that it didn't supply
     *      enough parameters.
     *
     *  \format{"<command> :Not enough parameters"}
     */
    const ERR_NEEDMOREPARAMS        = NULL;

    /**
     *  \brief
     *      Returned by the server to any link which tries to
     *      change part of the registered details (such as
     *      password or user details from second USER message).
     *
     *  \format{":Unauthorized command (already registered)"}
     */
    const ERR_ALREADYREGISTRED      = NULL;

    /**
     *  \brief
     *      Returned to a client which attempts to register
     *      with a server which does not been setup to allow
     *      connections from the host the attempted connection
     *      is tried.
     *
     *  \format{":Your host isn't among the privileged"}
     */
    const ERR_NOPERMFORHOST         = NULL;

    /**
     *  \brief
     *      Returned to indicate a failed attempt at registering
     *      a connection for which a password was required and
     *      was either not given or incorrect.
     *
     *  \format{":Password incorrect"}
     */
    const ERR_PASSWDMISMATCH        = NULL;

    /**
     *  \brief
     *      Returned after an attempt to connect and register
     *      yourself with a server which has been setup to
     *      explicitly deny connections to you.
     *
     *  \format{":You are banned from this server"}
     */
    const ERR_YOUREBANNEDCREEP      = NULL;

    /**
     *  \brief
     *      Sent when attempting to set a key for a channel
     *      which already has one.
     *
     *  \format{"<channel> :Channel key already set"}
     */
    const ERR_KEYSET                = NULL;

    /**
     *  \brief
     *      Returned when trying to JOIN a channel for which
     *      a limit has been set and reached.
     *
     *  \format{"<channel> :Cannot join channel (+l)"}
     */
    const ERR_CHANNELISFULL         = NULL;

    /**
     *  \brief
     *      Returned when trying to set a mode which is not
     *      recognized by the server on a channel.
     *
     *  \format{"<char> :is unknown mode char to me for <channel>"}
     *
     * Sent when the client sets an AWAY message.
     */
    const ERR_UNKNOWNMODE           = NULL;

    /**
     *  \brief
     *      Returned when trying to JOIN a channel which requires
     *      an invitation and you've not been invited.
     *
     *  \format{"<channel> :Cannot join channel (+i)"}
     */
    const ERR_INVITEONLYCHAN        = NULL;

    /**
     *  \brief
     *      Returned when trying to JOIN a channel from which
     *      you've been banned.
     *
     *  \format{"<channel> :Cannot join channel (+b)"}
     */
    const ERR_BANNEDFROMCHAN        = NULL;

    /**
     *  \brief
     *      Returned when trying to JOIN a channel for which
     *      a key was set and was either not given or incorrect.
     *
     *  \format{"<channel> :Cannot join channel (+k)"}
     */
    const ERR_BADCHANNELKEY         = NULL;

    /**
     *  \brief
     *      Any command requiring operator privileges to operate
     *      will return this error to indicate the attempt was
     *      unsuccessful.
     *
     *  \format{":Permission Denied- You're not an IRC operator"}
     */
    const ERR_NOPRIVILEGES          = NULL;

    /**
     *  \brief
     *      Any command requiring 'chanop' privileges (such as
     *      MODE messages) will return this error if the client
     *      making the attempt is not a channel operator on the
     *      specified channel.
     *
     *  \format{"<channel> :You're not channel operator"}
     */
    const ERR_CHANOPRIVSNEEDED      = NULL;

    /**
     *  \brief
     *      Any attempts to use the KILL command on a server
     *      will be refused and this error returned directly
     *      to the client.
     *
     *  \format{":You can't kill a server!"}
     */
    const ERR_CANTKILLSERVER        = NULL;

    /**
     *  \brief
     *      If a client sends an OPER message and the server
     *      has not been configured to allow connections from
     *      the client's host as an operator, this error will
     *      be returned.
     *
     *  \format{":No O-lines for your host"}
     */
    const ERR_NOOPERHOST            = NULL;

    /**
     *  \brief
     *      Returned by the server to indicate that a MODE
     *      message was sent with a nickname parameter and
     *      that the a mode flag sent was not recognized.
     *
     *  \format{":Unknown MODE flag"}
     */
    const ERR_UMODEUNKNOWNFLAG      = NULL;

    /**
     *  \brief
     *      Error sent to any user trying to view or change
     *      the user mode for a user other than themselves.
     *
     *  \format{":Cannot change mode for other users"}
     */
    const ERR_USERSDONTMATCH        = NULL;

    /**
     *  \brief
     *      First raw sent to a client after its connection (welcome message).
     *
     *  \format{"Welcome to the Internet Relay Network <nick>!<user>@<host>"}
     */
    const RPL_WELCOME               = NULL;

    /**
     *  \brief
     *      Gives the name/version of the server we're connected to.
     *
     *  \format{"Your host is <servername>\, running version <ver>"}
     */
    const RPL_YOURHOST              = NULL;

    /**
     *  \brief
     *      Last time the IRC server was restarted.
     *
     *  \format{"This server was created <date>"}
     */
    const RPL_CREATED               = NULL;

    /**
     *  \brief
     *      Supported user and channel modes.
     * 
     *  \format{
     *      "<servername> <version> <available user modes>
     *      <available channel modes>"
     *  }
     */
    const RPL_MYINFO                = NULL;

    /**
     *  \brief
     *      Unused raw.
     */
    const RPL_TRACERECONNECT        = NULL;

    /**
     *  \brief
     *      RPL_TRACEEND is sent to indicate the end of the list
     *      of replies to a TRACE command.
     *
     *  \format{"<server name> <version & debug level> :End of TRACE"}
     */
    const RPL_TRACEEND              = NULL;

    /**
     *  \brief
     *      When a server drops a command without processing it,
     *      it MUST use the reply RPL_TRYAGAIN to inform the
     *      originating client.
     *
     *  \format{"<command> :Please wait a while and try again."}
     *
     *  \note
     *      This is mostly an alias for Erebot_Interface_Numerics::RPL_LOAD2HI
     *      except the text is worded slightly differently.
     */
    const RPL_TRYAGAIN              = NULL;

    /**
     * \brief
     *      This numeric is used to indicate the creator
     *      of a local IRC channel.
     *
     * \format{"<channel> <creator>"}
     */
    const RPL_UNIQOPIS              = NULL;

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
     *      Marks the end of the invite list.
     *
     * \format{":End of /INVITE list."}
     * \format{":End of Invite list"}
     * \format{"<channel> :End of Channel Invite List"}
     *
     * \note
     *      The exact format for this numeric depends
     *      on the implementation.
     */
    const RPL_ENDOFINVITELIST       = NULL;

    /**
     * \brief
     *      Sent by the server in response to a MODE \#channel +e
     *      command for every entry currently in the ban exception
     *      list.
     *
     * \format{"<channel> <nick>!<ident>@<host>"}
     * \format{"<channel> <nick>!<ident>@<host> <who> <when>"}
     */
    const RPL_EXCEPTLIST            = NULL;

    /**
     * \brief
     *      Marks the end of the exception list for a channel.
     *
     * \format{"<channel> :End of Channel Exception List"}
     */
    const RPL_ENDOFEXCEPTLIST       = NULL;

    /**
     *  \brief
     *      Sent by the server to a service upon successful
     *      registration.
     *
     *  \format{"You are service <servicename>"}
     */
    const RPL_YOURESERVICE          = NULL;

    /**
     *  \brief
     *      Returned to a client which is attempting to send a SQUERY
     *      to a service which does not exist.
     *
     *  \format{"<service name> :No such service"}
     */
    const ERR_NOSUCHSERVICE         = NULL;

    /**
     *  \brief
     *      Returned when an invalid mask was passed to
     *      <tt>"PRIVMSG $<server>"</tt> or <tt>"PRIVMSG #<host>"</tt>.
     *
     *  \format{"<mask> :Bad Server/host mask"}
     */
    const ERR_BADMASK               = NULL;

    /**
     * \brief
     *      Returned by a server in response to a LIST or NAMES
     *      message to indicate the result contains too many
     *      items to be returned to the client.
     *
     * \format{"<channel> :Output too long (try locally)"}
     */
    const ERR_TOOMANYMATCHES        = NULL;

    /**
     *  \brief
     *      Returned when a resource needed to perform the given
     *      action is unavailable.
     *
     *  \format{"<nick/channel> :Nick/channel is temporarily unavailable"}
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
     *  \brief
     *      Returned when attempting to set modes on a channel
     *      which does not support modes.
     *
     *  \format{"<channel> :Channel doesn't support modes"}
     */
    const ERR_NOCHANMODES           = NULL;

    /**
     *  \brief
     *      Returned when attempting to add a ban on a channel
     *      for which the banlist is already full.
     *
     *  \format{"<channel> <char> :Channel list is full"}
     */
    const ERR_BANLISTFULL           = NULL;

    /**
     *  \brief
     *      Sent by the server to a user upon connection to indicate
     *      the restricted nature of the connection (user mode "+r")
     *
     *  \format{":Your connection is restricted!"}
     */
    const ERR_RESTRICTED            = NULL;

    /**
     *  \brief
     *      Any MODE requiring "channel creator" privileges will
     *      return this error if the client making the attempt is not
     *      a channel operator on the specified channel.
     *
     *  \format{":You're not the original channel operator"}
     */
    const ERR_UNIQOPPRIVSNEEDED     = NULL;

    const RPL_NMODEIS               = NULL;

    const RPL_STATSZLINE            = NULL;

    const ERR_NOCOLORSONCHAN        = NULL;
    const ERR_SERVERONLY            = NULL;
    const ERR_DESYNC                = NULL;
    const ERR_SSLCLIENTSONLY        = NULL;

    const RPL_WHOISSERVICES         = NULL;

    const RPL_SETTINGS              = NULL;
    const RPL_ENDOFSETTINGS         = NULL;

    const RPL_IRCOPS                = NULL;
    const RPL_ENDOFIRCOPS           = NULL;

    const RPL_OPERMOTDSTART         = NULL;
    const RPL_OPERMOTD              = NULL;
    const RPL_ENDOFOPERMOTD         = NULL;

    const RPL_WHOHOST               = NULL;

    const ERR_EXEMPTLISTFULL        = NULL;
    const ERR_NOOPERMOTD            = NULL;

    /**
     *  \brief
     *      Sent on connect by some IRC servers
     *      to notify the newly-connected user
     *      about his unique user ID.
     *
     *  \format{"<UUID> :your unique ID"}
     */
    const RPL_YOURID                = NULL;

    const RPL_SNOMASK               = NULL;

    const RPL_REMOTEISUPPORT        = NULL;
    const RPL_STATSHELP             = NULL;
    const RPL_STATSOLDNLINE         = NULL;
    const RPL_SQLINE                = NULL;
    const RPL_STATSTLINE            = NULL;
    const RPL_STATSBANVER           = NULL;
    const RPL_STATSSPAMF            = NULL;
    const RPL_STATSEXCEPTTKL        = NULL;
    const RPL_STATSXLINE            = NULL;
    const RPL_HELPHDR               = NULL;
    const RPL_HELPOP                = NULL;
    const RPL_HELPTLR               = NULL;
    const RPL_HELPHLP               = NULL;
    const RPL_HELPFWD               = NULL;
    const RPL_HELPIGN               = NULL;

    const RPL_TEXT                  = NULL;

    const RPL_WHOISHELPOP           = NULL;
    const RPL_WHOISSPECIAL          = NULL;
    const RPL_WHOISBOT              = NULL;
    const RPL_USERIP                = NULL;
    const RPL_QLIST                 = NULL;
    const RPL_ENDOFQLIST            = NULL;
    const RPL_ALIST                 = NULL;
    const RPL_ENDOFALIST            = NULL;
    const ERR_SERVICECONFUSED       = NULL;
    const ERR_NONICKCHANGE          = NULL;
    const ERR_HOSTILENAME           = NULL;
    const ERR_NOHIDING              = NULL;
    const ERR_NOTFORHALFOPS         = NULL;
    const ERR_LINKSET               = NULL;
    const ERR_LINKCHANNEL           = NULL;
    const ERR_LINKFAIL              = NULL;
    const ERR_CANNOTKNOCK           = NULL;
    const ERR_ATTACKDENY            = NULL;
    const ERR_KILLDENY              = NULL;
    const ERR_NOTFORUSERS           = NULL;
    const ERR_HTMDISABLED           = NULL;
    const ERR_SECUREONLYCHAN        = NULL;

    const ERR_CHANOWNPRIVNEEDED     = NULL;
    const ERR_TOOMANYJOINS          = NULL;
    const ERR_DISABLED              = NULL;
    const ERR_NOINVITE              = NULL;
    const ERR_ADMONLY               = NULL;
    const ERR_OPERSPVERIFY          = NULL;
    const RPL_REAWAY                = NULL;
    const RPL_GONEAWAY              = NULL;
    const RPL_NOTAWAY               = NULL;
    const RPL_CLEARWATCH            = NULL;
    const RPL_NOWISAWAY             = NULL;
    const RPL_DUMPING               = NULL;
    const RPL_DUMPRPL               = NULL;
    const RPL_EODUMP                = NULL;
    const RPL_SPAMCMDFWD            = NULL;
    const ERR_CANNOTDOCOMMAND       = NULL;
    const ERR_CANNOTCHANGECHANMODE  = NULL;

    const ERR_INVALIDUSERNAME       = NULL;

    const ERR_ISCHANSERVICE         = NULL;

    /// Alias for Erebot_Interface_Numerics::ERR_ALREADYREGISTRED.
    const ERR_ALREADYREGISTERED     = 'ERR_ALREADYREGISTRED';

    /// Alias for Erebot_Interface_Numerics::ERR_NONICKCHANGE.
    const ERR_CANTCHANGENICK        = 'ERR_NONICKCHANGE';

    const ERR_CANTJOINOPERSONLY     = 'ERR_OPERONLY';

    /// Alias for Erebot_Interface_Numerics::ERR_CHANOPRIVSNEEDED.
    const ERR_CHANOPPRIVSNEEDED     = 'ERR_CHANOPRIVSNEEDED';

    /// Alias for Erebot_Interface_Numerics::ERR_DELAYREJOIN.
    const ERR_KICKNOREJOIN          = 'ERR_DELAYREJOIN';

    /// Alias for Erebot_Interface_Numerics::ERR_NUMERIC_ERR.
    const ERR_LAST_ERR_MSG          = 'ERR_NUMERIC_ERR';

    const ERR_NCHANGETOOFAST        = 'ERR_NICKTOOFAST';

    const ERR_NEEDPONG              = 'ERR_BADPING';

    const ERR_NOCTCP                = 'ERR_NOCTCPALLOWED';

    /// Alias for Erebot_Interface_Numerics::ERR_WORDFILTERED.
    const ERR_NOSWEAR               = 'ERR_WORDFILTERED';

    const ERR_NOTSSLCLIENT          = 'ERR_NOSSL';

    /// Alias for Erebot_Interface_Numerics::ERR_NUMERIC_ERR.
    const ERR_NUMERICERR            = 'ERR_NUMERIC_ERR';

    /// Alias for Erebot_Interface_Numerics::ERR_STARTTLSFAIL.
    const ERR_STARTTLS              = 'ERR_STARTTLSFAIL';

    // Misspelled in Bahamut.
    const ERR_TARGETTOFAST          = 'ERR_TARGETTOOFAST';

    /// Alias for Erebot_Interface_Numerics::RPL_CREATIONTIME.
    const RPL_CHANNELCREATED        = 'RPL_CREATIONTIME';

    /// Alias for Erebot_Interface_Numerics::RPL_MAPEND.
    const RPL_ENDMAP                = 'RPL_MAPEND';

    ///  Alias for Erebot_Interface_Numerics::RPL_ENDOFINVITELIST.
    const RPL_ENDOFINVEXLIST        = 'RPL_ENDOFINVITELIST';

    /// Alias for Erebot_Interface_Numerics::RPL_TRACEEND.
    const RPL_ENDOFTRACE            = 'RPL_TRACEEND';

    ///  Alias for Erebot_Interface_Numerics::RPL_ENDOFEXCEPTLIST.
    const RPL_ENDOFEXEMPTLIST       = 'RPL_ENDOFEXCEPTLIST';

    ///  Alias for Erebot_Interface_Numerics::RPL_ENDOFEXCEPTLIST.
    const RPL_ENDOFEXLIST           = 'RPL_ENDOFEXCEPTLIST';

    ///  Alias for Erebot_Interface_Numerics::RPL_EXCEPTLIST.
    const RPL_EXEMPTLIST            = 'RPL_EXCEPTLIST';

    ///  Alias for Erebot_Interface_Numerics::RPL_EXCEPTLIST.
    const RPL_EXLIST                = 'RPL_EXCEPTLIST';

    ///  Alias for Erebot_Interface_Numerics::RPL_INVITELIST.
    const RPL_INVEXLIST             = 'RPL_INVITELIST';

    const RPL_LISTSYNTAX            = 'RPL_COMMANDSYNTAX';

    /**
     *  \brief
     *      Mostly an alias for Erebot_Interface_Numerics::RPL_TRYAGAIN,
     *      except that the text is worded slightly differently.
     *
     *  \format{
     *      "<command> :Server load is temporarily too heavy.
     *      Please wait a while and try again."
     *  }
     *
     *  \note
     *      Although the name and the text imply that it is the server's load
     *      that causes this reply, in practice it seems to be sent whenever
     *      a user attempts to request too much information from a server.
     *      For example, if you attempt too many STATS requests in a short
     *      period of time, you will get this error. 
     */
    const RPL_LOAD2HI               = 'RPL_TRYAGAIN';

    /// Alias for Erebot_Interface_Numerics::RPL_NAMREPLY.
    const RPL_NAMEREPLY             = 'RPL_NAMREPLY';

    /// Alias for Erebot_Interface_Numerics::RPL_BOUNCE.
    const RPL_REDIR                 = 'RPL_BOUNCE';

    /// Alias for Erebot_Interface_Numerics::RPL_ENDOFRULES.
    const RPL_RULESEND              = 'RPL_ENDOFRULES';

    /// Alias for Erebot_Interface_Numerics::RPL_RULESTART.
    const RPL_RULESSTART            = 'RPL_RULESTART';

    /// Alias for Erebot_Interface_Numerics::RPL_CREATED.
    const RPL_SERVERCREATED         = 'RPL_CREATED';

    /// Alias for Erebot_Interface_Numerics::RPL_MYINFO.
    const RPL_SERVERVERSION         = 'RPL_MYINFO';

    /// Alias for Erebot_Interface_Numerics::RPL_STARTTLSOK.
    const RPL_STARTTLS              = 'RPL_STARTTLSOK';

    /// Alias for Erebot_Interface_Numerics::RPL_TOPICWHOTIME.
    const RPL_TOPICTIME             = 'RPL_TOPICWHOTIME';

    const RPL_WHOISSECURE           = 'RPL_USINGSSL';

    /// Alias for Erebot_Interface_Numerics::RPL_YOUREOPER.
    const RPL_YOUAREOPER            = 'RPL_YOUREOPER';

    /// Alias for Erebot_Interface_Numerics::RPL_YOURHOST.
    const RPL_YOURHOSTIS            = 'RPL_YOURHOST';

    /// Alias for Erebot_Interface_Numerics::RPL_YOURID.
    const RPL_YOURUUID              = 'RPL_YOURID';

    const RPL_STATSFLINE            = NULL;  // UltimateIRCd

    const RPL_STATSCOUNT            = NULL;

    const RPL_STATSGLINE            = NULL;

    const RPL_STATSULINE            = NULL;

    const RPL_STATSDEBUG            = NULL;

    const RPL_USINGSSL              = NULL;

    const RPL_WHOISREGNICK          = NULL;

    const RPL_WHOISADMIN            = NULL;

    const RPL_WHOISSADMIN           = NULL;

    const RPL_WHOISSVCMSG           = NULL;

    const RPL_COMMANDSYNTAX         = NULL;

    const RPL_WHOISACTUALLY         = NULL;

    const RPL_WHOISHOST             = NULL;

    const RPL_WHOISMODES            = NULL;  // UnrealIRCd

    const ERR_BANONCHAN             = NULL;

    const ERR_NICKTOOFAST           = NULL;

    const ERR_TARGETTOOFAST         = NULL;

    const ERR_BADCHANNAME           = NULL;

    const ERR_CHANBANREASON         = NULL;

    const ERR_NOSSL                 = NULL;

    const ERR_NOCTCPALLOWED         = NULL;

    const ERR_GHOSTEDCLIENT         = NULL;

    const ERR_BADPING               = NULL;

    const ERR_OPERONLY              = NULL;  // UnrealIRCd

    const ERR_WHOSYNTAX             = NULL;

    const ERR_WHOLIMEXCEED          = NULL;

    /**
     * \brief
     *      Sent during connection to point the connecting user
     *      to another server that may be used to reduce lag.
     *
     * \format{"<server> <port> :Please use this Server/Port instead"}
     *
     * \note
     *      This raw is defined as numeric 005 by RFC 2812,
     *      but this usage is widely ignored by existing
     *      implementations as it conflicts with the definition
     *      of Erebot_Interface_Numerics::RPL_ISUPPORT.
     */
    const RPL_BOUNCE                = NULL;

    /**
     *  \brief
     *      Redundant and not needed but reserved.
     */
    const RPL_WHOISCHANOP           = NULL;

    const RPL_SAVENICK              = NULL;

    const RPL_STATSPLINE            = NULL;

    const RPL_STATSELINE            = NULL;

    /**
     * \brief
     *      This numeric is sent by the IRC server
     *      when two many AWAY commands have been
     *      issued by the user in a few seconds.
     *
     * \format{":Too Many aways - Flood Protection activated"}
     */
    const ERR_TOOMANYAWAY           = NULL;

    /**
     * \brief
     *      This numeric is sent to you if you try to add
     *      someone to your DCC allow list and the list
     *      is already full.
     *
     * \format{"<peer> :Your dcc allow list is full.
                Maximum size is <limit> entries"}
     */
    const ERR_TOOMANYDCC            = NULL;

    /**
     * \brief
     *      This numeric is sent back to you after every command
     *      to add or remove some user from your DCC allow list.
     *
     * \note
     *      The message changes depending of the type of action
     *      that occurred (user addition or user removal).
     *
     * \format{":<peer> has been added to your DCC allow list"}
     * \format{":<peer> has been removed from your DCC allow list"}
     */
    const RPL_DCCSTATUS             = NULL;

    /**
     * \brief
     *      This numeric is sent in response to a DCCALLOW LIST command
     *      for every person that is currently present in your DCC allow
     *      list.
     *
     * \format{":<peer>"}
     */
    const RPL_DCCLIST               = NULL;

    /**
     * \brief
     *      Marks the end of either the DCCALLOW HELP command
     *      or the DCCALLOW LIST command.
     *
     * \format{":End of DCCALLOW <command>"}
     */
    const RPL_ENDOFDCCLIST          = NULL;

    /**
     * \brief
     *      This numeric is sent as a reply to several commands
     *      dealing with the DCCALLOW list.
     */
    const RPL_DCCINFO               = NULL;

    /**
     * \brief
     *      This numeric is used to display information
     *      about an entry in the G-line list.
     *
     * \format{"<user> <expire> <last modification> <lifetime>
     *          <local> <flags> :<reason>"}
     * \format{"<user>@<host> <expire> <last modification> <lifetime>
     *          <local> <flags> :<reason>"}
     */
    const RPL_GLIST                 = NULL;

    /**
     * \brief
     *      Marks the end of the G-line list.
     *
     * \format{":End of G-line List"}
     */
    const RPL_ENDOFGLIST            = NULL;

    /**
     *  \brief
     *      Reply format used by ISON to list replies
     *      to the query list.
     *
     *  \format{":*1<nick> *( " " <nick> )"}
     */
    const RPL_ISON                  = NULL;

    /**
     * \brief
     *      This numeric is used to display information
     *      about an entry in the JUPE list.
     *
     * \format{"<server> <expire> <local> <active> :<reason>"}
     */
    const RPL_JUPELIST              = NULL;

    /**
     * \brief
     *      Marks the end of the JUPE list.
     *
     * \format{":End of Jupe List"}
     */
    const RPL_ENDOFJUPELIST         = NULL;

    /**
     * \brief
     *      This numeric is sent to you for every
     *      rule in use on this server.
     *
     * \format{":- <rule>"}
     */
    const RPL_RULES                 = NULL;

    /**
     * \brief
     *      Marks the start of the server rules.
     *
     * \format{":- <server> Server Rules - "}
     */
    const RPL_RULESTART             = NULL;

    /**
     * \brief
     *      Marks the end of the server rules.
     *
     * \format{":End of RULES command."}
     */
    const RPL_ENDOFRULES            = NULL;

    /**
     * \brief
     *      Sent to indicate that the server does not
     *      have any rules defined.
     *
     * \format{":RULES File is missing"}
     */
    const ERR_NORULES               = NULL;

    /**
     * \brief
     *      This numeric is sent in reply to a SILENCE
     *      command with no argument for each entry in
     *      your silence list.
     *
     * \format{"<mask>"}
     */
    const RPL_SILELIST              = NULL;

    /**
     * \brief
     *      Marks the end of the silence list.
     *
     * \format{":End of Silence List"}
     */
    const RPL_ENDOFSILELIST         = NULL;

    /**
     * \brief
     *      This error is sent back when you try to add
     *      someone to your silence list and the list is
     *      already full.
     *
     * \format{"<mask> :Your silence list is full"}
     */
    const ERR_SILELISTFULL          = NULL;

    /**
     *  \brief
     *      Returned to a client after a STARTTLS command to indicate
     *      that the server is ready to proceed with data encrypted
     *      using the SSL/TLS protocol.
     *
     *  \format{":STARTTLS successful\, go ahead with TLS handshake"}
     *
     *  \note
     *      Upon receiving this message, the client should proceed
     *      with a TLS handshake. Once the handshake is completed,
     *      data may be exchanged securely between the server and
     *      the client.
     */
    const RPL_STARTTLSOK            = NULL;

    /**
     *  \brief
     *      Returned to a client after STARTTLS command to indicate
     *      that the attempt to negotiate a secure channel for the
     *      communication to take place has failed.
     *
     *  \format{":STARTTLS failure"}
     *
     *  \note
     *      Upon receiving this message, the client may proceed with
     *      the communication (even though data will be exchanged in
     *      plain text), or it may choose to close the connection
     *      entirely.
     */
    const ERR_STARTTLSFAIL          = NULL;

    /**
     * \brief
     *      The server will send this numeric back to you
     *      if you try to add someone to your watch list
     *      and the list is already full.
     *
     * \format{"<mask> :Maximum size for WATCH-list is <limit> entries"}
     */
    const ERR_TOOMANYWATCH          = NULL;

    /**
     *  \brief
     *      Sent when someone on your watch list logs online.
     *
     *  \format{"<nick> <ident> <host> <timestamp> :logged online"}
     */
    const RPL_LOGON                 = NULL;

    /**
     *  \brief
     *      Sent when someone on your watch list logs offline.
     *
     *  \format{"<nick> <ident> <host> <timestamp> :logged offline"}
     */
    const RPL_LOGOFF                = NULL;

    /**
     * \brief
     *      Sent by the server after it receives a request
     *      to remove someone from the watch list.
     *
     * \format{"<nick> <ident> <host> <timestamp> :stopped watching"}
     */
    const RPL_WATCHOFF              = NULL;

    /**
     * \brief
     *      Displays how many people are on your watch list
     *      and how many have added you to their watch list.
     *
     * \format{":You have <mine> and are on <others> WATCH entries"}
     */
    const RPL_WATCHSTAT             = NULL;

    /**
     *  \brief
     *      Sent after a nick has been added to your watch list
     *      and that person is currently online.
     *
     *  \format{"<nick> <ident> <host> <timestamp> :is online"}
     */
    const RPL_NOWON                 = NULL;

    /**
     *  \brief
     *      Sent after a nick has been added to your watch list
     *      and that person is currently offline.
     *
     *  \format{"<nick> * * 0 :is offline"}
     */
    const RPL_NOWOFF                = NULL;

    /**
     * \brief
     *      This numeric is sent back for every entry in your
     *      watch list when the WATCH s or WATCH S command is used.
     *
     * \format{":<nick>"}
     */
    const RPL_WATCHLIST             = NULL;

    /**
     * \brief
     *      Marks the end of a WATCH command.
     *
     * \format{":End of WATCH <command>"}
     */
    const RPL_ENDOFWATCHLIST        = NULL;
}

