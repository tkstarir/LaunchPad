<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Operating_System\OS_Data {

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\OS_Name')){

		// Fetch name of operating system from details of client
		trait OS_Name {

			// Getting operating system name
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function OS_Name(?Callable $closure = null){
				return(self::OS_Fetch('name', $closure));
			}

		}

	}

	return(\LaunchPad\Components\Client\Operating_System\OS_Data\OS_Name::class);

}

?>