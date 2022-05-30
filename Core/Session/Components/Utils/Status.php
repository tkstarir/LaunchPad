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
	if(!trait_exists(__NAMESPACE__ . '\\Status')){

		// Get encoded output from sessions based on your specified format
		trait Status {

			// Get current status of sessions with it predefined constants in php
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Status(?Callable $closure = null){
				$status = session_status();
				switch($status){
					case(PHP_SESSION_DISABLED): $code = 0; $case = 'disable'; break;
					case(PHP_SESSION_NONE): $code = 1; $case = 'none'; break;
					case(PHP_SESSION_ACTIVE): $code = 2; $case = 'active'; break;
					default: return false; break;
				}
				Framework\Caller::Make($closure, $code, $case);
				return($output);
			}

		}

	}

	return(\LaunchPad\Components\Session\Utils\Status::class);

}

?>