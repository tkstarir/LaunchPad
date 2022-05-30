<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\Base {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Active')){

		// Base "Active" for activating database if it's not active
		trait Active {

			// Activate database connection
			// @variable ?Callable $closure | default null
			// @return Boolean
			public static function Active(?Callable $closure = null) : Bool {
				$server = Framework\Config::Database('Server');
				$username = Framework\Config::Database('Username');
				$password = Framework\Config::Database('Password');
				$database = Framework\Config::Database('Database');
				$port = Framework\Config::Database('Port');
				$debug_errors = Framework\Config::Database('Debug_Errors');
				$result = self::Connect($username, $password, $database, $server, $port, $debug_errors);
				$result = Framework\Validator::Boolean($result) ? $result : false;
				Framework\Caller::Make($closure, $result);
				return($result);
			}

		}

	}

	return(\LaunchPad\Components\Database\Base\Active::class);

}

?>