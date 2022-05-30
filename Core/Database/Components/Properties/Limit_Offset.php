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
	if(!trait_exists(__NAMESPACE__ . '\\Limit_Offset')){

		// Queries limit and offset statements
		trait Limit_Offset {

			// Set limitation and offset for query processes
			// @variable Int $limit | default 0
			// @variable Int $offset | default 0
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Limit(Int $limit = 0, Int $offset = 0, ?Callable $closure = null){
				if(Framework\Validator::IsNullOrEmpty($limit)){
					return(self::$limit);
				}else{
					$database_object = self::Static();
					if($limit >= 1){
						self::$limit = Framework\Cleaner::Number($limit);
						$offset >= 1 ? self::$offset = Framework\Cleaner::Number($offset) : '';
					}
					Framework\Caller::Make($closure, $database_object);
					return($database_object);
				}
			}

			// Set offset for query processes
			// @variable Int $offset | default 0
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Offset(Int $offset = 0, ?Callable $closure = null){
				if(Framework\Validator::IsNullOrEmpty($offset)){
					return(self::$offset);
				}else{
					$database_object = self::Static();
					$offset >= 1 ? self::$offset = Framework\Cleaner::Number($offset) : '';
					Framework\Caller::Make($closure, $database_object);
					return($database_object);
				}
			}

		}

	}

	return(\LaunchPad\Components\Database\Properties\Limit_Offset::class);

}

?>