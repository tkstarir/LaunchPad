<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Collection\Magic_Methods {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\__set')){

		// "__set" Magic method for set new data or update current data in collection
		trait __set {

			// Update existing specified index or if not exists, create it
			// @variable ?String $name | default null
			// @variable Mixed $value | default null
			// @return Boolean
			public function __set(?String $name = null, $value = null) : Void {
				(!Framework\Validator::IsNullOrEmpty($name) AND !Framework\Validator::IsNullOrEmpty($value)) ? (isset($this->$name) ? $this->$name = $value : $this->data[$name] = $value) : '';
			}

		}

	}

	return(\LaunchPad\Components\Collection\Magic_Methods\__set::class);

}

?>