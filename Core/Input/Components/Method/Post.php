<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Input\Method {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Post')){

		// Parse data from POST method
		trait Post {

			// Fetch specified parameter(s) from Post method or getting default value if not exists
			// * Note: leave all parameters empty or enter at least one parameter to get all parameters 
			// @variable ?Mixed $index | default null
			// @variable ?Mixed $default_value | default null
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Post($index = null, $default_value = null, ?Callable $closure = null){
				return(self::Fetch('POST', $index, $default_value, $closure));
			}

		}

	}

	return(\LaunchPad\Components\Input\Method\Post::class);

}

?>