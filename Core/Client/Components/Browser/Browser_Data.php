<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Browser {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Client\Browser\Browser_Data as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Client\Browser\Browser_Data as Components;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Browser_Data')){

		// Getting browser details that saved before
		trait Browser_Data {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Data\Browser_Fetch
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Fetch;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Data\Browser_Frame
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Frame;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Data\Browser_Name
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Name;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Data\Browser_Version
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Version;

		}

	}

	return(\LaunchPad\Components\Client\Browser\Browser_Data::class);

}

?>