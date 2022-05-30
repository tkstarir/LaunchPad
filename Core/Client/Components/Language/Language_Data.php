<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Language {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Client\Language\Language_Data as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Client\Language\Language_Data as Components;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Language_Data')){

		// Getting language details that saved before
		trait Language_Data {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Language\Language_Data\Language_Encoding
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Language_Encoding;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Language\Language_Data\Language_Fetch
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Language_Fetch;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Language\Language_Data\Language_Language
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Language_Language;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Language\Language_Data\Language_Locale
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Language_Locale;

		}

	}

	return(\LaunchPad\Components\Client\Language\Language_Data::class);

}

?>