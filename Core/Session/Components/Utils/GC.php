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
	if(!trait_exists(__NAMESPACE__ . '\\GC')){

		// Perform session data garbage collection
		trait GC {

			// Check if session is active perform session data garbage collection
			// @variable ?Callable $closure | default null
			// @return Boolean
			public static function GC(?Callable $closure = null) : Bool {
				if(self::$active){
					$result = session_gc();
					Framework\Caller::Make($closure, $result);
					return($result);
				}else{
					// Error session is not active
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Utils\GC::class);

}

?>