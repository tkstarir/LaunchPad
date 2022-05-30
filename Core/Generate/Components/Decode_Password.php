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
	if(!trait_exists(__NAMESPACE__ . '\\Decode_Password')){

		// Password decoder
		trait Decode_Password {

			// Password decoder for strings encoded with LaunchPad dedicated algorithm
			// @variable ?Mixed $strings | default null
			// @variable Boolean $wrapping | default true
			// @return ?Mixed
			public static function Decode_Password($strings = '', Bool $wrapping = true){
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Decode_Password($value);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$special_characters = Framework\Config::Core('Special_Characters');
					$strings = Framework\Cleaner::Trim($strings);
					$strings = $wrapping ? str_ireplace(array($special_characters['L']), array(''), $strings) : $strings;
					$strings = self::Decode_Base64($strings);
					$strings = hex2bin($strings);
					$strings = gzdecode($strings);
					$strings = hex2bin($strings);
					$strings = gzinflate($strings);
					$strings = hex2bin($strings);
					$strings = gzuncompress($strings);
					$strings = hex2bin($strings);
					$strings = convert_uudecode($strings);
					$strings = $wrapping ? str_ireplace(array($special_characters['L']), array(''), $strings) : $strings;
					$strings = self::Decode_Base64($strings);
					$strings = urldecode($strings);
					$strings = str_rot13($strings);
					$strings = str_ireplace(array('T/', 't=', 'K_', 'k$', 'S-', 's+', 'A>', 'a.', 'R|', 'r~'), array('T', 't', 'K', 'k', 'S', 's', 'A', 'a', 'R', 'r'), $strings);
					$strings = convert_uudecode($strings);
					$strings = hex2bin($strings);
					$strings = preg_replace('/TSL\:[a-zA-Z0-9]{48}/imu', '', $strings);
					settype($strings, 'String');
					return($strings);
				}
			}

		}

	}

	return(\LaunchPad\Components\Generate\Decode_Password::class);

}

?>