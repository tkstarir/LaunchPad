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
	if(!trait_exists(__NAMESPACE__ . '\\Module_Name')){

		// Get or set session modules name of php
		trait Module_Name {

			// Set specified module name for sessions or leave module name to get current
			// @variable ?String $module_name | default null
			// @return ?Mixed
			public static function Module_Name(?String $module_name = null){
				if(!self::$active){
					if(Framework\Validator::IsNullOrEmpty($module_name)){
						return(self::$module_name);
					}else{
						$module_name = Framework\Cleaner::XSS($module_name);
						if(!Framework\Validator::IsNullOrEmpty($module_name)){
							self::$module_name = $module_name;
							session_module_name($module_name);
							return true;
						}else{
							// Error invalid $module_name
						}
					}
				}else{
					// Error session is active and can't change
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Properties\Module_Name::class);

}

?>