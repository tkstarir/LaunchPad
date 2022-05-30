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
	if(!trait_exists(__NAMESPACE__ . '\\Appellation')){

		// Appellation method for merge keys with prefixes and suffixes
		trait Appellation {

			// Add prefix and suffix of sessions into a name
			// @variable ?String $name | default null
			// @return ?String
			public static function Appellation(?String $name = null) : ?String {
				$name = self::Remove_Appellation($name);
				$prefix = Framework\Config::Core('Sessions_Prefix');
				$suffix = Framework\Config::Core('Sessions_Suffix');
				$name = $prefix . $name . $suffix;
				return($name);
			}

		}

	}

	return(\LaunchPad\Components\Session\Helpers\Appellation::class);

}

?>