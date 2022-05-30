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
	if(!trait_exists(__NAMESPACE__ . '\\Clean_Query')){

		// Make query for using in statement
		trait Clean_Query {

			// Clean query for a neat and valid query statement
			// @variable ?String $query
			// @return ?String
			public static function Clean_Query(?String $query) : ?String {
				$query = Framework\Cleaner::Trim($query);
				$query = str_replace(array('( ', ' )'), array('(', ')'), $query);
				$query = str_replace(array(' OR)', ' AND)'), array(')', ')'), $query);
				$query = str_replace(array(' AND AND ', ' OR OR '), array(' AND ', ' OR '), $query);
				$query = str_replace(array(' AND OR '), array(' OR '), $query);
				$query = str_replace(array(' OR AND '), array(' AND '), $query);
				$query = preg_replace('/BETWEEN (.*?) AND (.*?)/imu', 'BETWEEN$1-$2', $query);
				$query = count(self::$wheres) <= 1 ? str_replace(array('OR ', 'AND '), array('', ''), $query) : $query;
				$query = preg_replace('/BETWEEN(.*?)-(.*?)/imu', 'BETWEEN $1 AND $2', $query);
				$query = Framework\Cleaner::Trim($query);
				return($query);
			}

		}

	}

	return(\LaunchPad\Components\Database\Base\Clean_Query::class);

}

?>