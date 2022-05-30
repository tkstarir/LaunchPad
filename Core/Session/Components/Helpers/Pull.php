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
	if(!trait_exists(__NAMESPACE__ . '\\Pull')){

		// Retrieving an item value and delete it from sessions
		trait Pull {

			// Retrieving an item value and delete it from sessions. if it not exists and you set default value, return default value
			// @variable ?String $key | default null
			// @variable ?String $default_value | default null
			// @return ?Mixed
			public static function Pull(?String $key = null, ?String $default_value = null){
				if(self::$active){
					if(self::Has($key)){
						$value = self::Get($key);
						self::Clear($key);
						return($value);
					}else{
						return(!Framework\Validator::IsNullOrEmpty($default_value) ? $default_value : false);
					}
				}else{
					return false;
					// Error session not active
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Helpers\Pull::class);

}

?>