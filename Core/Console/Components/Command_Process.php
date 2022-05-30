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
	if(!trait_exists(__NAMESPACE__ . '\\Command_Process')){

		// Command_Process trait is trait for validating and processing of your commands
		trait Command_Process {

			// Processing of your entered command and it options
			// @variable Array $inputs
			// @return Boolean
			public static function Command_Process(Array $inputs = array()) : Framework\Console | Bool {
				if(self::Check_Command($inputs) === true){
					$command_processor = $inputs[0];
					$command_processor = Framework\Cleaner::Lower_Case($command_processor);
					$command_processor = self::$valid_commands[$command_processor];
					if(trait_exists($command_processor)){
						return(self::Make_Command($inputs[0], $inputs));
					}else{
						$new_line = Framework\Config::Newline();
						Framework\Logger::Error($new_line . 'Invalid Command "' . $inputs[0] . '"' . $new_line . $new_line . 'Type "php countdown help"' . $new_line, true);
						return false;
					}
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Console\Command_Process::class);

}

?>