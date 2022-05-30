<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Session\Properties {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Cookie_Params')){

		// Get cookie parameters of sessions
		trait Cookie_Params {

			// Get all or one index of cookie params
			// @variable ?Mixed $index | default null
			// @variable ?Mixed $value | default null
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Cookie_Params($index = null, $value = null, ?Callable $closure = null){
				self::$cookie_params = self::$cookie_params == null ? session_get_cookie_params() : self::$cookie_params;
				$collection_object = new Framework\Collection;
				$collection_object->data = self::$cookie_params;
				$collection_object->No_Database();
				if(is_callable($index)){
					Framework\Caller::Make($index, $collection_object);
					Framework\Caller::Make($value, $collection_object);
					Framework\Caller::Make($closure, $collection_object);
					return($collection_object);
				}elseif(!Framework\Validator::IsNullOrEmpty($index) AND is_callable($value)){
					$param = $collection_object->$index;
					Framework\Caller::Make($value, $param);
					Framework\Caller::Make($closure, $param);
					return($param);
				}elseif(is_string($index) AND !Framework\Validator::IsNullOrEmpty($index) AND is_string($value) AND !Framework\Validator::IsNullOrEmpty($value)){
					if(!self::$active){
						if(isset(self::$cookie_params[$index])){
							self::$cookie_params[$index] = $value;
							session_set_cookie_params(self::$cookie_params['lifetime'], self::$cookie_params['path'], self::$cookie_params['domain'], self::$cookie_params['secure'], self::$cookie_params['httponly']);
							Framework\Caller::Make($closure, true);
							return true;
						}else{
							Framework\Caller::Make($closure, true);
							return false;
						}
					}else{
						// Error session is active and can't change
						Framework\Caller::Make($closure, false);
					}
				}elseif(is_array($index) OR is_array($index) OR is_object($value) OR is_object($value)){
					if(array_key_exists('lifetime', $index) OR array_key_exists('path', $index) OR array_key_exists('domains', $index) OR array_key_exists('secure', $index) OR array_key_exists('httponly', $index)){
						$result = false;
						foreach($index as $parameter_key => $parameter_value){
							if(isset(self::$cookie_params[$parameter_key])){
								self::$cookie_params[$parameter_key] = $parameter_value;
								$result = true;
								continue;
							}else{
								$result = false;
								break;
							}
						}
						session_set_cookie_params(self::$cookie_params['lifetime'], self::$cookie_params['path'], self::$cookie_params['domain'], self::$cookie_params['secure'], self::$cookie_params['httponly']);
						Framework\Caller::Make($value, $result);
						Framework\Caller::Make($closure, $result);
						return($result);
					}elseif(count($index) == count($value)){
						$result = false;
						foreach($index as $parameter_key => $parameter_value){
							// if(!in_array($parameter_key))
							if(!in_array($parameter_value, array('lifetime', 'path', 'domains', 'secure', 'httponly'))){
								$result = false;
								break;
							}else{
								self::$cookie_params[$parameter_value] = $value[$parameter_key];
								$result = true;
								continue;
							}
						}
						session_set_cookie_params(self::$cookie_params['lifetime'], self::$cookie_params['path'], self::$cookie_params['domain'], self::$cookie_params['secure'], self::$cookie_params['httponly']);
						Framework\Caller::Make($closure, $result);
						return($result);
					}else{
						Framework\Caller::Make($value, false);
						Framework\Caller::Make($value, false);
						return false;
					}
				}else{
					return($collection_object);
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Properties\Cookie_Params::class);

}

?>