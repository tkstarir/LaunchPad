<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Database\Base as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Database\Base as Components;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Base')){

		// Base functions for database that don't be related to mysql connection
		trait Base {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Base\Active
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Active;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Base\Appellation
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Appellation;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Base\Check_Activation
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Check_Activation;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Base\Clean_Query
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Clean_Query;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Base\Current_Process
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Current_Process;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Base\Debuging
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Debuging;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Base\Remove_Appellation
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Remove_Appellation;

		}

	}

	return(\LaunchPad\Components\Database\Base::class);

}

?>