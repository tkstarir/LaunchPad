<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Logger as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Logger as Components;

	// Check for existence of class
	if(!class_exists(__NAMESPACE__ . '\\Logger')){

		// Logger class for loging of LaunchPad completion stypes and your logs
		class Logger extends LaunchPad {

			// @property:protected Array $warnings
			protected static $warnings = array();

			// @property:protected Array $errors
			protected static $errors = array();

			// @property:protected Array $infos
			protected static $infos = array();

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Logger\Cli_Log
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Cli_Log;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Logger\Cli_Newline
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Cli_Newline;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Logger\Convert_To_Cli_Type
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Convert_To_Cli_Type;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Logger\Error
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Error;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Logger\Errors
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Errors;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Logger\Get
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Get;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Logger\Info
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Info;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Logger\Infos
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Infos;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Logger\Insert
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Insert;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Logger\Warning
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Warning;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Logger\Warnings
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Warnings;

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Logger
			private static function Static(?Callable $closure = null) : \LaunchPad\Logger {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\Logger::class);

}

?>