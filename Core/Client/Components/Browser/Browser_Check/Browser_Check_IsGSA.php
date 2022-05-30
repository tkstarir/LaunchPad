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
	if(!trait_exists(__NAMESPACE__ . '\\Browser_Check_IsGSA')){

		// Check if the client browser is "Google Search Appliance (GSA)", parse it details and store they
		trait Browser_Check_IsGSA {

			// Check client browser is "Google Search Appliance (GSA)" or not
			// @no_variable
			// @return Boolean
			public static function Browser_Check_IsGSA() : Bool {
				if(Framework\Validator::Contain(self::$agent, 'GSA', false, true)){
					self::$browser['name'] = 'Google Search Appliance (GSA)';
					if($version = Framework\Validator::ContainRegex(self::$agent, 'GSA\/([\d\.]*)', null, true)){
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

	return(\LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsGSA::class);

}

?>