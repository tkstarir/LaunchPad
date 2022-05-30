<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder\Wheres {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\WhereLike')){

		// Where like method based on PDO
		trait WhereLike {

			// Define where like RegEXP pattern for a column
			// @variable ?String $column | default null
			// @variable ?String $value | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			public static function WhereLike(?String $column = null, ?String $value = null, ?Callable $closure = null) : \LaunchPad\Database {
				self::Check_Activation();
				$database_object = self::Static();
				if(!Framework\Validator::IsNullOrEmpty($column) AND !Framework\Validator::IsNullOrEmpty($value)){
					self::$wheres[] = array('where_like' => $column, 'if' => $value, 'type' => 'and');
				}
				Framework\Caller::Make($closure, $database_object);
				return($database_object);
			}

			// Clone of "WhereLike" method
			// @variable ?String $column | default null
			// @variable ?String $value | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			public static function AndWhereLike(?String $column = null, ?String $value = null, ?Callable $closure = null) : \LaunchPad\Database {
				return(self::WhereLike($column, $value, $closure));
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Wheres\WhereLike::class);

}

?>