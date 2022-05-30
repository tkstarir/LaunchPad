<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Session {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Session\CRUD as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Session\CRUD as Components;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\CRUD')){

		// CRUD methods (Create, Read, Update, Delete) for session core
		trait CRUD {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\CRUD\Create
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Create;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\CRUD\Delete
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Delete;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\CRUD\Read
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Read;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\CRUD\Update
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Update;

		}

	}

	return(\LaunchPad\Components\Session\CRUD::class);

}

?>