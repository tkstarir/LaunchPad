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
	if(!trait_exists(__NAMESPACE__ . '\\Average')){

		// SQL average method
		trait Average {

			// Get average value of selected column in query result
			// @variable ?String $max | default null
			// @variable ?Callable $closure | default null
			// @return ?Float
			public static function Average(?String $average = null, ?Callable $closure = null) : ?Float {
				self::Prepare('AVG(' . $average . ')');
				self::$aggregate = true;
				$result = self::Result(false);
				Framework\Caller::Make($closure, $result);
				return($result);
			}

			// Clone of "Average" method
			// @variable ?String $average | default null
			// @variable ?Callable $closure | default null
			// @return ?Float
			public static function Avg(?String $average = null, ?Callable $closure = null) : ?Float {
				return(self::Average($average, $closure));
			}

		}

	}

	return(\LaunchPad\Components\Database\Functions\Aggregates\Average::class);

}

?>