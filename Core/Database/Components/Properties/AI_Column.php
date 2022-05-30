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
	if(!trait_exists(__NAMESPACE__ . '\\AI_Column')){

		// AI column for queries that need auto increment. Here you can change default AI column of LaunchPad
		trait AI_Column {

			// Change auto increment column name
			// @variable ?String $column | default null
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function AI_Column(?String $column = null, ?Callable $closure = null){
				if(Framework\Validator::IsNullOrEmpty($column)){
					return(self::$ai_column);
				}else{
					$database_object = self::Static();
					$column = Framework\Cleaner::Trim($column);
					self::$ai_column = $column;
					Framework\Caller::Make($closure, $database_object);
					return($database_object);
				}
			}

		}

	}

	return(\LaunchPad\Components\Database\Properties\AI_Column::class);

}

?>