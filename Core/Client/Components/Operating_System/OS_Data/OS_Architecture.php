<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Operating_System\OS_Data {

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\OS_Architecture')){

		// Fetch architecture of operating system from details of client
		trait OS_Architecture {

			// Getting operating system architecture
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function OS_Architecture(?Callable $closure = null){
				return(self::OS_Fetch('architecture', $closure));
			}

			// Clone of "OS_Architecture" method
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function OS_Arch(?Callable $closure = null){
				return(self::OS_Architecture($closure));
			}

		}

	}

	return(\LaunchPad\Components\Client\Operating_System\OS_Data\OS_Architecture::class);

}

?>