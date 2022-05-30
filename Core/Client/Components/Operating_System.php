<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Client\Operating_System as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Client\Operating_System as Components;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Operating_System')){

		// Operating system components for check and set operating system details
		trait Operating_System {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check_Device
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_Device;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Data
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Data;

		}

	}

	return(\LaunchPad\Components\Client\Operating_System::class);

}

?>