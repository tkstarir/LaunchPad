<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Validator\Check {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Between')){

		// Between validation for checking that a number is between and inclusive of your range
		trait Between {

			// Check your number is in range of your $min and $max or not
			// You can pass 4th parameter true to check your number is inclusive of your $min and $max or not
			// @variable Float $number | default 0
			// @variable Float $minimum | default 0
			// @variable Float $maximum | default 9
			// @variable Boolean $inclusive | default false
			// @return Boolean
			public static function Between(Float $number = 0, Float $minimum = 0, Float $maximum = 9, Bool $inclusive = false) : Bool {
				if(is_float($number) AND is_float($minimum) AND is_float($maximum)){
					if($minimum < $maximum){
						if($inclusive == true){
							$output = $number >= $minimum AND $number <= $maximum;
							return($output);
						}else{
							$output = $number > $minimum AND $number < $maximum;
							return($output);
						}
					}else{
						return false;
					}
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Validator\Check\Between::class);

}

?>