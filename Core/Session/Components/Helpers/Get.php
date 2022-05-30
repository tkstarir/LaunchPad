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
	if(!trait_exists(__NAMESPACE__ . '\\Get')){

		// Get a content/value from a specified key in sessions
		trait Get {

			// Get a specify value from a custom session key
			// @variable ?String $key | default null
			// @variable ?Mixed $default_value | default null
			// @return ?Mixed
			protected static function Get(?String $key = null, $default_value = null){
				if(self::$active){
					$key = Framework\Cleaner::Trim($key);
					if(isset(self::$sessions[$key])){
						$value = Framework\Cleaner::Trim(self::$sessions[$key]);
						if(Framework\Validator::IsNullOrEmpty($value)){
							if(Framework\Validator::IsNullOrEmpty($default_value)){
								return false;
							}else{
								return($default_value);
							}
						}else{
							return($value);
						}
					}else{
						return(Framework\Validator::IsNullOrEmpty($default_value) ? false : $default_value);
					}
				}else{
					// Error session is not active
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Helpers\Get::class);

}

?>