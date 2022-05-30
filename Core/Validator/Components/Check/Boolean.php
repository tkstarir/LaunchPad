<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Validator\Check {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Boolean')){

		// Validation of inputs and contents to see that them had boolean type or not
		trait Boolean {

			// Check your input(s) are boolean or not
			// @variable Mixed $booleans | default true
			// @variable Boolean $foreach_process | default true
			// @return Boolean
			public static function Boolean($booleans = true, Bool $foreach_process = true) : Bool {
				if((is_array($booleans) OR is_object($booleans)) AND $foreach_process){
					$output = true;
					foreach($booleans as $key => $value){
						if(!self::Boolean($value, false)){
							$output = false;
							break;
						}else{
							$output = true;
							continue;
						}
					}
					settype($output, 'Boolean');
					return($output);
				}else{
					$booleans = gettype($booleans);
					if($booleans == 'boolean'){
						return true;
					}else{
						return false;
					}
				}
			}

		}

	}

	return(\LaunchPad\Components\Validator\Check\Boolean::class);

}

?>