<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Client\Browser as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Client\Browser as Components;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Browser')){

		// Browser components for check and set operating system details
		trait Browser {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Data
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Data;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Frames
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Frames;

		}

	}

	return(\LaunchPad\Components\Client\Browser::class);

}

?>