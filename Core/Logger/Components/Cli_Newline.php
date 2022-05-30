<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Logger {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Cli_Newline')){

		// End of line Character for Terminal
		trait Cli_Newline {

			// Write an empty line (WhiteSpace)
			// @variable Boolean $force | default false
			// @return Boolean
			public static function Cli_Newline(Bool $force = false) : Bool {
				return(self::Cli_Log(Framework\Config::Newline(), $force));
			}

		}

	}

	return(\LaunchPad\Components\Logger\Cli_Newline::class);

}

?>