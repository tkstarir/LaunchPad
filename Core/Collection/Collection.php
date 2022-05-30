<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Collection as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Collection as Components;

	// Check for existence of class
	if(!class_exists(__NAMESPACE__ . '\\Collection')){

		// Collection class for data that save into models and sessions
		class Collection {

			// @property:protected Array $data
			protected $data = array();

			// @property:protected Array $access_permit | default array('id' => 0)
			protected $access_permit = array('id' => 0);

			// @property:protected ?String $target | default null
			protected $target = null;

			// @protected:constant String $non_database_vars
			protected const non_database_vars = array('access_permit', 'target');

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Collection\Magic_Methods
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Magic_Methods;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Collection\Model_Methods
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Model_Methods;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Collection\No_Database
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\No_Database;

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Collection
			private static function Static(?Callable $closure = null) : \LaunchPad\Collection {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\Collection::class);

}

?>