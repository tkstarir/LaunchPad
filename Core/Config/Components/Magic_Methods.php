<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Config {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Config\Magic_Methods as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Config\Magic_Methods as Components;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Magic_Methods')){

		// Magic methods for Config core such as "__callStatic" and ...
		trait Magic_Methods {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Config\Magic_Methods\__callStatic
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\__callStatic;

		}

	}

	return(\LaunchPad\Components\Config\Magic_Methods::class);

}

?>