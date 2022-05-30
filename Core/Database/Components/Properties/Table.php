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
	if(!trait_exists(__NAMESPACE__ . '\\Table')){

		// Set table that you want queries process on it
		trait Table {

			// Setting table for queries
			// In models you haven't access to this method
			// @variable ?String $table | default null
			// @variable ?Callable $closure | default mull
			// @return ?Mixed
			public static function Table(?String $table = null, ?Callable $closure = null){
				self::Check_Activation();
				if(Framework\Validator::IsNullOrEmpty($table)){
					return(self::$table);
				}else{
					$database_object = self::Static();
					if(self::$is_model == false){
						$table = Framework\Cleaner::Trim($table);
						$table = self::Appellation($table, 'table');
						self::$table = $table;
						Framework\Caller::Make($closure, $database_object);
						return($database_object);
					}else{
						Logger::Warning('You Can\'t Set a Table Name for Following Model: ' . self::$model_name);
						return($database_object);
					}
				}
			}

		}

	}

	return(\LaunchPad\Components\Database\Properties\Table::class);

}

?>