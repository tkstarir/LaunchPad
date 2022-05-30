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
	if(!trait_exists(__NAMESPACE__ . '\\Debuging')){

		// Debuging database errors and notices
		trait Debuging {

			// Show debug errors or notices in console and client
			// @variable ?Mixed $error | default null
			// @return Boolean
			protected static function Debuging($error = null) : Bool {
				$message = is_string($error) ? $error : $error->getMessage();
				$new_line = Framework\Config::Newline();
				echo('PDO Connection Error<br>PDOException Error : ' . $message . $new_line);exit();
				return true;
			}

		}

	}

	return(\LaunchPad\Components\Database\Base\Debuging::class);

}

?>