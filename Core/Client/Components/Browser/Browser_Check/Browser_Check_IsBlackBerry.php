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
	if(!trait_exists(__NAMESPACE__ . '\\Browser_Check_IsBlackBerry')){

		// Check if the client browser is "BlackBerry", parse it details and store they
		trait Browser_Check_IsBlackBerry {

			// Check client browser is "BlackBerry" or not
			// @no_variable
			// @return Boolean
			public static function Browser_Check_IsBlackBerry() : Bool {
				if(Framework\Validator::Contain(self::$agent, 'BlackBerry', false, true)){
					self::$browser['name'] = 'BlackBerry';
					if($version = Framework\Validator::ContainRegex(self::$agent, 'Version\/([\d\.]*)', null, true)){
						self::$browser['version'] = isset($version[1]) ? round($version[1], 2) : self::$browser_version_unknown;
					}else{
						self::$browser['version'] = self::$browser_version_unknown;
					}
					self::$browser['frames'] = self::$browser_frame_default;
					return true;
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsBlackBerry::class);

}

?>