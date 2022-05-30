<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Session\Utils {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Close')){

		// Unset sessions
		trait Close {

			// Make free all session variables and clear all indexes
			// @variable ?Callable $closure | default null
			// @return Boolean
			public static function Close(?Callable $closure = null) : Bool {
				if(self::$active){
					$result = session_unset();
					count(self::$sessions) >= 1 ? self::$sessions = array() : '';
					Framework\Caller::Make($closure, $result);
					return($result);
				}else{
					return false;
					// Error session not active
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Utils\Close::class);

}

?>