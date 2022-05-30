<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Each')){

		// Each methods based on PDO
		trait Each {

			// Execute a callable closure after fragmenting data each by each of they indexes
			// @variable Int $count | default 500
			// @variable ?Callable $closure | default null
			// @return Boolean
			public static function Each(Int $count = 500, ?Callable $closure = null) : Bool {
				return(self::Fragment($count, function($results) use ($closure){
					foreach($results as $key => $value){
						if($closure($key, $value) === false){
							return false;
						}
					}
				}));
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Each::class);

}

?>