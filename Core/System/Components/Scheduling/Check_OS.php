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
	if(!trait_exists(__NAMESPACE__ . '\\Check_OS')){

		// Check os component for setting full os details and it short name
		trait Check_OS {

			// @property:protected ?String $full_os | default null
			protected static $full_os = null;

			// @property:protected ?String $os | default null
			protected static $os = null;

			// Set full operating system name that LaunchPad run into it
			// @no_variable
			// @return Boolean
			public static function Check_Full_OS() : Bool {
				$full_os = php_uname();
				self::$full_os = $full_os;
				return true;
			}

			// Set PHP operating system details with Fully particularites
			// @no_variable
			// @return Boolean
			public static function OS_Check() : Bool {
				$php_os = PHP_OS;
				$php_os = Framework\Cleaner::Upper_Case($php_os);
				$php_os = mb_substr($php_os, 0, 3, self::$charset);
				self::$os = $php_os;
				return true;
			}

		}

	}

	return(\LaunchPad\Components\System\Scheduling\Check_OS::class);

}

?>