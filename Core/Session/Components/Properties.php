<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Session {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Session\Properties as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Session\Properties as Components;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Properties')){

		// Properties methods for setting and getting properties of sessions
		trait Properties {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\Properties\Cache_Expire
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Cache_Expire;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\Properties\Cache_Limiter
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Cache_Limiter;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\Properties\Cookie_Params
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Cookie_Params;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\Properties\ID
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\ID;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\Properties\Module_Name
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Module_Name;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\Properties\Name
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Name;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\Properties\Path
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Path;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\Helpers\Regenerate_ID
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Regenerate_ID;

		}

	}

	return(\LaunchPad\Components\Session\Properties::class);

}

?>