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
	if(!trait_exists(__NAMESPACE__ . '\\Convert_To_Cli_Type')){

		// Replace predefined characters to it's real form to show text in terminal
		trait Convert_To_Cli_Type {

			// Replace lines, rows and tabs to real characters and make ready the text block to show in terminal
			// @variable ?String $text | default null
			// @return ?String
			public static function Convert_To_Cli_Type(?String $text = null) : ?String {
				$special_characters = Framework\Config::Core('Special_Characters');
			 	$text = str_replace(array('{{Line}}'), array(Framework\Config::Newline()), $text);
				$text = str_replace(array('{{Row}}'), array($special_characters['R']), $text);
				$text = str_replace(array('{{Tab}}'), array($special_characters['T']), $text);
				return($text);
			}

		}

	}

	return(\LaunchPad\Components\Logger\Convert_To_Cli_Type::class);

}

?>