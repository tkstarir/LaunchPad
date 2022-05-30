<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Console as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Console as Components;

	// Check for existence of class
	if(!class_exists(__NAMESPACE__ . '\\Commands')){

		// Declared commands define by launchpad for "CountDown" application
		class Commands extends LaunchPad {

			// @property:protected Array $help_options
			protected static $help_options = array('-h', '--help', 'help');

			// @property:protected String $help_structures | default '/vendor/tkstarir/Structures/'
			protected static $help_structures =  Framework_Location . Framework_Directory . DS . 'Structures' . DS . 'Console' . DS . 'Helps' . DS;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Console\Help
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Help;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Console\Commands\Launch
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Commands\Launch;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Console\Commands\Create
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Commands\Create;

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Commands
			private static function Static(?Callable $closure = null) : \LaunchPad\Commands {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\Commands::class);

}

?>