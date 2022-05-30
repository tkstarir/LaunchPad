<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Input as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Input as Components;

	// Check for existence of class
	if(!class_exists(__NAMESPACE__ . '\\Input')){

		// Input class for getting data from server requests and methods
		class Input extends LaunchPad {

			// @property:protected Array $gets
			protected static $gets = array();

			// @property:protected Array $posts
			protected static $posts = array();

			// @property:protected Array $puts
			protected static $puts = array();

			// @property:protected Array $requests
			protected static $requests = array();

			// @property:protected Array $files
			protected static $files = array();

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Input\Method
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Method;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Input\Initialize
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Initialize;

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Input
			private static function Static(?Callable $closure = null) : \LaunchPad\Input {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\Input::class);

}

?>