<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Logger {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Get')){

		// Receive logs
		trait Get {

			// Get all logs as array
			// @no_variable
			// @return Array
			public static function Get() : Array {
				$logs = array();
				$logs['warnings'] = self::$warnings;
				$logs['errors'] = self::$errors;
				$logs['infos'] = self::$infos;
				settype($logs, 'Array');
				return($logs);
			}

		}

	}

	return(\LaunchPad\Components\Logger\Get::class);

}

?>