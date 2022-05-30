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
	if(!trait_exists(__NAMESPACE__ . '\\OrWhere')){

		// Or where method based on PDO
		trait OrWhere {

			// Define or wheres and ifs for queries in models or query builder
			// @variable ?Mixed $column | default null
			// @variable ?Mixed $operator | default null
			// @variable ?Mixed $value | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			public static function OrWhere($column = null, $operator = null, $value = null, ?Callable $closure = null) : \LaunchPad\Database {
				self::Check_Activation();
				$database_object = self::Static();
				if(is_array($column)){
					$orWhere = array();
					foreach($column as $key => $value){
						$column = $value[0];
						$operator = isset($value[2]) ? $value[1] : '=';
						$operator = !in_array($operator, self::$valid_operators) ? '=' : $operator;
						$value = isset($value[2]) ? $value[2] : $value[1];
						$orWhere[] = array('where' => $column, 'if' => $value, 'operator' => $operator, 'type' => 'or');
					}
					self::$wheres[] = $orWhere;
				}elseif(is_null($value) OR is_callable($value)){
					self::$wheres[] = array('where' => $column, 'if' => $operator, 'operator' => '=', 'type' => 'or');
				}else{
					$operator = !in_array($operator, self::$valid_operators) ? '=' : $operator;
					self::$wheres[] = array('where' => $column, 'if' => $value, 'operator' => $operator, 'type' => 'or');
				}
				Framework\Caller::Make($operator, $database_object);
				Framework\Caller::Make($value, $database_object);
				Framework\Caller::Make($closure, $database_object);
				return($database_object);
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Wheres\OrWhere::class);

}

?>