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
	if(!trait_exists(__NAMESPACE__ . '\\OrWhereEmpty')){

		// Or where empty method based on PDO
		trait OrWhereEmpty {

			// Define or where empty for a column
			// @variable ?String $column | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			public static function OrWhereEmpty(?String $column = null, ?Callable $closure = null) : \LaunchPad\Database {
				self::Check_Activation();
				$database_object = self::Static();
				if(!Framework\Validator::IsNullOrEmpty($column)){
					self::$wheres[] = array('where' => $column, 'if' => '', 'operator' => '=', 'type' => 'or');
				}
				Framework\Caller::Make($closure, $database_object);
				return($database_object);
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Wheres\OrWhereEmpty::class);

}

?>