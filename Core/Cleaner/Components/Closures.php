<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Cleaner {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Closures')){

		// Detach callable closures, anonymous functions and anonymous classes from your input
		trait Closures {

			// Extract all callable closures, anonymous functions and anonymous classes from a multidimensional array and receive those as array
			// @variable Mixed $target;
			// @return Array
			public static function Closures($target = array()) : Array {
				$closures = array();
				$callback = function($callback_target, Array $closures, Callable $callback) : Array {
					if(count($callback_target) >= 1){
						foreach($callback_target as $callback_key => $callback_value){
							if(is_callable($callback_value)){
								$closures[] = $callback_value;
							}elseif(is_array($callback_value) OR is_object($callback_value)){
								$closures = $callback($callback_value, $closures, $callback);
							}else{
								continue;
							}
						}
					}
					return($closures);
				};
				if(count($target) >= 1){
					foreach($target as $key => $value){
						(is_callable($value) OR is_array($value) OR is_object($value)) ? $closures = $callback($value, $closures, $callback) : '';
					}
				}
				return($closures);
			}

		}

	}

	return(\LaunchPad\Components\Cleaner\Closures::class);

}

?>