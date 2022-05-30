<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Cleaner {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Slash_Remover')){

		// Remove multi slashes from your urls
		trait Slash_Remover {

			// slash remover for urls and inputs that have multiple slashes or back slashes
			// @variable ?Mixed $strings | default null
			// @return ?Mixed
			public static function Slash_Remover($strings = null){
				if(is_array($strings) OR is_object($strings) AND !is_callable($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Slash_Remover($value);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					if(is_string($strings) OR is_numeric($strings)){
						$strings = str_replace(array('//'), array('/'), $strings);
						$strings = str_replace(array('\\\\'), array('\\'), $strings);
						$strings = (strpos($strings, '//') !== false OR strpos($strings, '\\\\') !== false) ? self::Slash_Remover($strings) : $strings;
						settype($strings, 'String');
					}
					return($strings);
				}
			}

		}

	}

	return(\LaunchPad\Components\Cleaner\Slash_Remover::class);

}

?>