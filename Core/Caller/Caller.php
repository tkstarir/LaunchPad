<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Caller as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Caller as Components;

	// Check for existence of class
	if(!class_exists(__NAMESPACE__ . '\\Caller')){

		// Caller class for process closures that need callback
		class Caller extends LaunchPad {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Caller\Get_Parameters
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Get_Parameters;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Caller\Get_Requires
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Get_Requires;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Caller\Call
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Call;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Caller\Make
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Make;

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Caller
			private static function Static(?Callable $closure = null) : \LaunchPad\Caller {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\Caller::class);

}

?>