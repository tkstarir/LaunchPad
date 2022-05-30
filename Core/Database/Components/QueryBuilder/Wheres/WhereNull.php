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
	if(!trait_exists(__NAMESPACE__ . '\\WhereNull')){

		// Where null method based on PDO
		trait WhereNull {

			// Define where null for a column
			// @variable ?String $column | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			public static function WhereNull(?String $column = null, ?Callable $closure = null) : \LaunchPad\Database {
				self::Check_Activation();
				$database_object = self::Static();
				if(!Framework\Validator::IsNullOrEmpty($column)){
					self::$wheres[] = array('where' => $column, 'if' => null, 'operator' => '=', 'type' => 'and');
				}
				Framework\Caller::Make($closure, $database_object);
				return($database_object);
			}

			// Clone of "WhereNull" method
			// @variable ?String $column | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			public static function AndWhereNull(?String $column = null, ?Callable $closure = null) : \LaunchPad\Database {
				self::WhereNull($column, $closure);
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Wheres\WhereNull::class);

}

?>