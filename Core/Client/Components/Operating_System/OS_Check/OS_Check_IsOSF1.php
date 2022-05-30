<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Operating_System\OS_Check {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\OS_Check_IsOSF1')){

		// Check if the client operating system is "OSF1", parse it details and store they
		trait OS_Check_IsOSF1 {

			// Check client operating system is "OSF1" or not
			// @no_variable
			// @return Boolean
			public static function OS_Check_IsOSF1() : Bool {
				if(Framework\Validator::Contain(self::$agent, 'OSF1', false, true)){
					self::$operating_system['name'] = 'OSF1';
					if($version = Framework\Validator::ContainRegex(self::$agent, 'OSF1 V([a-zA-Z0-9\.]*)', null, true)){
						(isset($version[1]) AND !Framework\Validator::IsNullOrEmpty($version[1])) ? (self::$operating_system['version'] = $version[1]) : '';
					}
					self::$operating_system['device'] = 'Desktop';
					return true;
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsOSF1::class);

}

?>