<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Cleaner {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\XSS')){

		// XSS clean your inputs or contents to make ready them to use in your queries
		trait XSS {

			// XSS method for clean inputs with string type. This method can be use for clean XSS
			// @variable ?Mixed $strings | default null
			// @variable Boolean $slash_remover | default true
			// @return ?Mixed
			public static function XSS($strings = null, Bool $slash_remover = true){
				if(is_array($strings) OR is_object($strings) AND !is_callable($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::XSS($value, $slash_remover);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					if(is_string($strings) OR is_numeric($strings)){
						$strings = self::Trim($strings);
						$strings = htmlentities($strings, ENT_QUOTES | ENT_IGNORE, self::$charset);
						$strings = $slash_remover ? self::Slash_Remover($strings) : $strings;
						settype($strings, 'String');
					}
					return($strings);
				}
			}

		}

	}

	return(\LaunchPad\Components\Cleaner\XSS::class);

}

?>