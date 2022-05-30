<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Session\CRUD {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Update')){

		// CRUD "Update" section for updating existing indexes in sessions
		trait Update {

			// Set a specify value to an exitsting custom key
			// @variable Mixed $multiple_variables
			// @return Boolean
			public static function Update(...$multiple_variables) : Bool {
				$multiple_variables_count = count($multiple_variables);
				if($multiple_variables_count == 2 AND isset($multiple_variables[0]) AND isset($multiple_variables[1]) AND is_string($multiple_variables[0]) AND is_string($multiple_variables[1])){
					$key = $multiple_variables[0];
					$value = $multiple_variables[1];
					return(self::Get($key) != false ? self::Set($key, $value, true) : false);
				}else{
					$result = null;
					$multiple_variables = Framework\Cleaner::Trim($multiple_variables);
					foreach($multiple_variables as $session_key => $session_value){
						$has_array = false;
						foreach($session_value as $key => $value){
							$callable_result = false;
							if(is_array($value)){
								$callable_result = self::Create($value);
								$has_array = true;
							}
							Framework\Caller::Make($value, $callable_result);
						}
						if(!is_callable($session_value) AND $has_array == false){
							$session_value_count = count($session_value);
							if(Framework\Validator::Between($session_value_count, 2, 3, true)){
								if(array_key_exists('key', $session_value) AND array_key_exists('value', $session_value)){
									$key = Framework\Cleaner::Trim($session_value['key']);
									$value = Framework\Cleaner::Trim($session_value['value']);
								}elseif(isset($session_value[0]) AND isset($session_value[1])){
									$key = Framework\Cleaner::Trim($session_value[0]);
									$value = Framework\Cleaner::Trim($session_value[1]);
								}else{
									$result = false;
									continue;
								}
								$update_result = self::Get($key) ? self::Set($key, $value, true) : false;
								(is_null($result) OR $result == true) ? $result = $update_result : '';
								continue;
							}else{
								$result = false;
								continue;
							}
						}
					}
					foreach($multiple_variables as $callable){
						Framework\Caller::Make($callable, $result);
					}
					return(is_null($result) ? false : $result);
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\CRUD\Update::class);

}

?>