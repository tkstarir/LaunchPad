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
	if(!trait_exists(__NAMESPACE__ . '\\Insert')){

		// Application Logger
		trait Insert {

			// Insert log
			// @variable ?String $log | default null
			// @variable ?String $type | default null
			// @variable Boolean $force | default false
			// @return Boolean
			public static function Insert(?String $log = null, ?String $type = null, Bool $force = false) : Bool {
				$type = Framework\Validator::IsNullOrEmpty($type) ? 'info' : $type;
				if(Framework\Config::Core('Logger_Status') == true OR $force == true){
					if(!Framework\Validator::IsNullOrEmpty($log) AND in_array($type, array('warnings', 'errors', 'infos', 'warning', 'error', 'info', 'w', 'e', 'i'))){
						$type = ($type == 'warning' OR $type == 'w') ? 'warnings' : $type;
						$type = ($type == 'error' OR $type == 'e') ? 'errors' : $type;
						$type = ($type == 'info' OR $type == 'i') ? 'infos' : $type;
						$count = count(self::$$type);
						$time = microtime();
						$index = $time . '_' . $count;
						self::$$type[$index] = $log;
						self::Cli_Log($log, $force);
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

	return(\LaunchPad\Components\Logger\Insert::class);

}

?>