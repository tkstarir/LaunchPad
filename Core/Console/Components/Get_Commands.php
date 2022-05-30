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
	if(!trait_exists(__NAMESPACE__ . '\\Get_Commands')){

		// Get_Command traits for getting command and it options that entered by your in terminal
		trait Get_Commands {

			// Get command it options that entered by you in terminal ("CountDown" Application)
			// @no_variable
			// @return Array
			public static function Get_Commands() : Array {
				$output = array();
				if(!Framework\System::Check_Cli()){
					Framework\Logger::Warning('LaunchPad not Running with Cli or CountDown Application !');
					return($output);
				}else{
					if($_SERVER['argc'] <= 0){
						return($output);
					}else{
						$argv = $_SERVER['argv'];
						$argv = Framework\Cleaner::XSS($argv);
						$commands = array();
						foreach($argv as $command_key => $command_value){
							if($command_key == 1 AND strpos($command_value, ':') !== false){
								$commands = explode(':', $command_value);
							}elseif($command_value != $_SERVER['PHP_SELF']){
								$commands[] = $command_value;
							}else{
								continue;
							}
						}
						$commands = array_values($commands);
						return($commands);
					}
				}
			}

		}

	}

	return(\LaunchPad\Components\Console\Get_Commands::class);

}

?>