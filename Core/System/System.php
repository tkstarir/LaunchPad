<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\System as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\System as Components;

	// Check for existence of class
	if(!class_exists(__NAMESPACE__ . '\\System')){

		// System Class for Processes of LaunchPad in Software Side Such as Cli
		class System extends LaunchPad {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\System\Initialize
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Initialize;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\System\Kernel
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Kernel;

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\System
			private static function Static(?Callable $closure = null) : \LaunchPad\System {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\System::class);

}

?>