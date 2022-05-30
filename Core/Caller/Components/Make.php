<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Caller {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Make')){

		// Make your closure and requested requires
		trait Make {

			// Get requested requires, pass them to your closure and return it output
			// @variable ?Mixed $closure | default null
			// @variable Array $default_parameters
			// @return ?Mixed
			public static function Make($closure = null, ...$default_parameters){
				if(is_callable($closure)){
					$parameters = self::Get_Parameters($closure);
					$requires = self::Get_Requires($parameters, $default_parameters);
					$closure_output = self::Call($closure, $requires);
					return($closure_output);
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Caller\Make::class);

}

?>