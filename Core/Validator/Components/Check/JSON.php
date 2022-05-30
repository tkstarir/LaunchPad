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
	if(!trait_exists(__NAMESPACE__ . '\\JSON')){

		// Validation of json for your inputs and contents
		trait JSON {

			// Check your input(s) are JSON or not
			// @variable Mixed $strings | default null
			// @return Boolean
			public static function JSON($strings = null) : Bool {
				if(is_array($strings) OR is_object($strings)){
					$output = true;
					foreach($strings as $key => $value){
						if(!self::JSON($value)){
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
					json_decode($strings, false);
					$result = json_last_error();
					if($result == JSON_ERROR_NONE){
						return true;
					}else{
						switch($result){
							case(JSON_ERROR_DEPTH): /* // Error maximum stack depth */ return false; break;
							case(JSON_ERROR_STATE_MISMATCH): /* // Error invalid or malformed JSON */ return false; break;
							case(JSON_ERROR_CTRL_CHAR): /* // Error Control character error */ return false; break;
							case(JSON_ERROR_SYNTAX): /* // Error Syntax rrror */ return false; break;
							case(JSON_ERROR_UTF8): /* // Error malformed UTF-8 characters */ return false; break;
							case(JSON_ERROR_UTF16): /* // Error malformed UTF-16 characters */ return false; break;
							case(JSON_ERROR_RECURSION): /* // Error recursive references in json block */ return false; break;
							case(JSON_ERROR_INF_OR_NAN): /* // Error "NAN" or "INF" values in json block */ return false; break;
							case(JSON_ERROR_UNSUPPORTED_TYPE): /* // Error unsupported type given */ return false; break;
							case(JSON_ERROR_INVALID_PROPERTY_NAME): /* // Error invalid property name in json block */ return false; break;
							default: /* // Error Unknown in json decode */ return false; break;
						}
					}
				}
			}

		}

	}

	return(\LaunchPad\Components\Validator\Check\JSON::class);

}

?>