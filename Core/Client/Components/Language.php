<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Client\Language as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Client\Language as Components;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Language')){

		// Language components for check and set client language details
		trait Language {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Language\Language_Data
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Language_Data;

		}

	}

	return(\LaunchPad\Components\Client\Language::class);

}

?>