<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder\Joins {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\RightJoin')){

		// Right join method for right joinning of 2 tables
		trait RightJoin {

			// Right join method for Join 2 Table with Them Columns
			// @variable ?String $second_table | default null
			// @variable ?String $left_column | default null
			// @variable ?String $operator | default null
			// @variable ?String $right_column | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			public static function RightJoin(?String $second_table = null, ?String $left_column = null, ?String $operator = null, ?String $right_column = null, ?Callable $closure = null) : \LaunchPad\Database {
				self::Check_Activation();
				$database_object = self::Static();
				self::$joins[] = array('type' => 'right_join', 'left_column' => $left_column, 'operator' => $operator, 'right_column' => $right_column, 'second_table' => $second_table);
				Framework\Caller::Make($closure, $database_object);
				return($database_object);
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Joins\RightJoin::class);

}

?>