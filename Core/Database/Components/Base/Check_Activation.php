<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\Base {

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Check_Activation')){

		// Checking database activation status
		trait Check_Activation {

			// Check database connection is activated or not
			// @no_variable
			// @return Boolean
			public static function Check_Activation() : Bool {
				return empty(self::$connection) ? self::Debuging('Database is not Activated !') : true;
			}

		}

	}

	return(\LaunchPad\Components\Database\Base\Check_Activation::class);

}

?>