<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Validator\Check {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Contain')){

		// Check your haystack contain your needle or not
		trait Contain {

			// Check your needed content exists in main content or not
			// * Note: if you want to return the position of your need content, set $position to true
			// @variable ?String $haystack | default null
			// @variable ?Mixed $needle | default null
			// @variable Boolean $position | default false
			// @variable Boolean $case_insensitive | default true
			// @return ?Mixed
			public static function Contain(?String $haystack = null, $needle = null, Bool $position = false, Bool $case_insensitive = true){
				if(!Framework\Validator::IsNullOrEmpty($haystack) AND !Framework\Validator::IsNullOrEmpty($needle)){
					$string_position_function = $case_insensitive ? 'mb_stripos' : 'mb_strpos';
					$needle_position = $string_position_function($haystack, $needle, 0, self::$charset);
					return($needle_position === false ? false : ($position ? $needle_position : true));
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Validator\Check\Contain::class);

}

?>