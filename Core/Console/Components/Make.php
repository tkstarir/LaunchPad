<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Console {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Make')){

		// "Make" Method for CountDown processes
		trait Make {

			// Make and activate LaunchPad CountDown
			// @no_variable
			// @return Boolean
			public static function Make() : Bool {
				$commands = self::Get_Commands();
				self::Command_Process($commands);
				return true;
			}

		}

	}

	return(\LaunchPad\Components\Console\Make::class);

}

?>