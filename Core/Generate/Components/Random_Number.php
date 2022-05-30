<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Generate {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Random_Number')){

		// Random number generator
		trait Random_Number {

			// Generate random number with your desired length
			// @variable Int $length | default 12
			// @variable Int $begin_with | default 0
			// @variable Int $end_with | default 9
			// @return ?String
			public static function Random_Number(Int $length = 12, Int $begin_with = 0, Int $end_with = 9) : ?String {
				$numbers = '1234567890';
				$numbers = preg_replace('/[^' . $begin_with . '-' . $end_with . ']/imu', '', $numbers);
				$number = array();
				for($numbers_length = 0; $numbers_length < $length; $numbers_length++){
					$selected_offset_number = rand(0, (mb_strlen($characters, self::$charset) - 1));
					$selected_offset = $numbers[$selected_offset_number];
					$number[] = $selected_offset;
				}
				$number = join('', $number);
				settype($number, 'String');
				return($number);
			}

		}

	}

	return(\LaunchPad\Components\Generate\Random_Number::class);

}

?>