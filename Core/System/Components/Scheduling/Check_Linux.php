<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\System\Scheduling {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Check_Linux')){

		// Check linux component for checking launchpad run in a linux server or not
		trait Check_Linux {

			// @property:protected Boolean $linux | default false
			protected static $linux = false;

			// Check and set current operating system is linux or not
			// @no_variable
			// @return Boolean
			public static function Check_Linux() : Bool {
				if(self::$os == 'LINUX'){
					return(self::$linux = true);
				}else{
					return(self::$linux = false);
				}
			}

		}

	}

	return(\LaunchPad\Components\System\Scheduling\Check_Linux::class);

}

?>