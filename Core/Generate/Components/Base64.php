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
	if(!trait_exists(__NAMESPACE__ . '\\Base64')){

		// Base64 encoder
		trait Base64 {

			// Base64 algorithm encode method
			// @variable ?Mixed $strings | default null
			// @return ?Mixed
			public static function Base64($strings = null){
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Base64($value);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$strings = Framework\Cleaner::Trim($strings);
					$base64 = base64_encode($strings);
					settype($base64, 'String');
					return($base64);
				}
			}

		}

	}

	return(\LaunchPad\Components\Generate\Base64::class);

}

?>