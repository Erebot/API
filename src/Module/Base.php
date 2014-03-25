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

namespace Erebot\Module;

/**
 * \brief
 *      An abstract class which serves as the base
 *      to build additional modules for Erebot.
 */
abstract class Base
{
    /// The connection associated with this instance.
    protected $connection;

    /// The channel associated with this instance, if any.
    protected $channel;

    /// The translator to use for messages coming from this instance.
    protected $translator;

    /// Factories to use for this module.
    protected $factories;

    /// A logger for this module's messages.
    protected $logger;


    /// Passed when the module is loaded (instead of reloaded).
    const RELOAD_INIT       = 0x01;

    /// Passed during unittests (currently unused...).
    const RELOAD_TESTING    = 0x02;

    /// The module should (re)load its members.
    const RELOAD_MEMBERS    = 0x10;

    /// The module should (re)load its handlers.
    const RELOAD_HANDLERS   = 0x20;

    /// The module should (re)load all of its contents.
    const RELOAD_ALL        = 0xF0;


    /// A regular message.
    const MSG_TYPE_PRIVMSG      = 'PRIVMSG';

    /// A notice.
    const MSG_TYPE_NOTICE       = 'NOTICE';

    /// A CTCP request.
    const MSG_TYPE_CTCP         = 'CTCP';

    /// A reply to a CTCP request.
    const MSG_TYPE_CTCPREPLY    = 'CTCPREPLY';

    /// An action.
    const MSG_TYPE_ACTION       = 'ACTION';

    /**
     * This method is called whenever the module is (re)loaded.
     *
     * \param int $flags
     *      A bitwise OR of the Erebot::Module::Base::RELOAD_*
     *      constants. Your method should take proper actions
     *      depending on the value of those flags.
     *
     * \note
     *      See the documentation on individual RELOAD_*
     *      constants for a list of possible values.
     */
    abstract protected function reload($flags);

    /**
     * This method is called whenever the module
     * should be unloaded.
     *
     * You may redefine this method to do whatever
     * you need to do to remove any bits of your
     * module's existence (eg. clean up memory, etc.).
     */
    protected function unload()
    {
    }

    /**
     * Constructor for modules.
     *
     * \param string|null $channel
     *      (optional) The channel this instance applies to.
     *      This will be \b null for modules loaded at the server
     *      level or higher in the configuration hierarchy.
     */
    final public function __construct($channel)
    {
        $this->connection  =
        $this->translator  =
        $this->mainCfg     = null;
        $this->channel     = $channel;
        $this->factories   = array();

        $ifaces = array(
            '!Callable'         => '\\Erebot\\CallableWrapper',

            '!EventHandler'     => '\\Erebot\\EventHandler',

            '!Identity'         => '\\Erebot\\Identity',

            '!NumericHandler'   => '\\Erebot\\NumericHandler',

            '!NumericReference' => '\\Erebot\\NumericReference',

            '!Styling'          => '\\Erebot\\Styling',

            '\\Erebot\\Styling\\Variables\\CurrencyInterface' =>
                '\\Erebot\\Styling\\Variables\\Currency',

            '\\Erebot\\Styling\\Variables\\DateTimeInterface' =>
                '\\Erebot\\Styling\\Variables\\DateTime',

            '\\Erebot\\Styling\\Variables\\DurationInterface' =>
                '\\Erebot\\Styling\\Variables\\Duration',

            '!TextWrapper'      => '\\Erebot\\TextWrapper',

            '!Timer'            => '\\Erebot\\Timer',
        );
        foreach ($ifaces as $iface => $cls) {
            try {
                $this->setFactory($iface, $cls);
            } catch (\Erebot\InvalidValueException $e) {
                // Ignore silently as the only time the default classes
                // won't exist is when we run the tests for some module.
            }
        }

        /// @FIXME: handle dependency injection somehow
        $this->logger = null;
        if (class_exists('Plop')) {
            $logging =& \Plop::getInstance();
            $reflector = new \ReflectionObject($this);
            $this->logger = $logging->getLogger($reflector->getFileName());
            unset($logging);
        }
    }

    /** Destructor. */
    final public function __destruct()
    {
        unset(
            $this->connection,
            $this->translator,
            $this->channel,
            $this->mainCfg
        );
    }

    /**
     * Public method to (re)load a module.
     * This eventually reconfigures the bot.
     *
     * \param Erebot::Interface::Connection $connection
     *      IRC connection associated with this instance.
     *
     * \param int $flags
     *      A bitwise OR of the Erebot::Module::Base::RELOAD_*
     *      constants. Your method should take proper actions
     *      depending on the value of those flags.
     *
     * \note
     *      See the documentation on individual RELOAD_*
     *      constants for a list of possible values.
     */
    final public function moduleReload(
        \Erebot\Interfaces\Connection $connection,
        $flags
    ) {
        if ($this->connection === null) {
            $flags |= self::RELOAD_INIT;
        } else {
            $flags &= ~self::RELOAD_INIT;
        }

        $this->connection   = $connection;
        $serverCfg          = $this->connection->getConfig(null);
        $this->mainCfg      = $serverCfg->getMainCfg();

        $this->translator = $this->mainCfg->getTranslator(get_called_class());
        $this->reload($flags);

        if ($this instanceof \Erebot\Interfaces\HelpEnabled) {
            $cls = $this->getFactory('!Callable');
            $this->registerHelpMethod(new $cls(array($this, 'getHelp')));
        }
    }

    /**
     * This method is called when unloading
     * the module. It simply calls $this->unload.
     */
    final public function moduleUnload()
    {
        return $this->unload();
    }

    /**
     * Set the factory for the given interface.
     *
     * \param string $iface
     *      Name of the interface to act upon.
     *
     * \param string $cls
     *      Name of the class that acts as
     *      a factory for that interface.
     *      If must implement that interface.
     *
     * \note
     *      As a special shortcut, an exclamation
     *      point (!) in the interface's name will
     *      automatically be replaced with the text
     *      "Erebot_Interface_".
     */
    public function setFactory($iface, $cls)
    {
        if (!is_string($iface)) {
            throw new \Erebot\InvalidValueException('Not an interface name');
        }

        $ifaceName = str_replace('!', '\\Erebot\\Interface\\', $iface);
        if (!interface_exists($ifaceName, true)) {
            $ifaceName = str_replace('!', '\\Erebot\\', $iface) . 'Interface';
            if (!interface_exists($ifaceName, true)) {
                throw new \Erebot\InvalidValueException(
                    'No such interface ('.$iface.')'
                );
            }
        }

        if (!class_exists($cls, true)) {
            throw new \Erebot\InvalidValueException('No such class ('.$cls.')');
        }

        $reflector = new \ReflectionClass($cls);
        if (!$reflector->isSubclassOf($ifaceName)) {
            throw new \Erebot\InvalidValueException(
                'A class that implements the interface was expected'
            );
        }
        $iface = strtolower($ifaceName);
        $this->factories[$iface] = $cls;
    }

    /**
     * Return the name of the class to use
     * to create instances with the given
     * interface.
     *
     * \param string $iface
     *      Name of the interface for which
     *      the factory must be returned.
     *
     * \retval string
     *      Name of the class that acts as
     *      a factory for that interface.
     *
     * \note
     *      As a special shortcut, an exclamation
     *      point (!) in the interface's name will
     *      automatically be replaced with the text
     *      "Erebot_Interface_".
     */
    public function getFactory($iface)
    {
        if (!is_string($iface)) {
            throw new \Erebot\InvalidValueException('Not an interface name');
        }

        $ifaceKey = strtolower(str_replace('!', '\\Erebot\\Interface\\', $iface));
        if (!isset($this->factories[$ifaceKey])) {
            $ifaceKey = strtolower(str_replace('!', '\\Erebot\\', $iface) . 'Interface');
            if (!isset($this->factories[$ifaceKey])) {
                throw new \Erebot\InvalidValueException(
                    'No such interface ('.$iface.')'
                );
            }
        }
        return $this->factories[$ifaceKey];
    }

    /**
     * Send a message to a set of IRC targets (nicks or channels).
     *
     * \param string|list $targets
     *      Either a single nick or channel to which the message
     *      must be sent or an array of nicks/channels.
     *
     * \param string $message
     *      The message to send.
     *
     * \param opaque $type
     *      (optional) The type of message to send. The default is
     *      to send a regular message (using the PRIVMSG command).
     *      Use the MSG_TYPE_* constants to specify a different type.
     *
     * \throw Exception
     *      An invalid value was used for the $type or $targets
     *      parameter.
     */
    protected function sendMessage(
        $targets,
        $message,
        $type = self::MSG_TYPE_PRIVMSG
    ) {
        $types  = array('PRIVMSG', 'NOTICE', 'CTCP', 'CTCPREPLY', 'ACTION');
        $type   = strtoupper($type);
        if (!in_array($type, $types)) {
            throw new \Exception('Not a valid type');
        }

        if (is_array($targets)) {
            $targets = implode(',', $targets);
        } elseif ($targets instanceof \Erebot\Identity) {
            $targets = (string) $targets;
        } elseif (!is_string($targets)) {
            throw new \Exception('Not a valid target (expected a string)');
        }

        if (!\Erebot\Utils::stringifiable($message)) {
            throw new \Exception('Not a valid message (expected a string)');
        }

        $message    = (string) $message;
        $parts      = array_map('trim', explode("\n", trim($message)));
        $message    = implode(' ', $parts);
        $marker     = '';
        $ctcpType   = '';

        if ($type == 'ACTION') {
            $type       = 'PRIVMSG';
            $marker     = "\001";
            $ctcpType   = 'ACTION';
        }

        if ($type == 'CTCP' || $type == 'CTCPREPLY') {
                $type       = ($type == 'CTCP' ? 'PRIVMSG' : 'NOTICE');
                $marker     = "\001";
                $parts      = explode(' ', $message);
                $ctcpType   = array_shift($parts);
                $message    = implode(' ', $parts);
        }

        if ($ctcpType != "" && $message != "") {
            $ctcpType .= " ";
            $message = self::_ctcpQuote($message);
        }

        $prefix = $type.' '.$targets.' :'.$marker.$ctcpType;
        // 400 is a rough estimation of how big
        // a message we may send.
        $messages = explode(
            "\n",
            wordwrap(
                $message,
                400 - $prefix - 2,
                "\n",
                true
            )
        );
        $io = $this->connection->getIO();
        foreach ($messages as $msg) {
            $io->push($prefix.$msg.$marker);
        }
    }

    /**
     * Quotes a CTCP message.
     *
     * \param string $message
     *      Message to quote.
     *
     * \retval string
     *      Quoted version of the message.
     *
     * \see
     *      http://www.irchelp.org/irchelp/rfc/ctcpspec.html
     *      describes the quoting algorithm used.
     */
    protected static function ctcpQuote($message)
    {
        // First comes low-level quoting.
        $quoting = array(
            "\000"  => "\0200",
            "\n"    => "\020n",
            "\r"    => "\020r",
            "\020"  => "\020\020",
        );
        $message = strtr($message, $quoting);

        // Next some CTCP-level quoting and we're done.
        $quoting = array(
            "\001"  => "\\a",
            "\\"    => "\\\\",
        );
        $message = strtr($message, $quoting);
        return $message;
    }

    /**
     * Send a raw command to the IRC server.
     *
     * \param string $command
     *      The command to send.
     */
    protected function sendCommand($command)
    {
        if (!\Erebot\Utils::stringifiable($command)) {
            throw new \Exception('Invalid command (not a string)');
        }
        $this->connection->getIO()->push((string) $command);
    }

    /**
     * Register a timer.
     *
     * \param Erebot::TimerInterface $timer
     *      The timer to register.
     *
     * \note
     *      This method is only a shortcut for
     *      Erebot::Interfaces::Core::addTimer().
     */
    protected function addTimer(\Erebot\TimerInterface $timer)
    {
        $bot = $this->connection->getBot();
        return $bot->addTimer($timer);
    }

    /**
     * Unregister a timer.
     *
     * \param Erebot::TimerInterface $timer
     *      The timer to unregister.
     *
     * \note
     *      This method is only a shortcut for
     *      Erebot::Interfaces::Core::removeTimer().
     */
    protected function removeTimer(\Erebot\TimerInterface $timer)
    {
        $bot = $this->connection->getBot();
        return $bot->removeTimer($timer);
    }

    /**
     * \internal
     * Retrieves a parameter from the module's configuration
     * by recursively traversing the configuration hierarchy
     * and parses it using the appropriate function.
     *
     * \param string $something
     *      The type of parsing to apply to the parameter.
     *      This is used to determine the correct parsing
     *      method to call.
     *
     * \param string $param
     *      The name of the parameter to retrieve.
     *
     * \param mixed $default
     *      The default value if the parameter is absent.
     *      It's actual type depends on the type of parsing
     *      applied by the $something argument.
     *
     * \warning
     *      This method may throw several exceptions for
     *      different reasons (such as a missing parameter,
     *      an invalid value or an invalid default value).
     */
    private function parseSomething($something, $param, $default)
    {
        $function   = 'parse'.$something;
        $bot        = $this->connection->getBot();
        if ($this->channel !== null) {
            try {
                $config = $this->connection->getConfig($this->channel);
                return $config->$function(get_class($this), $param);
            } catch (\Erebot\Exception $e) {
                unset($config);
            }
        }
        $config = $this->connection->getConfig(null);
        return $config->$function(get_class($this), $param, $default);
    }

    /**
     * Returns the boolean value for a setting in this module's configuration.
     *
     * \param string $param
     *      The name of the parameter we are interested in.
     *
     * \param bool $default
     *      (optional) A default value in case no value has been set
     *      at the configuration level.
     *
     * \retval bool
     *      The value for that parameter.
     *
     * \throw Erebot::InvalidValueException
     *      The given $default value does not have the right type.
     */
    protected function parseBool($param, $default = null)
    {
        return $this->parseSomething('Bool', $param, $default);
    }

    /**
     * Returns the string value for a setting in this module's configuration.
     *
     * \param string $param
     *      The name of the parameter we are interested in.
     *
     * \param string $default
     *      An optional default value in case no value has been set
     *      at the configuration level.
     *
     * \retval string
     *      The value for that parameter.
     *
     * \throw Erebot::InvalidValueException
     *      The given $default value does not have the right type.
     */
    protected function parseString($param, $default = null)
    {
        return $this->parseSomething('String', $param, $default);
    }

    /**
     * Returns the integer value for a setting in this module's configuration.
     *
     * \param int $param
     *      The name of the parameter we are interested in.
     *
     * \param int $default
     *      (optional) A default value in case no value has been set
     *      at the configuration level.
     *
     * \retval int
     *      The value for that parameter.
     *
     * \throw Erebot::InvalidValueException
     *      The given $default value does not have the right type.
     */
    protected function parseInt($param, $default = null)
    {
        return $this->parseSomething('Int', $param, $default);
    }

    /**
     * Returns the real value for a setting in this module's configuration.
     *
     * \param string $param
     *      The name of the parameter we are interested in.
     *
     * \param float $default
     *      (optional) A default value in case no value has been set
     *      at the configuration level.
     *
     * \retval float
     *      The value for that parameter.
     *
     * \throw Erebot::InvalidValueException
     *      The given $default value does not have the right type.
     */
    protected function parseReal($param, $default = null)
    {
        return $this->parseSomething('Real', $param, $default);
    }

    /**
     * Registers the given callback as the help method for this module.
     * All help requests directed to this module will be passed to this
     * method which may choose to handle it (eg. by sending back help
     * messages to the person requesting help).
     * This method may also choose to ignore a given request, which will
     * result in a default "No help available" response.
     *
     * \param Erebot::CallableInterface $callback
     *      The callback to register as the help method
     *      for this module.
     *
     * \retval true
     *      The callback could be registered.
     *
     * \retval false
     *      The callback could not be registered.
     *
     * \note
     *      In case multiple calls to this method are done by
     *      the same module, only the last registered callback
     *      will effectively be called to handle help requests.
     */
    protected function registerHelpMethod(\Erebot\CallableInterface $callback)
    {
        try {
            $helper = $this->connection->getModule(
                '\\Erebot\\Module\\Helper',
                $this->channel
            );
            return $helper->realRegisterHelpMethod($this, $callback);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Returns the appropriate formatter for the given channel.
     *
     * \param null|false|string $chan
     *      The channel for which a formatter must be returned.
     *      If $chan is \b null, the hierarchy of configurations
     *      is traversed to find the most appropriate formatter.
     *      If $chan is \b false, a formatter is built using the
     *      bot's main translator.
     *
     * \retval Erebot::StylingInterface
     *      A formatter for the given channel.
     */
    protected function getFormatter($chan)
    {
        $cls = $this->getFactory('!Styling');
        if ($chan === false) {
            return new $cls($this->translator);
        } elseif ($chan !== null) {
            $config = $this->connection->getConfig($chan);
            try {
                // Passing $this to get_class() is necessary to retrieve
                // the instance's class instead of the code's definition
                // class (\Erebot\Module\Base).
                return new $cls($config->getTranslator(get_class($this)));
            } catch (\Erebot\Exception $e) {
            // The channel lacked a specific config. Use the cascade.
            }
            unset($config);
        }

        $config = $this->connection->getConfig($this->channel);
        try {
            return new $cls($config->getTranslator(get_called_class()));
        } catch (\Erebot\Exception $e) {
            // The channel lacked a specific config. Use the cascade.
        }
        unset($config);

        $config = $this->connection->getConfig(null);
        return new $cls($config->getTranslator(get_called_class()));
    }

    /**
     * This method is a simple shortcut to create references
     * to numeric messages.
     *
     * \param $name
     *      Name of the numeric message for which a reference
     *      must be returned (eg. "RPL_WELCOME").
     *
     * \retval Erebot::Interfaces::NumericReference
     *      A numeric reference.
     */
    public function getNumRef($name)
    {
        $cls = $this->getFactory('!NumericReference');
        return new $cls($this->connection, $name);
    }
}
