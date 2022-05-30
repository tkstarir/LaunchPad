<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Logger {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Infos')){

		// Receive logs
		trait Infos {

			// Get all info logs as array
			// @no_variable
			// @return Array
			public static function Infos() : Array {
				$infos = self::$infos;
				settype($infos, 'Array');
				return($infos);
			}

		}

	}

	return(\LaunchPad\Components\Logger\Infos::class);

}

?>