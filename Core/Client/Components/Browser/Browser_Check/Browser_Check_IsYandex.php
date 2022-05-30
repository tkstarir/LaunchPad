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
	if(!trait_exists(__NAMESPACE__ . '\\Browser_Check_IsYandex')){

		// Check if the client browser is "Yandex", parse it details and store they
		trait Browser_Check_IsYandex {

			// Check client browser is "Yandex" or not
			// @no_variable
			// @return Boolean
			public static function Browser_Check_IsYandex() : Bool {
				if(Framework\Validator::Contain(self::$agent, 'Yandex', false, true) OR Framework\Validator::Contain(self::$agent, 'YaBrowser', false, true)){
					self::$browser['name'] = 'Yandex';
					if($version = Framework\Validator::ContainRegex(self::$agent, 'Yandex\/([\d\.]*)', null, true) OR $version = Framework\Validator::ContainRegex(self::$agent, 'YaBrowser\/([\d\.]*)', null, true)){
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

	return(\LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsYandex::class);

}

?>