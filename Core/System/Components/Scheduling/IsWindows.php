<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\System\Scheduling {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\IsWindows')){

		// Check LaunchPad run in a windows server or not
		trait IsWindows {

			// Get current value of self::$windows property
			// @no_variable
			// @return Boolean
			public static function IsWindows() : Bool {
				return(self::$windows);
			}

		}

	}

	return(\LaunchPad\Components\System\Scheduling\IsWindows::class);

}

?>