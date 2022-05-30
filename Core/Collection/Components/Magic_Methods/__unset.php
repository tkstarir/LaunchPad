<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Collection\Magic_Methods {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\__unset')){

		// "__unset" Magic method for deleteing data from collection
		trait __unset {

			// Clear content of specified index and delete it from collection
			// @variable ?String $name | default null
			// @return Boolean
			public function __unset(?String $name = null) : Void {
				if(isset($this->data[$name])){
					unset($this->data[$name]);
				}
			}
		}

	}

	return(\LaunchPad\Components\Collection\Magic_Methods\__unset::class);

}

?>