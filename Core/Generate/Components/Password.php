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
	if(!trait_exists(__NAMESPACE__ . '\\Password')){

		// Password encoder
		trait Password {

			// Password generator with LaunchPad dedicated algorithm
			// @variable ?Mixed $strings | default null
			// @variable Boolean $wrapping | default true
			// @return ?Mixed
			public static function Password($strings = null, Bool $wrapping = true){
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Password($value);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$special_characters = Framework\Config::Core('Special_Characters');
					$strings = Framework\Cleaner::Trim($strings);
					$strings = 'TSL:' . self::Random(48, 'true', 'false', 'false') . $strings;
					$strings = bin2hex($strings);
					$strings = convert_uuencode($strings);
					$strings = str_ireplace(array('T', 't', 'K', 'k', 'S', 's', 'A', 'a', 'R', 'r'), array('T/', 't=', 'K_', 'k$', 'S-', 's+', 'A>', 'a.', 'R|', 'r~'), $strings);
					$strings = str_rot13($strings);
					$strings = urlencode($strings);
					$strings = self::Base64($strings, 'encode');
					$strings = $wrapping ? wordwrap($strings, 48, $special_characters['L'], true) : $strings;
					$strings = convert_uuencode($strings);
					$strings = bin2hex($strings);
					$strings = gzcompress($strings);
					$strings = bin2hex($strings);
					$strings = gzdeflate($strings);
					$strings = bin2hex($strings);
					$strings = gzencode($strings);
					$strings = bin2hex($strings);
					$strings = self::Base64($strings, 'encode');
					$strings = $wrapping ? wordwrap($strings, 48, $special_characters['L'], true) : $strings;
					settype($strings, 'String');
					return($strings);
				}
			}

		}

	}

	return(\LaunchPad\Components\Generate\Password::class);

}

?>