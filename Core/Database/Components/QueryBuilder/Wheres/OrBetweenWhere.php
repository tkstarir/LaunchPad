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
	if(!trait_exists(__NAMESPACE__ . '\\OrBetweenWhere')){

		// Or between where method based on PDO
		trait OrBetweenWhere {

			// Define where between two number
			// @variable ?String $column | default null
			// @variable Array $betweens
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			public static function OrBetweenWhere(?String $column = null, Array $betweens = array(), ?Callable $closure = null) : \LaunchPad\Database {
				self::Check_Activation();
				if($betweens[0] < $betweens[1]){
					$database_object = self::Static();
					self::$wheres[] = array('where_between' => $column, 'betweens' => $betweens, 'type' => 'or');
				}
				Framework\Caller::Make($closure, $database_object);
				return($database_object);
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Wheres\OrBetweenWhere::class);

}

?>