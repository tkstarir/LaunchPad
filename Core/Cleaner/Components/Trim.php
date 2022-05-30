<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Cleaner {
	use LaunchPad as asd;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Trim')){

		// Trim your inputs or contents by your specified side
		trait Trim {

			// Trim inputs with rtrim, ltrim and trim functions
			// @variable ?Mixed $strings | default null
			// @variable Boolean $rtrim | default true
			// @variable Boolean $ltrim | default true
			// @variable Boolean $trim | default true
			// @return ?Mixed
			public static function Trim($strings = null, Bool $rtrim = true, Bool $ltrim = true, Bool $trim = true){
				if(is_array($strings) OR is_object($strings) AND !is_callable($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Trim($value, $rtrim, $ltrim, $trim);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					if(is_string($strings) OR is_numeric($strings)){
						$strings = $rtrim ? rtrim($strings) : $strings;
						$strings = $ltrim ? ltrim($strings) : $strings;
						$strings = $trim ? trim($strings) : $strings;
						$strings = str_ireplace(array('  '), array(' '), $strings);
						$strings = strpos($strings, '  ') !== false ? self::Trim($strings) : $strings;
						settype($strings, 'String');
					}
					return($strings);
				}
			}

		}

	}

	return(\LaunchPad\Components\Cleaner\Trim::class);

}

?>