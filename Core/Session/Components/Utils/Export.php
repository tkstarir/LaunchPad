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
	if(!trait_exists(__NAMESPACE__ . '\\Export')){

		// Get encoded output from sessions based on your specified format
		trait Export {

			// Export sessions by your format and return them
			// @variable ?Mixed $type | default null
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Export($type = null, ?Callable $closure = null){
				if(self::$active){
					$export_type = (!is_string($type) OR Framework\Validator::IsNullOrEmpty($type) OR !in_array($type, array('default', 'serialize', 'json', 'object'))) ? 'default' : $type;
					switch($export_type){
						case('default'): $output = session_encode(); break;
						case('serialize'): $output = serialize(self::$sessions); break;
						case('json'): $output = json_encode(self::$sessions, 256 | 128 | 64); break;
						case('object'): $output = Framework\Cleaner::ToObject(self::$sessions); break;
						default: $output = serialize(self::$sessions); break;
					}
					Framework\Caller::Make($type, $output);
					Framework\Caller::Make($closure, $output);
					return($output);
				}else{
					return false;
					// Error session not active
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Utils\Export::class);

}

?>