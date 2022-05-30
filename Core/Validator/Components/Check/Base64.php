<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Validator\Check {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Base64')){

		// Base64 validation for checking that your inputs and contents had a valid format of base64 algorithm or not
		trait Base64 {

			// Check your input(s) are base64 or not
			// @variable Mixed $strings | default null
			// @return Boolean
			public static function Base64($strings = null) : Bool {
				if(is_array($strings) OR is_object($strings)){
					$output = true;
					foreach($strings as $key => $value){
						if(!self::Base64($value)){
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
					$strings = Framework\Cleaner::Trim($strings);
					$output = base64_encode(base64_decode($strings, true)) === $strings ? true : false;
					settype($output, 'Boolean');
					return($output);
				}
			}

		}

	}

	return(\LaunchPad\Components\Validator\Check\Base64::class);

}

?>