<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Collection {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Collection\Model_Methods as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Collection\Model_Methods as Components;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Model_Methods')){

		// Method that is useful for collections and their childrens
		trait Model_Methods {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Collection\Model_Methods\Save
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Save;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Collection\Model_Methods\Update
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Update;

		}

	}

	return(\LaunchPad\Components\Collection\Model_Methods::class);

}

?>