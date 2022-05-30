<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Language\Language_Data {

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Language_Locale')){

		// Fetch locale of language from details of client
		trait Language_Locale {

			// Getting language locale
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Language_Locale(?Callable $closure = null){
				return(self::Language_Fetch('locale', $closure));
			}

			// Clone of "Language_Locale" method
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Locale(?Callable $closure = null){
				return(self::Language_Locale($closure));
			}

		}

	}

	return(\LaunchPad\Components\Client\Language\Language_Data\Language_Locale::class);

}

?>