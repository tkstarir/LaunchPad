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
	if(!trait_exists(__NAMESPACE__ . '\\Clear')){

		// Clear specified index from sessions
		trait Clear {

			// Delete specified index from sessions with key
			// @variable ?String $key | default null
			// @return Boolean
			protected static function Clear(?String $key = null) : Bool {
				if(self::$active){
					$key = Framework\Cleaner::Trim($key);
					$key = self::Appellation($key);
					if(isset(self::$sessions[$key])){
						unset($_SESSION[$key], self::$sessions[$key]);
						return true;
					}else{
						return false;
					}
				}else{
					return false;
					// Error session not active
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Helpers\Clear::class);

}

?>