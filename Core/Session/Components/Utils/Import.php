<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Session\Utils {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Import')){

		// Get encoded output from sessions based on your specified format
		trait Import {

			// Import your saved sessions data with any format that you saved
			// @variable ?Mixed $data | default null
			// @variable ?Callable $closure | default null
			// @return Boolean
			public static function Import($data = null, ?Callable $closure = null) : Bool {
				if(self::$active){
					if(empty($data) OR Framework\Validator::IsNullOrEmpty($data)){
						return false;
					}else{
						$data_type = gettype($data);
						switch($data_type){
							case('array'): case('object'): $data = serialize($data); break;
							case('string'):
								if(Framework\Validator::JSON($data)){
									$data = json_decode($data, true);
									$data = Framework\Cleaner::ToArray($data);
									$data = serialize($data);
								}elseif(Framework\Validator::Serialize($data)){
									$data = unserialize($data);
									$data = Framework\Cleaner::ToArray($data);
									$data = serialize($data);
								}
								break;
							default: return false; break;
						}
						$result = @session_decode($data);
					}
					Framework\Caller::Make($closure, $result);
					return($result);
				}else{
					return false;
					// Error session not active
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Utils\Import::class);

}

?>