<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Config as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Config as Components;

	// Check for existence of class
	if(!class_exists(__NAMESPACE__ . '\\Config')){

		// Config class for getting configs that define by LaunchPad or yourself
		class Config extends LaunchPad {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Config\Newline
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Newline;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Config\Magic_Methods
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Magic_Methods;

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Config
			private static function Static(?Callable $closure = null) : \LaunchPad\Config {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\Config::class);

}

?>