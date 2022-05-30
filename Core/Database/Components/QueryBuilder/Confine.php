<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Confine')){

		// Confine methods based on PDO
		trait Confine {

			// Get a single column as result or get a single column with a custom key
			// custom keys only can be a valid column in your result
			// @variable ?String $column | default null
			// @variable ?Mixed $custom_key | default null
			// @variable ?Callable $closure | default null
			// @return Array
			public static function Confine(?String $column = null, $custom_key = null, ?Callable $closure = null) : Array {
				$data = !Framework\Validator::IsNullOrEmpty($custom_key) ? self::fetch(array($column, $custom_key)) : self::Fetch($column);
				$output = array();
				if($column !== $custom_key){
					if(!Framework\Validator::IsNullOrEmpty($column)){
						foreach($data as $key => $value){
							if(!Framework\Validator::IsNullOrEmpty($custom_key)){
								$output[$value->$custom_key] = $value->$column;
							}else{
								$output[] = $value->$column;
							}
						}
					}
				}
				Framework\Caller::Make($custom_key, $output);
				Framework\Caller::Make($closure, $output);
				return($output);
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Confine::class);

}

?>