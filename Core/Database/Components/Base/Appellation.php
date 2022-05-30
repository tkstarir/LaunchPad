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
	if(!trait_exists(__NAMESPACE__ . '\\Appellation')){

		// Appellation names to real names with prefix and suffix
		trait Appellation {

			// Add prefix and suffix of columns or tables into a name
			// @variable ?String $name | default null
			// @variable ?String $type | default null (table|column)
			// @return ?String
			public static function Appellation(?String $name = null, ?String $type = null) : ?String {
				self::Check_Activation();
				$type = (Framework\Validator::IsNullOrEmpty($type) OR !in_array($type, array('table', 'column'))) ? 'table' : $type;
				$name = self::Remove_Appellation($name, $type);
				$prefix = $type == 'table' ? self::$table_prefixes : self::$column_prefixes;
				$suffix = $type == 'table' ? self::$table_suffixes : self::$column_suffixes;
				$name = $prefix . $name . $suffix;
				return($name);
			}

		}

	}

	return(\LaunchPad\Components\Database\Base\Appellation::class);

}

?>