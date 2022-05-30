<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\First_Initialize_Command')){

		// First initialize command for PDO connection
		trait First_Initialize_Command {

			// Getting first initialize command based on your charset and collation
			// @no_variable
			// @return ?String
			protected static function First_Initialize_Command() : ?String {
				self::Check_Activation();
				$charset = Framework\Config::Database('Charset');
				$collation = Framework\Config::Database('Collation');
				$command = 'SET NAMES `{Charset_Name}` COLLATE `{Database_Collation}`';
				$command = str_replace(array('{Charset_Name}'), array($charset), $command);
				$command = str_replace(array('{Database_Collation}'), array($collation), $command);
				settype($command, 'String');
				return($command);
			}

		}

	}

	return(\LaunchPad\Components\Database\First_Initialize_Command::class);

}

?>