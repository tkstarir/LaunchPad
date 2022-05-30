<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Header as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Header as Components;

	// Check for existence of class
	if(!class_exists(__NAMESPACE__ . '\\Header')){

		// Header class for process and setting up headers and custom headers
		class Header extends LaunchPad {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Header\Add_Multi
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Add_Multi;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Header\Add
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Add;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Header\All
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\All;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Header\Content_Disposition
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Content_Disposition;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Header\Content_Length
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Content_Length;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Header\Content_Type
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Content_Type;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Header\Get_Content_Type
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Get_Content_Type;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Header\Get_Header_Status
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Get_Header_Status;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Header\Go
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Go;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Header\Header_Status
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Header_Status;

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Header
			private static function Static(?Callable $closure = null) : \LaunchPad\Header {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\Header::class);

}

?>