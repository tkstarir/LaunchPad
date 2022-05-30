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
	if(!class_exists(__NAMESPACE__ . '\\Console')){

		// Console class for launch and process CountDown application
		// LaunchPad CountDown beginning ...
		class Console extends LaunchPad {

			// @property:protected Array $valid_commands
			protected static $valid_commands = array(
				'launch' => \LaunchPad\Components\Console\Commands\Launch::class,
				'create' => \LaunchPad\Components\Console\Commands\Create::class
			);

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Console\Check_Command
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Check_Command;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Console\Command_Process
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Command_Process;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Console\Get_Commands
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Get_Commands;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Console\Make_Command
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Make_Command;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Console\Make
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Make;

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Console
			private static function Static(?Callable $closure = null) : \LaunchPad\Console {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\Console::class);

}

?>