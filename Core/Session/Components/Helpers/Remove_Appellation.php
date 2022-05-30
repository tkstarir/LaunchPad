<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Session\Helpers {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Remove_Appellation')){

		// Remove prefixes and suffixes from session keys
		trait Remove_Appellation {

			// Remove prefix and suffix of sessions
			// @variable ?String $name | default null
			// @return ?String
			public static function Remove_Appellation(?String $name = null) : ?String {
				$name = Framework\Cleaner::Trim($name);
				$prefix = Framework\Config::Core('Sessions_Prefix');
				$suffix = Framework\Config::Core('Sessions_Suffix');
				$name = preg_replace('/' . $prefix . '/imu', '', $name);
				$name = preg_replace('/' . $suffix . '/imu', '', $name);
				return($name);
			}

		}

	}

	return(\LaunchPad\Components\Session\Helpers\Remove_Appellation::class);

}

?>