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
	if(!trait_exists(__NAMESPACE__ . '\\Create_ID')){

		// Create new session id
		trait Create_ID {

			// Create new ID with specified prefix
			// @variable ?Mixed $prefix | default null
			// @variable ?Callable $closure | default null
			// @return ?String
			public static function Create_ID($prefix = null, ?Callable $closure = null) : ?String {
				if(!self::$active){
					$prefix = Framework\Cleaner::Trim($prefix);
					$prefix = Framework\Validator::IsNullOrEmpty($prefix) ? 'LaunchPad-' : $prefix;
					$id = session_create_id($prefix);
					Framework\Caller::Make($prefix, $id);
					Framework\Caller::Make($closure, $id);
					return($id);
				}else{
					// Error sessions is started
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Helpers\Create_ID::class);

}

?>