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
	if(!trait_exists(__NAMESPACE__ . '\\LeftJoin')){

		// Left join method for left joining of two tables
		trait LeftJoin {

			// Left join method for join 2 table with them columns
			// @variable ?String $second_table | default null
			// @variable ?String $left_column | default null
			// @variable ?String $operator | default null
			// @variable ?String $right_column | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			public static function LeftJoin(?String $second_table = null, ?String $left_column = null, ?String $operator = null, ?String $right_column = null, ?Callable $closure = null) : \LaunchPad\Database {
				self::Check_Activation();
				$database_object = self::Static();
				self::$joins[] = array('type' => 'left_join', 'left_column' => $left_column, 'operator' => $operator, 'right_column' => $right_column, 'second_table' => $second_table);
				Framework\Caller::Make($closure, $database_object);
				return($database_object);
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Joins\LeftJoin::class);

}

?>