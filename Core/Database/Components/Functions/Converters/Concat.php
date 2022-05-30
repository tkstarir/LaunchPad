<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\Functions\Converters {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Concat')){

		// Concat two Arguments
		trait Concat {

			// Concat method for join to strings together
			// @variable ?String $first_join | default null
			// @variable ?String $second_join | default null
			// @return ?String
			public static function Concat(?String $first_join = null, ?String $second_join = null) : ?String {
				$first_join = Framework\Cleaner::Trim($first_join);
				$first_join = preg_match('/\`(.*?)\`/imu', $first_join) ? $first_join : '\'' . $first_join . '\'';
				$second_join = Framework\Cleaner::Trim($second_join);
				$second_join = preg_match('/\`(.*?)\`/imu', $second_join) ? $second_join : '\'' . $second_join . '\'';
				$concat = 'CONCAT(' . $first_join . ', ' . $second_join . ')';
				return($concat);
			}

		}

	}

	return(\LaunchPad\Components\Database\Functions\Converters\Concat::class);

}

?>