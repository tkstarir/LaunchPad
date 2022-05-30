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
	if(!trait_exists(__NAMESPACE__ . '\\Current_Process')){

		// Base "Current_Process" Method for getting ready database for next commands
		trait Current_Process {

			// Get or clear current process attributes
			// @variable Mixed $clear | default false
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Current_Process($clear = false, ?Callable $closure = null){
				if(is_bool($clear) AND $clear == true){
					self::$current_process = null;
					self::$table = '';
					self::$initializes_count = 0;
					self::$limit = 0;
					self::$offset = null;
					self::$order_by = array();
					self::$asc_or_desc = array();
					self::$group_by = '';
					self::$ai_column = 'id';
					self::$unions = '';
					self::$targets = array();
					self::$wheres = array();
					self::$havings = array();
					self::$joins = array();
					self::$aggregate = false;
					$result = true;
				}else{
					$result = array('current_process' => self::$current_process, 'table' => self::$table, 'initializes_count' => self::$initializes_count, 'limit' => self::$limit, 'offset' => self::$offset, 'order_by' => self::$order_by, 'asc_or_desc' => self::$asc_or_desc, 'group_by' => self::$group_by, 'ai_column' => self::$ai_column, 'unions' => self::$unions, 'targets' => self::$targets, 'wheres' => self::$wheres, 'havings' => self::$havings, 'joins' => self::$joins, 'aggregate' => self::$aggregate);
				}
				Framework\Caller::Make($clear, $result);
				Framework\Caller::Make($closure, $result);
				return true;
			}

		}

	}

	return(\LaunchPad\Components\Database\Base\Current_Process::class);

}

?>