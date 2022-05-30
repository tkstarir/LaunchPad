<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\System\Scheduling {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\IsCli')){

		// Check LaunchPad run in a cli interface or not
		trait IsCli {

			// Get current value of self::$cli property
			// @no_variable
			// @return Boolean
			public static function IsCli() : Bool {
				return(self::$cli);
			}

		}

	}

	return(\LaunchPad\Components\System\Scheduling\IsCli::class);

}

?>