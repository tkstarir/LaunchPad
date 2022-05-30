<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder\Utils {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Value')){

		// Valie method for getting content of specified column
		trait Value {

			// Get value of a column by it name
			// @variable ?String $column | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Collection
			public static function Value(?String $column = null, ?Callable $closure = null){
				$fetch = self::First();
				if(is_object($fetch)){
					$fetch = $fetch->$column;
					$fetch = Framework\Validator::IsNullOrEmpty($fetch) ? false : $fetch;
				}else{
					$fetch = false;
				}
				($fetch !== false) ? Framework\Caller::Make($closure, $fetch) : '';
				return($fetch);
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Utils\Value::class);

}

?>