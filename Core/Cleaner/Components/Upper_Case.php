<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Cleaner {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Upper_Case')){

		// Converting your letters to upper case style with specified charset
		trait Upper_Case {

			// Convert your alphabetical characters into upper case style with this method
			// This method need "mbstring" extension
			// Use "mb_strtoupper" because of UTF-8 characters
			// @variable ?Mixed $strings | default null
			// @return ?Mixed
			public static function Upper_Case($strings = null){
				if(is_array($strings) OR is_object($strings) AND !is_callable($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$string[$key] = self::Upper_Case($value);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					if(is_string($strings) OR is_numeric($strings)){
						$charset = self::$charset;
						$charset = $charset == 'default' ? 'UTF8' : $charset;
						$strings = self::Trim($strings);
						$strings = mb_strtoupper($strings, $charset);
						settype($strings, 'String');
					}
					return($strings);
				}
			}

		}

	}

	return(\LaunchPad\Components\Cleaner\Upper_Case::class);

}

?>