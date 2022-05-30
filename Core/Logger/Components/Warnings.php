<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Logger {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Warnings')){

		// Receive warning logs
		trait Warnings {

			// Get all warning logs as array
			// @no_variable
			// @return Array
			public static function Warnings() : Array {
				$warnings = self::$warnings;
				settype($warnings, 'Array');
				return($warnings);
			}

		}

	}

	return(\LaunchPad\Components\Logger\Warnings::class);

}

?>