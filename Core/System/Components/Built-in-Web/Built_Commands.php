<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\System\Built_in_Web {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Built_Commands')){

		// Buil-in command for PHP software calling in terminal
		trait Built_Commands {

			// @property:protected String $php_command | default '-S'
			protected static $php_command = '-S';

			// @property:protected String $hostname | default '127.0.0.1'
			protected static $hostname = '127.0.0.1';

			// @property:protected String $port | default '8000'
			protected static $port = '8000';

			// @property:protected String $target | default App/App.php
			protected static $target = 'App' . DS . 'App.php';

			// Getting PHP built-in command for launch your appplication
			// @no_variable
			// @return ?String
			public static function Built_Command() : ?String {
				$php_binary = self::PHP_Binary();
				$php_command = self::Get_PHPCommand();
				$hostname = self::Get_Hostname();
				$port = self::Get_Port();
				$target = self::Get_Target();
				$php_binary = $php_binary . ' ' . $php_command . ' ' . $hostname . ':' . $port . ' ' . $target;
				return($php_binary);
			}

			// Setting PHP command (Tag slide) for launch application
			// @variable ?String $php_command | default null
			// @return Boolean
			public static function PHPCommand(?String $php_command = null) : Bool {
				if(!Framework\Validator::IsNullOrEmpty($php_command)){
					$php_command = Framework\Cleaner::Trim($php_command);
					self::$php_command = $php_command;
					return true;
				}else{
					return false;
				}
			}

			// Getting PHP command for calling in terminal
			// @no_variable
			// @return ?String
			public static function Get_PHPCommand() : ?String {
				return(Framework\Cleaner::Trim(self::$php_command));
			}

			// Setting hostname for launch of application
			// @variable ?String $hostname | default null
			// @return Boolean
			public static function Hostname(?String $hostname = null) : Bool {
				if(!Framework\Validator::IsNullOrEmpty($hostname)){
					$hostname = Framework\Cleaner::Trim($hostname);
					self::$hostname = $hostname;
					return true;
				}else{
					return false;
				}
			}

			// Getting hostname of application
			// @no_variable
			// @return ?String
			public static function Get_Hostname() : ?String {
				return(Framework\Cleaner::Trim(self::$hostname));
			}

			// Setting port for launch of application
			// @variable Int $port | default 8000
			// @return Boolean
			public static function Port(Int $port = 8000) : Bool {
				if(!Framework\Validator::IsNullOrEmpty($port)){
					$port = Framework\Cleaner::Number($port);
					if($port >= 0 AND $port <= 65535){
						self::$port = $port;
						return true;
					}else{
						Framework\Logger::Error(Framework\Config::Newline() . 'a Valid Port for Launching LaunchPad Must be Between 0/65535', true);
						return false;
					}
				}else{
					return false;
				}
			}

			// Getting port of application
			// @no_variable
			// @return ?String
			public static function Get_Port() : ?String {
				return(Framework\Cleaner::Trim(self::$port));
			}

			// Setting target file for launching application on it
			// @variable ?String $target | default null
			// @return Boolean
			public static function Target(?String $target = null) : Bool {
				if(!Framework\Validator::IsNullOrEmpty($target)){
					$target = Framework\Cleaner::Trim($target);
					self::$target = $target;
					return true;
				}else{
					return false;
				}
			}

			// Getting target file of application
			// @no_variable
			// @return ?String
			public static function Get_Target() : ?String {
				return(Framework\Cleaner::Trim(self::$target));
			}

		}

	}

	return(\LaunchPad\Components\System\Built_in_Web\Built_Commands::class);

}

?>