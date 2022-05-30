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
	if(!trait_exists(__NAMESPACE__ . '\\Cache_Limiter')){

		// Get or set session cache limiter of php
		trait Cache_Limiter {

			// Set specified limiter type for session cache limiter or leave limiter empty type to get current
			// @variable ?String $limiter | default null
			// @return ?Mixed
			public static function Cache_Limiter(?String $limiter = null){
				if(Framework\Validator::IsNullOrEmpty($limiter)){
					return(self::$cache_limiter);
				}else{
					if(!self::$active){
						$limiter = Framework\Cleaner::XSS($limiter);
						if(in_array($limiter, array('nocache', 'private', 'private_no_expire', 'public'))){
							self::$cache_limiter = $limiter;
							$result = session_cache_limiter($limiter);
							return true;
						}else{
							// Error invalid $limiter
						}
					}else{
						// Error session is active and can't change settings
					}
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Properties\Cache_Limiter::class);

}

?>