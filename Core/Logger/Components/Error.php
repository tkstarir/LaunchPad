<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Logger {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Error')){

		// Application error logger
		trait Error {

			// Insert error log
			// @variable ?String $log | default null
			// @variable Boolean $force | default false
			// @return Boolean
			public static function Error(?String $log = null, Bool $force = false) : Bool {
				return(self::Insert($log, 'e', $force));
			}

		}

	}

	return(\LaunchPad\Components\Logger\Error::class);

}

?>