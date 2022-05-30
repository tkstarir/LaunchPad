<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Header {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Add')){

		// Add header to response
		trait Add {

			// Add custom header in request response
			// @variable ?String $header_name | default null
			// @variable ?String $header_value | default null
			// @return Boolean
			public static function Add(?String $header_name = null, ?String $header_value = null) : Bool {
				$header_name = Framework\Cleaner::Trim($header_name);
				$header_value = Framework\Cleaner::Trim($header_value);
				if(!Framework\Validator::IsNullOrEmpty($header_name) AND !Framework\Validator::IsNullOrEmpty($header_value)){
					header($header_name . ': ' . $header_value);
					return true;
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Header\Add::class);

}

?>