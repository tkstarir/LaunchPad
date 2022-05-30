<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Generate {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Decode_Base64')){

		// Base64 decoder
		trait Decode_Base64 {

			// Base64 algorithm decode method
			// @variable ?Mixed $strings | default null
			// @return ?Mixed
			public static function Decode_Base64($strings = null){
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Decode_Base64($value);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$strings = Framework\Cleaner::Trim($strings);
					$base64 = base64_decode($strings);
					settype($base64, 'String');
					return($base64);
				}
			}

		}

	}

	return(\LaunchPad\Components\Generate\Decode_Base64::class);

}

?>