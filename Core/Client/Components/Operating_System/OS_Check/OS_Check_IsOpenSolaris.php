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
	if(!trait_exists(__NAMESPACE__ . '\\OS_Check_IsOpenSolaris')){

		// Check if the client operating system is "Open Solaris", parse it details and store they
		trait OS_Check_IsOpenSolaris {

			// Check client operating system is "Open Solaris" or not
			// @no_variable
			// @return Boolean
			public static function OS_Check_IsOpenSolaris() : Bool {
				if(Framework\Validator::Contain(self::$agent, 'OpenSolaris', false, true)){
					self::$operating_system['name'] = 'Open Solaris';
					self::$operating_system['device'] = 'Desktop';
					return true;
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsOpenSolaris::class);

}

?>