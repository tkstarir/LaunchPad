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
	if(!trait_exists(__NAMESPACE__ . '\\Serialize')){

		// Validation of serialize for checking your inputs and contents converted with correct way or not
		trait Serialize {

			// Check your input(s) are serialize strings or not
			// @variable Mixed $strings | default null
			// @return Boolean
			public static function Serialize($strings = null) : Bool {
				if(is_array($strings) OR is_object($strings)){
					$output = true;
					foreach($strings as $key => $value){
						if(!self::Serialize($value)){
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
					return((preg_match('/([adObis]:|N;)/imu', $strings) == 1 AND @unserialize($strings) !== false) ? true : false);
				}
			}

		}

	}

	return(\LaunchPad\Components\Validator\Check\Serialize::class);

}

?>