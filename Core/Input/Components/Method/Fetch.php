<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Input\Method {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Fetch')){

		// Parse data from methods
		trait Fetch {

			// Fetch specified parameter(s) from Delete, Get, Post, Put, Request and Delete methods or getting default value if not exists
			// * Note: leave all parameters empty or enter at least one parameter to get all parameters 
			// @variable ?String $method | default null
			// @variable ?Mixed $index | default null
			// @variable ?Mixed $default_value | default null
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Fetch(?String $method = null, $index = null, $default_value = null, ?Callable $closure = null){
				$output = null;
				$method = Framework\Cleaner::Lower_Case($method);
				switch($method){
					case('get'): case('gets'): $method_parameters = self::$gets; break;
					case('post'): case('posts'): $method_parameters = self::$posts; break;
					case('put'): case('puts'): $method_parameters = self::$puts; break;
					case('request'): case('requests'): $method_parameters = self::$requests; break;
					case('delete'): case('deletes'): $method_parameters = self::$deletes; break;
					default: return false; break;
				}
				$method_parameters = Framework\Cleaner::Trim($method_parameters);
				if(is_callable($index) OR (is_callable($index) AND is_callable($default_value)) OR (is_callable($index) AND is_callable($default_value) AND is_callable($closure))){
					$output = $method_parameters;
				}else{
					if(is_string($index) AND !Framework\Validator::IsNullOrEmpty($index)){
						if((isset($method_parameters[$index]) AND !Framework\Validator::IsNullOrEmpty($method_parameters[$index]))){
							$output = $method_parameters[$index];
						}else{
							if(is_string($default_value) AND !Framework\Validator::IsNullOrEmpty($default_value)){
								$output = $default_value;
							}else{
								$output = false;
							}
						}
					}elseif(Framework\Validator::Object_Or_Array($index)){
						$output = array();
						foreach($index as $index_key => $index_value){
							if(!is_numeric($index_key)){
								if(isset($method_parameters[$index_key])){
									$output[$index_key] = $method_parameters[$index_key];
								}else{
									if(!Framework\Validator::IsNullOrEmpty($index_value)){
										$output[$index_key] = $index_value;
									}else{
										continue;
									}
								}
							}else{
								if(isset($method_parameters[$index_value])){
									$output[$index_value] = $method_parameters[$index_value];
								}else{
									if(is_string($default_value)){
										$output[$index_value] = $default_value;
									}else{
										$current_default_value_type = gettype($default_value);
										$default_value_is_array = is_array($default_value) ? true : false;
										!$default_value_is_array ? settype($default_value, 'Array') : '';
										if($default_value_is_array AND isset($default_value[$index_key])){
											$output[$index_value] = $default_value[$index_key];
										}
										$default_value_is_array ? settype($default_value, $current_default_value_type) : '';
									}
								}
							}
						}
					}else{
						$output = false;
					}
				}
				Framework\Caller::Make($index, $output);
				Framework\Caller::Make($default_value, $output);
				Framework\Caller::Make($closure, $output);
				return($output);
			}

		}

	}

	return(\LaunchPad\Components\Input\Method\Fetch::class);

}

?>