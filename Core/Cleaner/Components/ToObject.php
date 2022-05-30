<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Cleaner {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\ToObject')){

		// Converting everything to object format
		trait ToObject {

			// Convert your target to object (stdClass) from any type
			// @variable Mixed $target;
			// @return Object
			public static function ToObject($target = array()) : Object {
				if(is_object($target)){
					settype($target, 'Object');
					return($target);
				}else{
					$target = json_encode($target, JSON_UNESCAPED_UNICODE);
					$target = json_decode($target, false);
					settype($target, 'Object');
					return($target);
				}
			}

		}

	}

	return(\LaunchPad\Components\Cleaner\ToObject::class);

}

?>