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
	if(!trait_exists(__NAMESPACE__ . '\\ContainRegex')){

		// Check your haystack contain your regular expression needle or not
		trait ContainRegex {

			// Check your needed content exists in main content with regular expression (regex) or not
			// *Note: if you want to return the matches, set $matches to true
			// @variable ?String $haystack | default null
			// @variable ?String $regex | default null
			// @variable ?String $delimiters | default 'imu'
			// @variable Boolean $return_matches | default false
			// @return ?Mixed
			public static function ContainRegex(?String $haystack = null, ?String $regex = null, ?String $delimiters = 'imu', Bool $return_matches = false){
				if(!Framework\Validator::IsNullOrEmpty($haystack) AND !Framework\Validator::IsNullOrEmpty($regex)){
					$delimiters = (Framework\Validator::IsNullOrEmpty($delimiters) OR is_null($delimiters)) ? 'imu' : $delimiters;
					if(preg_match('/\/(.*?)\/+([a-zA-Z]+)?/imu', $regex, $regex_matches)){
						if(isset($regex_matches[1]) AND !Framework\Validator::IsNullOrEmpty($regex_matches[1])){
							$regex_final = '/' . $regex_matches[1] . '/';
							$regex_final = (isset($regex_matches[2]) AND !empty($regex_matches[2])) ? ($regex_final . $regex_matches[2]) : $regex_final;
						}else{
							return false;
						}
					}else{
						$regex_final = '/' . $regex . '/' . $delimiters;
					}
					return(preg_match($regex_final, $haystack, $matches) ? ($return_matches ? $matches : true) : false);
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Validator\Check\ContainRegex::class);

}

?>