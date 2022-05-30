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
	if(!trait_exists(__NAMESPACE__ . '\\Exists')){

		// Exists methods based on PDO
		trait Exists {

			// Check any data exists in your query result or not
			// @variable Boolean $exists | default true
			// @variable ?Callable $closure | default null
			// @return Int
			public static function Exists(Bool $exists = true, ?Callable $closure = null) : Int {
				self::Prepare('COUNT(*)');
				$count = self::Num();
				if($exists){
					if($count >= 1){
						$exists = true;
					}else{
						$exists = false;
					}
				}else{
					if($count >= 1){
						$exists = false;
					}else{
						$exists = true;
					}
				}
				Framework\Caller::Make($closure, $exists);
				return($exists);
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Exists::class);

}

?>