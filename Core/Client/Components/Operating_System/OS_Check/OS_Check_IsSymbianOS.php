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
	if(!trait_exists(__NAMESPACE__ . '\\OS_Check_IsSymbianOS')){

		// Check if the client operating system is "Symbian OS", parse it details and store they
		trait OS_Check_IsSymbianOS {

			// Check client operating system is "Symbian OS" or not
			// @no_variable
			// @return Boolean
			public static function OS_Check_IsSymbianOS() : Bool {
				if(Framework\Validator::Contain(self::$agent, 'SymbOS', false, false) OR Framework\Validator::Contain(self::$agent, 'SymbianOS', false, false) OR Framework\Validator::Contain(self::$agent, 'Symbian OS', false, false)){
					self::$operating_system['name'] = 'Symbian OS';
					if(Framework\Validator::Contain(self::$agent, 'x64', false, true) OR Framework\Validator::Contain(self::$agent, 'x86_64', false, true) OR Framework\Validator::Contain(self::$agent, 'WOW64', false, true)){
						self::$operating_system['architecture'] = 'x64';
					}elseif(Framework\Validator::Contain(self::$agent, 'x86', false, true) OR Framework\Validator::Contain(self::$agent, 'x32', false, true) OR Framework\Validator::Contain(self::$agent, 'WOW32', false, true)){
						self::$operating_system['architecture'] = 'x32';
					}
					self::$operating_system['device'] = 'Desktop';
					return true;
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsSymbianOS::class);

}

?>