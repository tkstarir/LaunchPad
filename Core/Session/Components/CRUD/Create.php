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
	if(!trait_exists(__NAMESPACE__ . '\\Create')){

		// CRUD "Create" section for creating new indexes in sessions
		trait Create {

			// Set a specify value to a custom session key
			// @variable Mixed $multiple_variables
			// @return Boolean
			public static function Create(...$multiple_variables) : Bool {
				$multiple_variables_count = count($multiple_variables);
				if(Framework\Validator::Between($multiple_variables_count, 2, 3, true) AND isset($multiple_variables[0]) AND isset($multiple_variables[1]) AND is_string($multiple_variables[0]) AND is_string($multiple_variables[1])){
					$key = $multiple_variables[0];
					$value = $multiple_variables[1];
					if(isset($multiple_variables[2])){
						if(is_bool($multiple_variables[2])){
							$rewrite = $multiple_variables[2];
						}elseif(is_string($multiple_variables[2]) AND in_array($multiple_variables[2], array('true', 'false'))){
							$rewrite = $multiple_variables[2] == 'true' ? true : false;
						}else{
							$rewrite = true;
						}
					}else{
						$rewrite = true;
					}
					$result = self::Set($key, $value, $rewrite);
					foreach($multiple_variables as $callable){
						Framework\Caller::Make($callable, $result);
					}
					return($result);
				}else{
					$result = null;
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
									if(array_key_exists('rewrite', $session_value)){
										if(is_bool($session_value['rewrite'])){
											$rewrite = $session_value['rewrite'];
										}elseif(is_string($session_value['rewrite']) AND in_array($session_value['rewrite'], array('true', 'false'))){
											$rewrite = $session_value['rewrite'] == 'true' ? true : false;
										}else{
											$rewrite = true;
										}
									}else{
										$rewrite = true;
									}
								}elseif(isset($session_value[0]) AND isset($session_value[1])){
									$key = Framework\Cleaner::Trim($session_value[0]);
									$value = Framework\Cleaner::Trim($session_value[1]);
									if(isset($session_value[2])){
										if(is_bool($session_value[2])){
											$rewrite = $session_value[2];
										}elseif(is_string($session_value[2]) AND in_array($session_value[2], array('true', 'false'))){
											$rewrite = $session_value[2] == 'true' ? true : false;
										}else{
											$rewrite = true;
										}
									}else{
										$rewrite = true;
									}
								}else{
									$result = false;
									continue;
								}
								$create_result = self::Set($key, $value, $rewrite);
								(is_null($result) OR $result == true) ? $result = $create_result : '';
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

	return(\LaunchPad\Components\Session\CRUD\Create::class);

}

?>