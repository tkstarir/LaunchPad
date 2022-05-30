<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Session\Properties {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Regenerate_ID')){

		// Update current session id with a new one
		trait Regenerate_ID {

			// Update the current session id with a newly generated one
			// @variable ?Mixed $delete_old | default null
			// @variable ?Callable $closure | default null
			// @return Boolean
			public static function Regenerate_ID($delete_old = null, ?Callable $closure = null) : Bool {
				if(self::$active){
					$delete_old = is_bool($delete_old) ? $delete_old : false;
					$result = session_regenerate_id($delete_old);
					Framework\Caller::Make($delete_old, $result);
					Framework\Caller::Make($closure, $result);
					return($result);
				}else{
					// Error session is not active
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Properties\Regenerate_ID::class);

}

?>