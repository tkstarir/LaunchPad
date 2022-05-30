<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Browser {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Client\Browser\Browser_Frames as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Client\Browser\Browser_Frames as Components;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Browser_Frames')){

		// Check and store name, version and frame of browser of client
		trait Browser_Frames {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Frames\Browser_Frames_IsChromeFrame
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Frames_IsChromeFrame;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Frames\Browser_Frames_IsFacebookWebView
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Frames_IsFacebookWebView;

		}

	}

	return(\LaunchPad\Components\Client\Browser\Browser_Frames::class);

}

?>