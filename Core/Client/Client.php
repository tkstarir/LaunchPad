<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Client as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Client as Components;

	// Check for existence of class
	/*
		| 
		| ** Note **: Helper Source for most browsers and operating systems: "https://github.com/sinergi/php-browser-detector"
		| ** Note **: a Lot of Thanks to "sinergi" user of github (https://github.com/sinergi)
		| 
	*/
	if(!class_exists(__NAMESPACE__ . '\\Client')){

		// Client core. Where the client details is stored
		class Client extends LaunchPad {

			// @property:protected ?String $agent | default null
			public static $agent = null;

			// @property:protected Array $operating_system
			public static $operating_system = array('name' => null, 'version' => null, 'architecture' => null, 'device' => null);

			// @property:protected Array $language
			public static $language = array('locale' => null, 'language' => null, 'encoding' => null);

			// @property:protected Array $browser
			public static $browser = array('name' => null, 'version' => null, 'frames' => null);

			// @property:protected Array $ip
			public static $ip = array('default_addr' => null, 'addrs' => array());

			// @property:protected ?String $browser_unknown | default null
			public static $browser_name_unknown = null;

			// @property:protected ?String $browser_version_unknown | default null
			public static $browser_version_unknown = null;

			// @property:protected Boolean $browser_frame_default | default false
			protected static $browser_frame_default = false;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Initialize
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Initialize;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Language
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Language;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Operating_System;

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Client
			private static function Static(?Callable $closure = null) : \LaunchPad\Client {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\Client::class);

}

?>