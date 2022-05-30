<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Collection {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Collection\Magic_Methods as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Collection\Magic_Methods as Components;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Magic_Methods')){

		// Magic methods for collection core such as "__get", "__set" and ...
		trait Magic_Methods {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Collection\Magic_Methods\__get
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\__get;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Collection\Magic_Methods\__set
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\__set;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Collection\Magic_Methods\__toString
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\__toString;

		}

	}

	return(\LaunchPad\Components\Collection\Magic_Methods::class);

}

?>