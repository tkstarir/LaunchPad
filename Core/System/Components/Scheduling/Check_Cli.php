<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\System\Scheduling {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Check_Cli')){

		// Check cli component for checking application launch in terminal or not
		trait Check_Cli {

			// @property:protected Boolean $cli | default false
			protected static $cli = false;

			// check and set current process run into a PHP cli terminal or not
			// @no_variable
			// @return Boolean
			public static function Check_Cli() : Bool {
				$cli_detect = php_sapi_name();
				$cli_detect = Framework\Cleaner::Lower_Case($cli_detect);
				if($cli_detect == 'cli'){
					return(self::$cli = true);
				}else{
					return(self::$cli = false);
				}
			}

		}

	}

	return(\LaunchPad\Components\System\Scheduling\Check_Cli::class);

}

?>