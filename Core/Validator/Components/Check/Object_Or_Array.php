<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Validator\Check {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Object_Or_Array')){

		// Check specified data is object or array or not
		trait Object_Or_Array {

			// Check specified data is object or array or not
			// @variable Mixed $target | default null
			// @return Boolean
			public static function Object_Or_Array($target = null) : Bool {
				return((is_array($target) OR is_object($target)) ? true : false);
			}

		}

	}

	return(\LaunchPad\Components\Validator\Check\Object_Or_Array::class);

}

?>