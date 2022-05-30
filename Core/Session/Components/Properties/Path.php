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
	if(!trait_exists(__NAMESPACE__ . '\\Path')){

		// Get or set session save path of php
		trait Path {

			// Set specified path for session save path or leave path to get current
			// @variable ?String $path | default null
			// @return ?Mixed
			public static function Path(?String $path = null){
				if(self::$active){
					if(Framework\Validator::IsNullOrEmpty($path)){
						return(self::$save_path);
					}else{
						$path = Framework\Cleaner::XSS($path);
						if(is_dir($path) AND is_readable($path)){
							self::$save_path = $path;
							session_save_path($path);
							return true;
						}else{
							// Error invalid $path
						}
					}
				}else{
					// Error session not active
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Properties\Path::class);

}

?>