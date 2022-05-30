<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Collection\Magic_Methods {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\__toString')){

		// "__toString" Magic method for print collections
		trait __toString {

			// Get all collection data as JSON when use collection as printable object
			// @no_variable
			// @return ?String
			public function __toString() : String {
				$output = json_encode($this->data, JSON_UNESCAPED_UNICODE);
				return($output);
			}

		}

	}

	return(\LaunchPad\Components\Collection\Magic_Methods\__toString::class);

}

?>