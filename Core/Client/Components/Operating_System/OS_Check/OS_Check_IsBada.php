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
	if(!trait_exists(__NAMESPACE__ . '\\OS_Check_IsBada')){

		// Check if the client operating system is "Bada", parse it details and store they
		trait OS_Check_IsBada {

			// Check client operating system is "Bada" or not
			// @no_variable
			// @return Boolean
			public static function OS_Check_IsBada() : Bool {
				if(Framework\Validator::Contain(self::$agent, 'Bada', false, true)){
					self::$operating_system['name'] = 'Net BSD';
					if($version = Framework\Validator::ContainRegex(self::$agent, 'Bada\/([\d\.]*)', null, true)){
						self::$operating_system['version'] = isset($version[1]) ? round($version[1], 2) : self::$browser_version_unknown;
					}else{
						self::$operating_system['version'] = self::$browser_version_unknown;
					}
					self::$operating_system['device'] = 'Phone';
					return true;
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsBada::class);

}

?>