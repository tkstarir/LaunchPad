<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\System\Scheduling {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Check_Windows')){

		// Check windows component for checking os is windows or not
		trait Check_Windows {

			// @property:protected Boolean $windows | default false
			protected static $windows = false;

			// Check and set current operting system is windows or not
			// @no_variable
			// @return Boolean
			public static function Check_Windows() : Bool {
				if(self::$os == 'WIN'){
					return(self::$windows = true);
				}else{
					return(self::$windows = false);
				}
			}

		}

	}

	return(\LaunchPad\Components\System\Scheduling\Check_Windows::class);

}

?>