<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\Functions\Converters {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Column')){

		// String converter to it column base 
		trait Column {

			// Convert a string to it column base
			// @variable ?String $column | default null
			// @return ?String
			public static function Column(?String $column = null) : ?String {
				$column = Framework\Cleaner::Trim($column);
				$column = strpos($column, '`') !== false ? str_replace(array('`'), array(''), $column) : $column;
				$column = '`' . $column . '`';
				return($column);
			}

		}

	}

	return(\LaunchPad\Components\Database\Functions\Converters\Column::class);

}

?>