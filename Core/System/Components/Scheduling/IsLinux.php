<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\System\Scheduling {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\IsLinux')){

		// Check LaunchPad run in a linux server or not
		trait IsLinux {

			// Get current value of self::$linux property
			// @no_variable
			// @return Boolean
			public static function IsLinux() : Bool {
				return(self::$linux);
			}

		}

	}

	return(\LaunchPad\Components\System\Scheduling\IsLinux::class);

}

?>