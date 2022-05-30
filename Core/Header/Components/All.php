<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Header {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\All')){

		// Receive all headers as array
		trait All {

			// Get all request headers
			// @no_variable
			// @return Array
			public static function All() : Array {
				$headers = getallheaders();
				settype($headers, 'Array');
				return($headers);
			}

		}

	}

	return(\LaunchPad\Components\Header\All::class);

}

?>