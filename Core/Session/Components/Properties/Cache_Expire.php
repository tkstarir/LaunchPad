<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Session\Properties {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Cache_Expire')){

		// Get or set session cache expire of php
		trait Cache_Expire {

			// Set specified expire for session cache expire or leave expire empty type to get current
			// @variable Int $expire | default 0
			// @return ?Mixed
			public static function Cache_Expire(Int $expire = 0){
				if(Framework\Validator::IsNullOrEmpty($expire)){
					return(self::$cache_expire);
				}else{
					if(!self::$active){
						$expire = Framework\Cleaner::XSS($expire);
						if(is_numeric($expire)){
							self::$cache_expire = $expire;
							$result = session_cache_expire($expire);
							return($result);
						}else{
							// Error invalid $expire
							return false;
						}
					}else{
						// Error session not active
						return false;
					}
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Properties\Cache_Expire::class);

}

?>