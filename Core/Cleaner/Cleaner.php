<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Cleaner as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Cleaner as Components;

	// Check for existence of class
	if(!class_exists(__NAMESPACE__ . '\\Cleaner')){

		// Cleaner class for safe inputs, methods and database queries
		class Cleaner extends LaunchPad {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Cleaner\Closures
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Closures;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Cleaner\Lower_Case
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Lower_Case;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Cleaner\Number
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Number;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Cleaner\Obj_Remove_Prefix
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Obj_Remove_Prefix;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Cleaner\Slash_Remover
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Slash_Remover;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Cleaner\ToArray
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\ToArray;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Cleaner\ToObject
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\ToObject;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Cleaner\Trim
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Trim;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Cleaner\Upper_Case
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Upper_Case;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Cleaner\XSS
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\XSS;

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Cleaner
			private static function Static(?Callable $closure = null) : \LaunchPad\Cleaner {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\Cleaner::class);

}

?>