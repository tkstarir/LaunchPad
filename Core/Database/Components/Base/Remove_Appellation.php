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
	if(!trait_exists(__NAMESPACE__ . '\\Remove_Appellation')){

		// Remove prefix and suffix from names
		trait Remove_Appellation {

			// Remove prefix and suffix of columns or tables
			// @variable ?String $name | default null
			// @variable ?String $type | default null (table|column)
			// @return ?String
			public static function Remove_Appellation(?String $name = null, ?String $type = null) : ?String {
				self::Check_Activation();
				$type = (Framework\Validator::IsNullOrEmpty($type) OR !in_array($type, array('table', 'column'))) ? 'table' : $type;
				$name = Framework\Cleaner::Trim($name);
				$prefix = $type == 'table' ? self::$table_prefixes : self::$column_prefixes;
				$suffix = $type == 'table' ? self::$table_suffixes : self::$column_suffixes;
				$name = preg_replace('/' . $prefix . '/imu', '', $name);
				$name = preg_replace('/' . $suffix . '/imu', '', $name);
				return($name);
			}

		}

	}

	return(\LaunchPad\Components\Database\Base\Remove_Appellation::class);

}

?>