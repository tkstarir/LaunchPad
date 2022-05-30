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
	if(!trait_exists(__NAMESPACE__ . '\\Hasher')){

		// Hasher encoder
		trait Hasher {

			// Hasher method for known hash algorithms of PHP
			// @variable ?Mixed $strings | default null
			// @variable ?String $hash_algoritm | default null
			// @variable Boolean $raw_output | default false
			// @return ?Mixed
			public static function Hasher($strings = null, ?String $hash_algoritm = null, Bool $raw_output = false){
				$hash_algoritm = Framework\Validator::IsNullOrEmpty($hash_algoritm) ? 'md5' : $hash_algoritm;
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Hasher($value, $hash_algoritm, $raw_output);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$strings = Framework\Cleaner::Trim($strings);
					$hash_algoritms_array = hash_algos();
					$raw_output = is_null($raw_output) ? false : $raw_output;
					if(!in_array($hash_algoritm, $hash_algoritms_array)){
						return false;
					}else{
						$hash = hash($hash_algoritm, $strings, $raw_output);
						settype($hash, 'String');
						return($hash);
					}
				}
			}

		}

	}

	return(\LaunchPad\Components\Generate\Hasher::class);

}

?>