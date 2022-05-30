<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Language\Language_Data {

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Language_Encoding')){

		// Fetch encoding from details of client
		trait Language_Encoding {

			// Getting language encoding
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Language_Encoding(?Callable $closure = null){
				return(self::Language_Fetch('encoding', $closure));
			}

			// Clone of "Language_Encoding" method
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Encoding(?Callable $closure = null){
				return(self::Language_Encoding($closure));
			}

		}

	}

	return(\LaunchPad\Components\Client\Language\Language_Data\Language_Encoding::class);

}

?>