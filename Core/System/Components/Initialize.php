<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\System {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Initialize')){

		// Initializing "System" core
		trait Initialize {

			// "System" core initialize for pure LaunchPad
			// @no_variable
			// @return Boolean
			public static function Initialize() : Bool {
				self::Check_Full_OS();
				self::OS_Check();
				self::Check_Cli();
				self::Check_Linux();
				self::Check_Windows();
				return true;
			}

		}

	}

	return(\LaunchPad\Components\System\Initialize::class);

}

?>