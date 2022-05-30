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
	if(!trait_exists(__NAMESPACE__ . '\\Url')){

		// Url encoder
		trait Url {

			// Url generator with LaunchPad dedicated algorithm
			// @variable ?Mixed $strings | default null
			// @return ?Mixed
			public static function Url($strings = null){
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Url($value);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$special_characters = Framework\Config::Core('Special_Characters');
					$strings = Framework\Cleaner::Trim($strings);
					$strings = self::Base64($strings, 'encode');
					$strings = str_replace(array('T', 't', 'K', 'k', 'S', 's', 'A', 'a', 'R', 'r'), array('T/', 't=', 'K_', 'k$', 'S-', 's+', 'A>', 'a.', 'R|', 'r~'), $strings);
					$strings = wordwrap($strings, 48, $special_characters['L'], true);
					$strings = convert_uuencode($strings);
					$strings = bin2hex($strings);
					$strings = gzcompress($strings);
					$strings = bin2hex($strings);
					$strings = gzdeflate($strings);
					$strings = bin2hex($strings);
					$strings = gzencode($strings);
					$strings = bin2hex($strings);
					settype($strings, 'String');
					return($strings);
				}
			}

		}

	}

	return(\LaunchPad\Components\Generate\Url::class);

}

?>