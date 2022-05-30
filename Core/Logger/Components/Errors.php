<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Logger {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Errors')){

		// Receive error logs
		trait Errors {

			// Get all error logs as array
			// @no_variable
			// @return Array
			public static function Errors() : Array {
				$errors = self::$errors;
				settype($errors, 'Array');
				return($errors);
			}

		}

	}

	return(\LaunchPad\Components\Logger\Errors::class);

}

?>