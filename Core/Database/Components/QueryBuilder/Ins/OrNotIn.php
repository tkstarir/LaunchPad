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
	if(!trait_exists(__NAMESPACE__ . '\\OrNotIn')){

		// Not in methods for setting a row value not contains a collection values by or statement
		trait OrNotIn {

			// Define where not in condition for query
			// @variable ?String $column | default null
			// @variable ?Mixed $in | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			public static function OrNotIn(?String $column = null, $in = null, ?Callable $closure = null) : \LaunchPad\Database {
				self::Check_Activation();
				$database_object = self::Static();
				if(!Framework\Validator::IsNullOrEmpty($column)){
					$in = str_replace(array('`', '\'', '"'), array('', '', ''), $in);
					$in = is_array($in) ? '\'' . join('\', \'', $in) . '\'' : $in;
					self::$wheres[] = array('where_not_in' => $column, 'in' => $in, 'type' => 'or');
				}
				Framework\Caller::Make($closure, $database_object);
				return($database_object);
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Ins\OrNotIn::class);

}

?>