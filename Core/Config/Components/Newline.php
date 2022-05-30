<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Config {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Newline')){

		// Newline character for cli logs and logger core
		trait Newline {

			// Get LaunchPad newline character for cli logs and logger
			// @no_variable
			// @return ?String
			public static function Newline() : ?String {
				$new_line = Framework\Config::Core('Special_Characters');
				$new_line = (is_array($new_line) AND isset($new_line['L'])) ? $new_line['L'] : PHP_EOL;
				return($new_line);
			}

		}

	}

	return(\LaunchPad\Components\Config\Newline::class);

}

?>