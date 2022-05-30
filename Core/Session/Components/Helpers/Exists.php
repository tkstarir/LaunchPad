<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Session\Helpers {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Exists')){

		// Check specified index exists in sessions
		trait Exists {

			// Check specified index exists or not. even if it's exists but its value was null, this method return true
			// @variable ?String $key | default null
			// @return Boolean
			public static function Exists(?String $key = null) : Bool {
				if(self::$active){
					$key = self::Appellation($key);
					if(isset(self::$sessions[$key])){
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

	return(\LaunchPad\Components\Session\Helpers\Exists::class);

}

?>