<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder\Ins {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\In')){

		// In methods for search a collection in a column
		trait In {

			// Define where in condition for query
			// @variable ?String $column | default null
			// @variable ?Mixed $in | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			public static function In(?String $column = null, $in = null, ?Callable $closure = null) : \LaunchPad\Database {
				self::Check_Activation();
				$database_object = self::Static();
				if(!Framework\Validator::IsNullOrEmpty($column)){
					$in = str_replace(array('`', '\'', '"'), array('', '', ''), $in);
					$in = is_array($in) ? '\'' . join('\', \'', $in) . '\'' : $in;
					self::$wheres[] = array('where_in' => $column, 'in' => $in, 'type' => 'and');
				}
				Framework\Caller::Make($closure, $database_object);
				return($database_object);
			}

			// Clone of "In" method
			// @variable ?String $column | default null
			// @variable ?Mixed $in | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			public static function AndIn(?String $column = null, $in = null, ?Callable $closure = null) : \LaunchPad\Database {
				return(self::In($column, $in, $closure));
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Ins\In::class);

}

?>