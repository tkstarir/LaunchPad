<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Console {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Make_Command')){

		// "Make_Command" Method for CountDown processes
		trait Make_Command {

			// Make called command and return it calling status
			// @variable ?String $command | default null
			// @variable Array $options
			// @return Boolean
			public static function Make_Command(?String $command = null, Array $options = array()) : Mixed {
				return(self::Static(function(\LaunchPad\Commands $console) use ($command, $options){
					$command = ucfirst($command);
					return($console->$command($options));
				}));
			}

		}

	}

	return(\LaunchPad\Components\Console\Make_Command::class);

}

?>