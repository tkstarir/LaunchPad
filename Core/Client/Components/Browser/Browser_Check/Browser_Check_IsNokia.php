<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Browser\Browser_Check {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Browser_Check_IsNokia')){

		// Check if the client browser is "ZZZZZ", parse it details and store they
		trait Browser_Check_IsNokia {

			// Check client browser is "ZZZZZ" or not
			// @no_variable
			// @return Boolean
			public static function Browser_Check_IsNokia() : Bool {
				if($browser = Framework\Validator::ContainRegex(self::$agent, 'Nokia(.*?)\/([\d\.]*)', false, true)){
					if(isset($browser[1]) AND !Framework\Validator::IsNullOrEmpty($browser[1]) AND isset($browser[2]) AND !Framework\Validator::IsNullOrEmpty($browser[2])){
						self::$browser['name'] = 'Nokia ' . $browser[1];
						self::$browser['version'] = $browser[2];
						self::$browser['frames'] = self::$browser_frame_default;
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsNokia::class);

}

?>