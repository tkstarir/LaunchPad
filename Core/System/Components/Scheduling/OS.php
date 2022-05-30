<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\System\Scheduling {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\OS')){

		// OS component for getting os details and name that LaunchPad run in it
		trait OS {

			// Get operating system name
			// @no_variable
			// @return ?String
			public static function OS() : ?String {
				return(self::$os);
			}

			// Get full os details
			// @no_variable
			// @return ?String
			public static function Full_OS() : ?String {
				return(self::$full_os);
			}

		}

	}

	return(\LaunchPad\Components\System\Scheduling\OS::class);

}

?>