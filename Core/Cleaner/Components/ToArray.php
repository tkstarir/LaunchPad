<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Cleaner {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\ToArray')){

		// Converting everything to array format
		trait ToArray {

			// Convert your target to array from any type
			// @variable Mixed $target;
			// @return Array
			public static function ToArray($target = array()) : Array {
				if(is_array($target)){
					settype($target, 'Array');
					return($target);
				}else{
					$target = json_encode($target, JSON_UNESCAPED_UNICODE);
					$target = json_decode($target, true);
					settype($target, 'Array');
					return($target);
				}
			}

		}

	}

	return(\LaunchPad\Components\Cleaner\ToArray::class);

}

?>