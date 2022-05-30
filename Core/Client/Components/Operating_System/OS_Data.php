<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Operating_System {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Client\Operating_System\OS_Data as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Client\Operating_System\OS_Data as Components;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\OS_Data')){

		// Getting operating system details that saved before
		trait OS_Data {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Data\OS_Architecture
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Architecture;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Data\OS_Device
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Device;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Data\OS_Fetch
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Fetch;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Data\OS_Name
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Name;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Data\OS_Version
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Version;

		}

	}

	return(\LaunchPad\Components\Client\Operating_System\OS_Data::class);

}

?>