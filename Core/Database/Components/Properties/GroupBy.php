<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\Properties {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\GroupBy')){

		// SQL group by statement
		trait GroupBy {

			// Set group by for query
			// @variable ?String $group_by | default null
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function GroupBy(?String $group_by = null, ?Callable $closure = null){
				if(Framework\Validator::IsNullOrEmpty($group_by)){
					return(self::$group_by);
				}else{
					$database_object = self::Static();
					$group_by = Framework\Cleaner::XSS($group_by);
					$group_by = str_replace(array('`'), array(''), $group_by);
					$group_by = self::Appellation($group_by, 'column');
					self::$group_by = $group_by;
					Framework\Caller::Make($closure, $database_object);
					return($database_object);
				}
			}

		}

	}

	return(\LaunchPad\Components\Database\Properties\GroupBy::class);

}

?>