<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Cleaner {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Obj_Remove_Prefix')){

		// Search in your object keys and remove specified prefix from them names
		trait Obj_Remove_Prefix {

			// Remove any characters (Prefix) from your objects keys
			// @variable Mixed $obj
			// @variable ?String $prefix | default null
			// @variable ?String $replace_to | default null
			// @return ?Mixed
			public static function Obj_Remove_Prefix($obj = array(), ?String $prefix = null, ?String $replace_to = ''){
				if(!Framework\Validator::IsNullOrEmpty($prefix) AND !Framework\Validator::IsNullOrEmpty($replace_to)){
					$prefix = self::Trim($prefix);
					$replace_to = self::Trim($replace_to);
					$current_type = gettype($obj);
					settype($obj, 'Array');
					foreach($obj as $obj_key => $obj_value){
						unset($obj[$obj_key]);
						$obj_key = strpos($obj_key, $prefix) !== false ? preg_replace('/' . $prefix . '/imu', $replace_to, $obj_key, 1) : $obj_key;
						$obj[$obj_key] = (is_array($obj_value) OR is_object($obj_value)) ? self::Obj_Remove_Prefix($obj_value, $prefix) : $obj_value;
					}
					settype($obj, $current_type);
					return($obj);
				}else{
					return($obj);
				}
			}

		}

	}

	return(\LaunchPad\Components\Cleaner\Obj_Remove_Prefix::class);

}

?>