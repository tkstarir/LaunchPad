<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Browser\Browser_Data {

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Browser_Name')){

		// Fetch name of browser from details of client
		trait Browser_Name {

			// Getting browser name
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Browser_Name(?Callable $closure = null){
				return(self::Browser_Fetch('name', $closure));
			}

		}

	}

	return(\LaunchPad\Components\Client\Browser\Browser_Data\Browser_Name::class);

}

?>