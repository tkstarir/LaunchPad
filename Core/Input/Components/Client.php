<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Input {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Input\Method as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Input\Client as Components;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Client')){

		// Client component for fetch and retrieve a few of specified contents of clients
		trait Client {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Input\Client\Request
			// -----------------------------------------------------------------------------------------------------------------------
			// use Components\Request;

		}

	}

	return(\LaunchPad\Components\Input\Client::class);

}

?>