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
	use \LaunchPad\Components\Input\Method as Components;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Method')){

		// Method component for fetch and retrieve data from methods
		trait Method {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Input\Method\Fetch
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Fetch;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Input\Method\Get
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Get;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Input\Method\Post
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Post;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Input\Method\Put
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Put;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Input\Method\Request
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Request;

		}

	}

	return(\LaunchPad\Components\Input\Method::class);

}

?>