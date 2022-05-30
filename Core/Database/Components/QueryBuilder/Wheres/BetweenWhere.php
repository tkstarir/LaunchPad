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
	if(!trait_exists(__NAMESPACE__ . '\\BetweenWhere')){

		// Between where methods based on PDO
		trait BetweenWhere {

			// Define where between two number
			// @variable ?String $column | default null
			// @variable Array $betweens
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			public static function BetweenWhere(?String $column = null, Array $betweens = array(), ?Callable $closure = null) : \LaunchPad\Database {
				self::Check_Activation();
				$database_object = self::Static();
				if($betweens[0] < $betweens[1]){
					$database_object = self::Static();
					self::$wheres[] = array('where_between' => $column, 'betweens' => $betweens, 'type' => 'and');
				}
				Framework\Caller::Make($closure, $database_object);
				return($database_object);
			}

			// Clone of "BetweenWhere" method
			// @variable String $column | default null
			// @variable Array $betweens
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			public static function AndBetweenWhere(?String $column = null, Array $betweens = array(), ?Callable $closure = null) : \LaunchPad\Database {
				return(self::BetweenWhere($column, $betweens, $closure));
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Wheres\BetweenWhere::class);

}

?>