<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Session as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Session as Components;

	// Check for existence of class
	if(!class_exists(__NAMESPACE__ . '\\Session')){

		// Session class for processes of sessions. create, read, update, delete (CRUD)
		class Session extends LaunchPad {

			// @property:protected Boolean $sessions | default false
			protected static $active = false;

			// @property:protected Array $sessions
			protected static $sessions = array();

			// @property:protected String $save_path | default null
			protected static $save_path = null;

			// @property:protected Int $cache_expire | default 180
			protected static $cache_expire = 180;

			// @property:protected String $cache_limiter | default 'nocache'
			protected static $cache_limiter = 'nocache';

			// @property:protected String $id | default null
			protected static $id = null;

			// @property:protected String $id | default 'PHPSESSID'
			protected static $name = 'PHPSESSID';

			// @property:protected String $cookie_params | default null
			protected static $cookie_params = null;

			// @property:protected String $modules_name | default 'files'
			protected static $module_name = 'files';

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\Active
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Active;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\CRUD
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\CRUD;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\Properties
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Properties;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\Helpers
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Helpers;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Session\Utils
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Utils;

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Session
			private static function Static(?Callable $closure = null) : \LaunchPad\Session {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\Session::class);

}

?>