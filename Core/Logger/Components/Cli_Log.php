<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Logger {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Cli_Log')){

		// Terminal Logger
		trait Cli_Log {

			// Insert Log for terminal (console)
			// @variable ?String $log | default null
			// @variable Boolean $force | default false
			// @return Boolean
			public static function Cli_Log(?String $log = null, Bool $force = false) : Bool {
				if(Framework\Config::Core('Logger_Status') == true OR $force == true){
					if(Framework\System::IsCli()){
						$new_line = Framework\Config::Newline();
						$log = $log == $new_line ? $new_line : $log . $new_line;
						echo($log);
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Logger\Cli_Log::class);

}

?>