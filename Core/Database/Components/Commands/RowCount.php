<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\Commands {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\RowCount')){

		trait RowCount {

			// Get result of select queries as array
			// @no_variable
			// @return Float
			protected static function RowCount() : Float {
				$result = self::$current_process->fetchAll(self::$fetch_type);
				$result = count($result);
				return($result);
			}

		}

	}

	return(\LaunchPad\Components\Database\Commands\RowCount::class);

}

?>