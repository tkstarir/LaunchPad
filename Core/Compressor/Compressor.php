<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Compressor as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Compressor as Components;

	// Check for existence of class
	if(!class_exists(__NAMESPACE__ . '\\Compressor')){

		// Compressor class for compress HTML, CSS & JavaScripts that you load with LaunchPad engine in your template
		class Compressor extends LaunchPad {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Compressor\CSS
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\CSS;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Compressor\Java_Script
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Java_Script;

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Compressor
			private static function Static(?Callable $closure = null) : \LaunchPad\Compressor {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\Compressor::class);

}

?>