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
	if(!trait_exists(__NAMESPACE__ . '\\Has')){

		// Check specified index exists and has a accessible value
		trait Has {

			// Check specified index exists or not and have a valid value or not. If its value was null this method return false
			// @variable ?String $key | default null
			// @return Boolean
			public static function Has(?String $key = null) : Bool {
				if(self::$active){
					$key = self::Appellation($key);
					if(isset(self::$sessions[$key]) AND !Framework\Validator::IsNullOrEmpty(self::$sessions[$key])){
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

	return(\LaunchPad\Components\Session\Helpers\Has::class);

}

?>