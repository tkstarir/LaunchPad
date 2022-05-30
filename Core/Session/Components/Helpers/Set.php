<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Session\Helpers {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Set')){

		// Setting a content/value to a specified key in sessions
		trait Set {

			// Set a specify value to a custom session key
			// @variable ?String $key | default null
			// @variable ?String $value | default null
			// @variable Boolean $rewrite | default true
			// @return Boolean
			protected static function Set(?String $key = null, ?String $value = null, Bool $rewrite = true) : Bool {
				if(self::$active){
					$key = Framework\Cleaner::Trim($key);
					$key = self::Appellation($key);
					$value = Framework\Cleaner::Trim($value);
					$rewrite = is_bool($rewrite) ? $rewrite : true;
					if((isset(self::$sessions[$key]) AND $rewrite == true) OR !isset(self::$sessions[$key])){
						self::$sessions[$key] = $_SESSION[$key] = $value;
						return true;
					}else{
						return false;
					}
				}else{
					// Error session is not Active
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Helpers\Set::class);

}

?>