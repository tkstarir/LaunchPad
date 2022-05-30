<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\Properties {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Orders')){

		// SQL order by method
		trait Orders {

			// Set order by rule for query
			// @variable ?String $order_by | default null
			// @variable ?String $asc_or_desc | default null
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function OrderBy(?String $order_by = null, ?String $asc_or_desc = null, ?Callable $closure = null){
				$asc_or_desc = Framework\Validator::IsNullOrEmpty($asc_or_desc) ? 'ASC' : $asc_or_desc;
				if(Framework\Validator::IsNullOrEmpty($order_by)){
					$order_by = count(self::$order_by) == 1 ? current(self::$order_by) : self::$order_by;
					return($order_by);
				}else{
					$database_object = self::Static();
					$order_by = Framework\Cleaner::XSS($order_by);
					$order_by = str_replace(array('`'), array(''), $order_by);
					$order_by = self::Appellation($order_by, 'column');
					$asc_or_desc = Framework\Cleaner::XSS($asc_or_desc);
					$asc_or_desc = Framework\Cleaner::Lower_Case($asc_or_desc);
					$asc_or_desc = !in_array($asc_or_desc, array('asc', 'desc')) ? '' : $asc_or_desc;
					$asc_or_desc = Framework\Cleaner::Upper_Case($asc_or_desc);
					self::$order_by[] = $order_by;
					self::$asc_or_desc[] = $asc_or_desc;
					Framework\Caller::Make($closure, $database_object);
					return($database_object);
				}
			}

			// Set order by as ASC rule for query
			// @variable ?String $order_by | default null
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function OrderByAsc(?String $order_by = null, ?Callable $closure = null){
				return(self::OrderBy($order_by, 'ASC', $closure));
			}

			// Set order by as DESC rule for query
			// @variable ?String $order_by | default null
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function OrderByDesc(?String $order_by = null, ?Callable $closure = null){
				return(self::OrderBy($order_by, 'DESC', $closure));
			}

			// Get "ascs or desc(s)" rules
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Asc_Or_Desc(?Callable $closure = null){
				$asc_or_desc = count(self::$asc_or_desc) == 1 ? current(self::$asc_or_desc) : self::$asc_or_desc;
				Framework\Caller::Make($closure, $asc_or_desc);
				return($asc_or_desc);
			}

		}

	}

	return(\LaunchPad\Components\Database\Properties\Orders::class);

}

?>