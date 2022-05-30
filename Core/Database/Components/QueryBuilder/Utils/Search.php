<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder\Utils {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Search')){

		// Search method for searching in results
		trait Search {

			// Search for a row with it AI column
			// @variable Mixed $ai_column_value | default 0
			// @variable ?Mixed $ai_column | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Collection
			public static function Search($ai_column_value = 0, $ai_column = null, ?Callable $closure = null) : \LaunchPad\Collection {
				$column = Framework\Validator::IsNullOrEmpty($ai_column) ? self::Appellation(self::$ai_column, 'column') : self::Appellation($ai_column, 'column');
				self::Where($column, '=', $ai_column_value);
				self::Prepare('*');
				$fetch = self::Result(true);
				$fetch = Framework\Cleaner::ToArray($fetch);
				$fetch = count($fetch) <= 0 ? false : $fetch;
				$fetch = is_Array($fetch) ? $fetch[0] : $fetch;
				($fetch !== false) ? Framework\Caller::Make($ai_column, $fetch) : '';
				($fetch !== false) ? Framework\Caller::Make($closure, $fetch) : '';
				return($fetch);
			}

			// Clone of "Search" method
			// @variable Mixed $ai_column_value | default 0
			// @variable ?Mixed $ai_column | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Collection
			public static function Find(Int $ai_column_value = 0, $ai_column = null, ?Callable $closure = null) : \LaunchPad\Collection {
				return(self::Search($ai_column_value, $ai_column, $closure));
			}

			// Find a row with it AI column
			// @variable Int $ai_column_value | default 0
			// @variable Mixed $ai_column | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Collection
			public static function SearchById(Int $ai_column_value = 0, ?Callable $closure = null) : \LaunchPad\Collection {
				return(self::Search($ai_column_value, self::$ai_column, $closure));
			}

			// Find a row with it AI column
			// @variable Int $ai_column_value | default 0
			// @variable Mixed $ai_column | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Collection
			public static function FindById(Int $ai_column_value = 0, ?Callable $closure = null) : \LaunchPad\Collection {
				return(self::Search($ai_column_value, self::$ai_column, $closure));
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Utils\Search::class);

}

?>