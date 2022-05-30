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
	if(!trait_exists(__NAMESPACE__ . '\\Browser_Check_IsOpera')){

		// Check if the client browser is "Opera", parse it details and store they
		trait Browser_Check_IsOpera {

			// Check client browser is "Opera" or not
			// @no_variable
			// @return Boolean
			public static function Browser_Check_IsOpera() : Bool {
				if(Framework\Validator::Contain(self::$agent, 'Opera Mini', false, true)){
					self::$browser['name'] = 'Opera Mini';
					if($version = Framework\Validator::ContainRegex(self::$agent, 'Opera Mini\/([\d\.]*)', null, true)){
						self::$browser['version'] = isset($version[1]) ? round($version[1], 2) : self::$browser_version_unknown;
					}else{
						self::$browser['version'] = self::$browser_version_unknown;
					}
					self::$browser['frames'] = self::$browser_frame_default;
					return true;
				}elseif(Framework\Validator::Contain(self::$agent, 'OPiOS', false, true)){
					self::$browser['name'] = 'Opera Mini iOS';
					if($version = Framework\Validator::ContainRegex(self::$agent, 'OPiOS\/([\d\.]*)', null, true)){
						self::$browser['version'] = isset($version[1]) ? round($version[1], 2) : self::$browser_version_unknown;
					}else{
						self::$browser['version'] = self::$browser_version_unknown;
					}
					self::$browser['frames'] = self::$browser_frame_default;
					return true;
				}elseif(Framework\Validator::Contain(self::$agent, 'Opera/', false, true)){
					self::$browser['name'] = 'Opera';
					if($version = Framework\Validator::ContainRegex(self::$agent, 'Version\/([\d\.]*)', null, true)){
						self::$browser['version'] = isset($version[1]) ? round($version[1], 2) : self::$browser_version_unknown;
					}else{
						self::$browser['version'] = self::$browser_version_unknown;
					}
					self::$browser['frames'] = self::$browser_frame_default;
					return true;
				}elseif(Framework\Validator::Contain(self::$agent, 'OPR', false, true)){
					self::$browser['name'] = 'Opera';
					if($version = Framework\Validator::ContainRegex(self::$agent, 'OPR\/([\d\.]*)', null, true)){
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

	return(\LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsOpera::class);

}

?>