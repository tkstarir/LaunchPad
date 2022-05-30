<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Cleaner {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Number')){

		// Extract numbers from your inputs and contents
		trait Number {

			// Numberic safe method to extract only numbers from your input
			// @variable ?Mixed $numbers | default null
			// @return ?Mixed
			public static function Number($numbers = '0'){
				if(is_array($numbers) OR is_object($numbers) AND !is_callable($numbers)){
					$current_type = gettype($numbers);
					settype($numbers, 'Array');
					foreach($numbers as $key => $value){
						$numbers[$key] = self::Number($value);
					}
					settype($numbers, $current_type);
					return($numbers);
				}else{
					if(is_string($numbers) OR is_numeric($numbers)){
						$numbers = self::Trim($numbers);
						$numbers = preg_replace('/\D/imu', '', $numbers);
						settype($numbers, 'Int');
					}
					return($numbers);
				}
			}

		}

	}

	return(\LaunchPad\Components\Cleaner\Number::class);

}

?>