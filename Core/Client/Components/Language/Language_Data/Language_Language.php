<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Language\Language_Data {

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Language_Language')){

		// Fetch language from details of client
		trait Language_Language {

			// Getting language
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Language_Language(?Callable $closure = null){
				return(self::Language_Fetch('language', $closure));
			}

			// Clone of "Language_Language" method
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Language_Lang(?Callable $closure = null){
				return(self::Language_Language($closure));
			}

			// Clone of "Language_Language" method
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Lang(?Callable $closure = null){
				return(self::Language_Language($closure));
			}

		}

	}

	return(\LaunchPad\Components\Client\Language\Language_Data\Language_Language::class);

}

?>