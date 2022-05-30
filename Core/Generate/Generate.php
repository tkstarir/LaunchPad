<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Generate as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Generate as Components;

	// Check for existence of class
	if(!class_exists(__NAMESPACE__ . '\\Generate')){

		// Generator class for generate strings, numbers, passwords & ...
		class Generate extends LaunchPad {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Generate\Base64
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Base64;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Generate\Decode_Base64
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Decode_Base64;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Generate\Decode_Password
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Decode_Password;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Generate\Decode_Url
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Decode_Url;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Generate\Hasher
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Hasher;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Generate\Password
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Password;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Generate\Random_Number
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Random_Number;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Generate\Random
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Random;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Generate\Url
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Url;

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Generate
			private static function Static(?Callable $closure = null) : \LaunchPad\Generate {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\Generate::class);

}

?>