<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\Functions\Aggregates {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Maximum')){

		// SQL maximum method
		trait Maximum {

			// Get highest content of selected column in query result
			// @variable ?String $max | default null
			// @variable ?Callable $closure | default null
			// @return ?Float
			public static function Maximum(?String $max = null, ?Callable $closure = null) : ?Float {
				self::Prepare('MAX(' . $max . ')');
				self::$aggregate = true;
				$result = self::Result(false);
				Framework\Caller::Make($closure, $result);
				return($result);
			}

			// Clone of "Maximum" method
			// @variable ?String $max | default null
			// @variable ?Callable $closure | default null
			// @return ?Float
			public static function Max(?String $max = null, ?Callable $closure = null) : ?Float {
				return(self::Maximum($max, $closure));
			}

		}

	}

	return(\LaunchPad\Components\Database\Functions\Aggregates\Maximum::class);

}

?>