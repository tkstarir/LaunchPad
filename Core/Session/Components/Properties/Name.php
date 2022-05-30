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
	if(!trait_exists(__NAMESPACE__ . '\\Name')){

		// Get or set session name of php
		trait Name {

			// Set specified name for sessions or leave name to get current
			// @variable ?String $name | default null
			// @return ?Mixed
			public static function Name(?String $name = null){
				if(Framework\Validator::IsNullOrEmpty($name)){
					return(self::$name);
				}else{
					if(!self::$active){
						$name = Framework\Cleaner::XSS($name);
						if(!Framework\Validator::IsNullOrEmpty($name)){
							self::$name = $name;
							session_name($name);
							return true;
						}else{
							// Error invalid $name
						}
					}else{
						// Error session is active and can't change
					}
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Properties\Name::class);

}

?>