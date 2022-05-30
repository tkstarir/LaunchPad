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

	if(!trait_exists(__NAMESPACE__ . '\\Count')){

		// SQL count method
		trait Count {

			// Get number of rows in a query in distinct or normal mode
			// @variable ?String $column | default null
			// @variable ?Mixed $distinct | default null
			// @variable ?Callable $closure | default null
			// @return ?Float
			public static function Count(?String $column = null, $distinct = null, ?Callable $closure = null) : ?Float {
				$distinct_type = (is_callable($distinct) OR Framework\Validator::IsNullOrEmpty($distinct)) ? '' : ($distinct === true ? 'DISTINCT ' : '');
				self::Prepare('COUNT(' . $distinct_type . '`' . $column . '`)');
				self::$aggregate = true;
				$result = self::Result(false);
				Framework\Caller::Make($distinct, $result);
				Framework\Caller::Make($closure, $result);
				return($result);
			}

		}

	}

	return(\LaunchPad\Components\Database\Functions\Aggregates\Count::class);

}

?>