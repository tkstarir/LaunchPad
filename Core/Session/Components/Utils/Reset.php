<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Session\Utils {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Reset')){

		// Re-initialize session
		trait Reset {

			// Re-initialize session array with originals value
			// @variable ?Callable $closure | default null
			// @return Boolean
			public static function Reset(?Callable $closure = null) : Bool {
				$result = session_reset();
				Framework\Caller::Make($closure, $result);
				return($result);
			}

		}

	}

	return(\LaunchPad\Components\Session\Utils\Reset::class);

}

?>