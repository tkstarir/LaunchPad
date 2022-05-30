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
	if(!trait_exists(__NAMESPACE__ . '\\ID')){

		// Get or set session id of php
		trait ID {

			// Set specified id for sessions or leave id to get current
			// @variable ?String $id | default null
			// @return ?Mixed
			public static function ID(?String $id = null){
				if(self::$active){
					if(Framework\Validator::IsNullOrEmpty($id)){
						return(self::$id);
					}else{
						$id = Framework\Cleaner::XSS($id);
						if(!Framework\Validator::IsNullOrEmpty($id)){
							self::$id = $id;
							session_id($id);
							return true;
						}else{
							// Error invalid $id
						}
					}
				}else{
					// Error session not active
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Properties\ID::class);

}

?>