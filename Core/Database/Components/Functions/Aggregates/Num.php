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
	if(!trait_exists(__NAMESPACE__ . '\\Num')){

		// Getting rowCount of Result
		trait Num {

			// Get total num rows of query result (rowCount)
			// @variable ?Callable $closure | default null
			// @return Float
			public static function Num(?Callable $closure = null) : Float {
				self::Prepare('*');
				$result = self::RowCount();
				Framework\Caller::Make($closure, $result);
				return($result);
			}

		}

	}

	return(\LaunchPad\Components\Database\Functions\Aggregates\Num::class);

}

?>