<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Validator as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Validator as Components;

	// Check for existence of class
	if(!class_exists(__NAMESPACE__ . '\\Validator')){

		// a validator for validation of anythink such as inputs, methods, methods inputs and ...
		class Validator extends LaunchPad {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Validator\Check
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Check;

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Validator
			private static function Static(?Callable $closure = null) : \LaunchPad\Validator {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\Validator::class);

}

?>