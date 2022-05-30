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
	if(!trait_exists(__NAMESPACE__ . '\\IsNullOrEmpty')){

		// Validation of inputs and contents to see that them are empty or not
		trait IsNullOrEmpty {

			// Check your input(s) are null or empty or have any value
			// @variable Mixed $strins | default null
			// @return Boolean
			public static function IsNullOrEmpty($strings = null) : Bool {
				if(is_array($strings) OR is_object($strings)){
					$output = true;
					foreach($strings as $key => $value){
						if(self::IsNullOrEmpty($value)){
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
					if(is_null($strings) OR empty($strings) OR (!is_string($strings) AND !is_numeric($strings) AND !is_double($strings) AND !is_float($strings) AND !is_array($strings) AND !is_object($strings))){
						return true;
					}else{
						return false;
					}
				}
			}

		}

	}

	return(\LaunchPad\Components\Validator\Check\IsNullOrEmpty::class);

}

?>