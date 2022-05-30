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
	if(!trait_exists(__NAMESPACE__ . '\\OS_Check_IsIOS')){

		// Check if the client operating system is "iOS", parse it details and store they
		trait OS_Check_IsIOS {

			// Check client operating system is "iOS" or not
			// @no_variable
			// @return Boolean
			public static function OS_Check_IsIOS() : Bool {
				if(Framework\Validator::Contain(self::$agent, 'CPU OS', false, true) OR (Framework\Validator::Contain(self::$agent, 'iPhone OS', false, true) AND Framework\Validator::Contain(self::$agent, 'OS X', false, false))){
					self::$operating_system['name'] = 'iOS';
					if($version = Framework\Validator::ContainRegex(self::$agent, 'CPU( iPhone)? OS ([\d_]*)', null, true)){
						if(isset($version[2]) AND !Framework\Validator::IsNullOrEmpty($version[2])){
							(isset($version[2]) AND !Framework\Validator::IsNullOrEmpty($version[2])) ? (self::$operating_system['version'] = str_replace(array('_', '-'), array('.', '.'), $version[2])) : '';
						}
					}
					self::$operating_system['device'] = 'Phone';
					return true;
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsIOS::class);

}

?>