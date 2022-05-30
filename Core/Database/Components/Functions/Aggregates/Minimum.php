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
	if(!trait_exists(__NAMESPACE__ . '\\Minimum')){

		// SQL minimum method
		trait Minimum {

			// Get lowest content of selected column in query result
			// @variable ?String $min | default null
			// @variable ?Callable $closure | default null
			// @return ?Float
			public static function Minimum(?String $min = null, ?Callable $closure = null) : ?Float {
				self::Prepare('MIN(' . $min . ')');
				self::$aggregate = true;
				$result = self::Result(false);
				Framework\Caller::Make($closure, $result);
				return($result);
			}

			// Clone of "Minimum" method
			// @variable ?String $min | default null
			// @variable ?Callable $closure | default null
			// @return ?Float
			public static function Min(?String $min = null, ?Callable $closure = null) : ?Float {
				return(self::Minimum($min, $closure));
			}

		}

	}

	return(\LaunchPad\Components\Database\Functions\Aggregates\Minimum::class);

}

?>