<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Caller {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Call')){

		// Pass your closure into call_user_func_array function and return it output (your closure output)
		trait Call {

			// Call your closure with your requires
			// @variable ?Callable $closure | default null
			// @variable Array $requires
			// @return ?Mixed
			protected static function Call(?Callable $closure = null, Array $requires = array()){
				$closure_output = count($requires) >= 1 ? call_user_func_array($closure, $requires) : call_user_func($closure);
				return($closure_output);
			}

		}

	}

	return(\LaunchPad\Components\Caller\Call::class);

}

?>