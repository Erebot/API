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

namespace Erebot\NumericProfile;

/**
 * \brief
 *      Abstract class that serves as a base to create
 *      a numeric profile for an IRCd server.
 *
 * \note
 *      Several constants are defined by this class,
 *      that match common aliases found in IRC server
 *      softwares.
 */
abstract class Base implements \ArrayAccess
{
    /// Alias for Erebot::Interfaces::Numerics::ERR_ALREADYREGISTRED.
    const ERR_ALREADYREGISTERED     = 'ERR_ALREADYREGISTRED';
    /// Alias for Erebot::Interfaces::Numerics::ERR_ALREADYREGISTERED.
    const ERR_ALREADYREGISTRED      = 'ERR_ALREADYREGISTERED';

    /// Alias for Erebot::Interfaces::Numerics::ERR_NONICKCHANGE.
    const ERR_CANTCHANGENICK        = 'ERR_NONICKCHANGE';
    /// Alias for Erebot::Interfaces::Numerics::ERR_CANTCHANGENICK.
    const ERR_NONICKCHANGE          = 'ERR_CANTCHANGENICK';

    /// Alias for Erebot::Interfaces::Numerics::ERR_OPERONLY.
    const ERR_CANTJOINOPERSONLY     = 'ERR_OPERONLY';
    /// Alias for Erebot::Interfaces::Numerics::ERR_OPERONLYCHAN.
    const ERR_OPERONLY              = 'ERR_OPERONLYCHAN';
    /// Alias for Erebot::Interfaces::Numerics::ERR_CANTJOINOPERSONLY.
    const ERR_OPERONLYCHAN          = 'ERR_CANTJOINOPERSONLY';

    /// Alias for Erebot::Interfaces::Numerics::ERR_CHANOPRIVSNEEDED.
    const ERR_CHANOPPRIVSNEEDED     = 'ERR_CHANOPRIVSNEEDED';
    /// Alias for Erebot::Interfaces::Numerics::ERR_CHANOPPRIVSNEEDED.
    const ERR_CHANOPRIVSNEEDED      = 'ERR_CHANOPPRIVSNEEDED';

    /// Alias for Erebot::Interfaces::Numerics::ERR_DELAYREJOIN.
    const ERR_KICKNOREJOIN          = 'ERR_DELAYREJOIN';
    /// Alias for Erebot::Interfaces::Numerics::ERR_KICKNOREJOIN.
    const ERR_DELAYREJOIN           = 'ERR_KICKNOREJOIN';

    /// Alias for Erebot::Interfaces::Numerics::ERR_NUMERICERR.
    const ERR_LAST_ERR_MSG          = 'ERR_NUMERICERR';
    /// Alias for Erebot::Interfaces::Numerics::ERR_NUMERIC_ERR.
    const ERR_NUMERICERR            = 'ERR_NUMERIC_ERR';
    /// Alias for Erebot::Interfaces::Numerics::ERR_LAST_ERR_MSG.
    const ERR_NUMERIC_ERR           = 'ERR_LAST_ERR_MSG';

    /// Alias for Erebot::Interfaces::Numerics::ERR_NICKTOOFAST.
    const ERR_NCHANGETOOFAST        = 'ERR_NICKTOOFAST';
    /// Alias for Erebot::Interfaces::Numerics::ERR_NCHANGETOOFAST.
    const ERR_NICKTOOFAST           = 'ERR_NCHANGETOOFAST';

    /// Alias for Erebot::Interfaces::Numerics::ERR_BADPING.
    const ERR_NEEDPONG              = 'ERR_BADPING';
    /// Alias for Erebot::Interfaces::Numerics::ERR_NEEDPONG.
    const ERR_BADPING               = 'ERR_NEEDPONG';

    /// Alias for Erebot::Interfaces::Numerics::ERR_NOCTCP.
    const ERR_NOCTCP                = 'ERR_NOCTCPALLOWED';
    /// Alias for Erebot::Interfaces::Numerics::ERR_NOCTCPALLOWED.
    const ERR_NOCTCPALLOWED         = 'ERR_NOCTCP';

    /// Alias for Erebot::Interfaces::Numerics::ERR_WORDFILTERED.
    const ERR_NOSWEAR               = 'ERR_WORDFILTERED';
    /// Alias for Erebot::Interfaces::Numerics::ERR_NOSWEAR.
    const ERR_WORDFILTERED          = 'ERR_NOSWEAR';

    /// Alias for Erebot::Interfaces::Numerics::ERR_NOSSL.
    const ERR_NOTSSLCLIENT          = 'ERR_NOSSL';
    /// Alias for Erebot::Interfaces::Numerics::ERR_NOTSSLCLIENT.
    const ERR_NOSSL                 = 'ERR_NOTSSLCLIENT';

    /// Alias for Erebot::Interfaces::Numerics::ERR_STARTTLSFAIL.
    const ERR_STARTTLS              = 'ERR_STARTTLSFAIL';
    /// Alias for Erebot::Interfaces::Numerics::ERR_STARTTLS.
    const ERR_STARTTLSFAIL          = 'ERR_STARTTLS';

    /// Alias for Erebot::Interfaces::Numerics::ERR_TARGETTOOFAST.
    const ERR_TARGETTOFAST          = 'ERR_TARGETTOOFAST';
    /// Alias for Erebot::Interfaces::Numerics::ERR_TARGETTOFAST.
    const ERR_TARGETTOOFAST         = 'ERR_TARGETTOFAST';

    /// Alias for Erebot::Interfaces::Numerics::RPL_CREATIONTIME.
    const RPL_CHANNELCREATED        = 'RPL_CREATIONTIME';
    /// Alias for Erebot::Interfaces::Numerics::RPL_CHANNELCREATED.
    const RPL_CREATIONTIME          = 'RPL_CHANNELCREATED';

    /// Alias for Erebot::Interfaces::Numerics::RPL_MAPEND.
    const RPL_ENDMAP                = 'RPL_MAPEND';
    /// Alias for Erebot::Interfaces::Numerics::RPL_ENDMAP.
    const RPL_MAPEND                = 'RPL_ENDMAP';

    /// Alias for Erebot::Interfaces::Numerics::RPL_TRACEEND.
    const RPL_ENDOFTRACE            = 'RPL_TRACEEND';
    /// Alias for Erebot::Interfaces::Numerics::RPL_ENDOFTRACE.
    const RPL_TRACEEND              = 'RPL_ENDOFTRACE';

    ///  Alias for Erebot::Interfaces::Numerics::RPL_EXLIST.
    const RPL_EXEMPTLIST            = 'RPL_EXLIST';
    ///  Alias for Erebot::Interfaces::Numerics::RPL_EXCEPTLIST.
    const RPL_EXLIST                = 'RPL_EXCEPTLIST';
    ///  Alias for Erebot::Interfaces::Numerics::RPL_EXEMPTLIST.
    const RPL_EXCEPTLIST            = 'RPL_EXEMPTLIST';

    ///  Alias for Erebot::Interfaces::Numerics::RPL_INVITELIST.
    const RPL_INVEXLIST             = 'RPL_INVITELIST';
    ///  Alias for Erebot::Interfaces::Numerics::RPL_INVEXLIST.
    const RPL_INVITELIST            = 'RPL_INVEXLIST';

    ///  Alias for Erebot::Interfaces::Numerics::RPL_COMMANDSYNTAX.
    const RPL_LISTSYNTAX            = 'RPL_COMMANDSYNTAX';
    ///  Alias for Erebot::Interfaces::Numerics::RPL_LISTSYNTAX.
    const RPL_COMMANDSYNTAX         = 'RPL_LISTSYNTAX';

    ///  Alias for Erebot::Interfaces::Numerics::RPL_ENDOFEXLIST.
    const RPL_ENDOFEXEMPTLIST       = 'RPL_ENDOFEXLIST';
    ///  Alias for Erebot::Interfaces::Numerics::RPL_ENDOFEXCEPTLIST.
    const RPL_ENDOFEXLIST           = 'RPL_ENDOFEXCEPTLIST';
    ///  Alias for Erebot::Interfaces::Numerics::RPL_ENDOFEXEMPTLIST.
    const RPL_ENDOFEXCEPTLIST       = 'RPL_ENDOFEXEMPTLIST';

    ///  Alias for Erebot::Interfaces::Numerics::RPL_ENDOFINVITELIST.
    const RPL_ENDOFINVEXLIST        = 'RPL_ENDOFINVITELIST';
    ///  Alias for Erebot::Interfaces::Numerics::RPL_ENDOFINVEXLIST.
    const RPL_ENDOFINVITELIST       = 'RPL_ENDOFINVEXLIST';

    ///  Alias for Erebot::Interfaces::Numerics::RPL_TRYAGAIN.
    const RPL_LOAD2HI               = 'RPL_TRYAGAIN';
    ///  Alias for Erebot::Interfaces::Numerics::RPL_LOAD2HI.
    const RPL_TRYAGAIN              = 'RPL_LOAD2HI';

    /// Alias for Erebot::Interfaces::Numerics::RPL_NAMREPLY.
    const RPL_NAMEREPLY             = 'RPL_NAMREPLY';
    /// Alias for Erebot::Interfaces::Numerics::RPL_NAMEREPLY.
    const RPL_NAMREPLY              = 'RPL_NAMEREPLY';

    /// Alias for Erebot::Interfaces::Numerics::RPL_BOUNCE.
    const RPL_REDIR                 = 'RPL_BOUNCE';
    /// Alias for Erebot::Interfaces::Numerics::RPL_REDIR.
    const RPL_BOUNCE                = 'RPL_REDIR';

    /// Alias for Erebot::Interfaces::Numerics::RPL_ENDOFRULES.
    const RPL_RULESEND              = 'RPL_ENDOFRULES';
    /// Alias for Erebot::Interfaces::Numerics::RPL_RULESEND.
    const RPL_ENDOFRULES            = 'RPL_RULESEND';

    /// Alias for Erebot::Interfaces::Numerics::RPL_RULESTART.
    const RPL_RULESSTART            = 'RPL_RULESTART';
    /// Alias for Erebot::Interfaces::Numerics::RPL_RULESSTART.
    const RPL_RULESTART             = 'RPL_RULESSTART';

    /// Alias for Erebot::Interfaces::Numerics::RPL_CREATED.
    const RPL_SERVERCREATED         = 'RPL_CREATED';
    /// Alias for Erebot::Interfaces::Numerics::RPL_SERVERCREATED.
    const RPL_CREATED               = 'RPL_SERVERCREATED';

    /// Alias for Erebot::Interfaces::Numerics::RPL_MYINFO.
    const RPL_SERVERVERSION         = 'RPL_MYINFO';
    /// Alias for Erebot::Interfaces::Numerics::RPL_SERVERVERSION.
    const RPL_MYINFO                = 'RPL_SERVERVERSION';

    /// Alias for Erebot::Interfaces::Numerics::RPL_STARTTLSOK.
    const RPL_STARTTLS              = 'RPL_STARTTLSOK';
    /// Alias for Erebot::Interfaces::Numerics::RPL_STARTTLS.
    const RPL_STARTTLSOK            = 'RPL_STARTTLS';

    /// Alias for Erebot::Interfaces::Numerics::RPL_TOPICWHOTIME.
    const RPL_TOPICTIME             = 'RPL_TOPICWHOTIME';
    /// Alias for Erebot::Interfaces::Numerics::RPL_TOPICTIME.
    const RPL_TOPICWHOTIME          = 'RPL_TOPICTIME';

    /// Alias for Erebot::Interfaces::Numerics::RPL_USINGSSL.
    const RPL_WHOISSECURE           = 'RPL_USINGSSL';
    /// Alias for Erebot::Interfaces::Numerics::RPL_WHOISSECURE.
    const RPL_USINGSSL              = 'RPL_WHOISSECURE';

    /// Alias for Erebot::Interfaces::Numerics::RPL_YOUREOPER.
    const RPL_YOUAREOPER            = 'RPL_YOUREOPER';
    /// Alias for Erebot::Interfaces::Numerics::RPL_YOUAREOPER.
    const RPL_YOUREOPER             = 'RPL_YOUAREOPER';

    /// Alias for Erebot::Interfaces::Numerics::RPL_YOURHOST.
    const RPL_YOURHOSTIS            = 'RPL_YOURHOST';
    /// Alias for Erebot::Interfaces::Numerics::RPL_YOURHOSTIS.
    const RPL_YOURHOST              = 'RPL_YOURHOSTIS';

    /// Alias for Erebot::Interfaces::Numerics::RPL_YOURID.
    const RPL_YOURUUID              = 'RPL_YOURID';
    /// Alias for Erebot::Interfaces::Numerics::RPL_YOURUUID.
    const RPL_YOURID                = 'RPL_YOURUUID';


    /// Reflection object for this class.
    protected $reflector;


    /// Constructs a new instance of this numeric profile.
    final public function __construct()
    {
        $this->reflector = new \ReflectionClass(get_called_class());
    }

    /// \copydoc ArrayAccess::offsetExists
    public function offsetExists($offset)
    {
        return ($this[$offset] !== null);
    }

    /// \copydoc ArrayAccess::offsetGet
    public function offsetGet($offset)
    {
        if (!is_string($offset)) {
            throw new \Erebot\InvalidValueException('Not a valid name');
        }

        $seen   = array();
        $name   = strtoupper($offset);
        while (!in_array($name, $seen)) {
            $seen[] = $name;

            if (!$this->reflector->hasConstant($name)) {
                return null;
            }
            $constValue = $this->reflector->getConstant($name);

            if (is_int($constValue) &&
                $constValue > 0 &&
                $constValue <= 999) {
                return $constValue;
            }

            if (is_string($constValue)) {
                $name = strtoupper($constValue);
                continue;
            }

            return null;
        }
        throw new \Erebot\InvalidValueException('Loop detected');
    }

    /// \copydoc ArrayAccess::offsetSet
    public function offsetSet($offset, $value)
    {
        throw new \Erebot\NotImplementedException();
    }

    /// \copydoc ArrayAccess::offsetUnset
    public function offsetUnset($offset)
    {
        throw new \Erebot\NotImplementedException();
    }
}
