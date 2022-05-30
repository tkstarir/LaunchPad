<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\IP {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Client\IP\IP_Data as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Client\IP\IP_Data as Components;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\IP_Data')){

		// Getting IP details that saved before
		trait IP_Data {

			// Get specified ip type from "$_SERVER" global variable or getenv function
			// @variable ?Mixed $ip_type | default null
			// @variable ?Callable $closure | default null
			// @return ?String
			public static function IP_Data($ip_type = null, Callable $closure = null) : ?String {
			}

		}

	}

	return(\LaunchPad\Components\Client\IP\IP_Data::class);

}

?>