<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Generate {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Random')){

		// Random string generator
		trait Random {

			// Generate random string with your desired length and components
			// @variable Int $length | default 12
			// @variable Boolean $uppercase_words | default true
			// @variable Boolean $numbers | default true
			// @variable Boolean $special_characters | default true
			// @return ?String
			public static function Random(Int $length = 12, Bool $uppercase_words = true, Bool $numbers = true, Bool $special_characters = true) : ?String {
				$characters = 'abcdefghijklmnopqrstuvwxyz';
				$characters = $uppercase_words ? $characters . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' : $characters;
				$characters = $numbers ? $characters . '1234567890' : $characters;
				$characters = $special_characters ? $characters . '!@#$%^&*()_+-=`~/\\\'"[]{}|?><,.' : $characters;
				$random = array();
				for($random_lenght = 0; $random_lenght < $length; $random_lenght++){
					$selected_offset_number = rand(0, (mb_strlen($characters, self::$charset) - 1));
					$selected_offset = $characters[$selected_offset_number];
					$random[] = $selected_offset;
				}
				$random = join('', $random);
				settype($random, 'String');
				return($random);
			}

		}

	}

	return(\LaunchPad\Components\Generate\Random::class);

}

?>