<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Console {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Check_Command')){

		// Check_Command for checking your entered command and options
		trait Check_Command {

			// Check if entered command is correct and useful or not
			// @variable Array $commands
			// @return Boolean
			public static function Check_Command(Array $commands = array()) : Bool {
				$commands = Framework\Cleaner::XSS($commands);
				if(count($commands) <= 0 OR $commands[0] == 'help'){
					$new_line = Framework\Config::Newline();
					Framework\Logger::Error($new_line . 'Help' . $new_line, true);
					return false;
				}else{
					$command = Framework\Cleaner::Lower_Case($commands[0]);
					if(!in_array($command, array_keys(self::$valid_commands))){
						$new_line = Framework\Config::Newline();
						Framework\Logger::Error($new_line . 'Invalid Command "' . $command . '"' . $new_line . $new_line . 'Type "php countdown help"' . $new_line, true);
						return false;
					}else{
						return true;
					}
				}
			}

		}

	}

	return(\LaunchPad\Components\Console\Check_Command::class);

}

?>