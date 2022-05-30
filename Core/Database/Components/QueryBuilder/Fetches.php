<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Fetches')){

		// Fetch method based on PDO
		trait Fetches {

			// Fetch results by your query
			// @variable Mixed $select | default '*'
			// @variable ?Callable $closure | default null
			// @return Array
			public static function Fetch($select = '*', ?Callable $closure = null) : Array {
				$column = is_callable($select) ? '*' : $select;
				self::Prepare($column);
				$fetch = self::Result(true);
				$fetch = Framework\Cleaner::ToArray($fetch);
				Framework\Caller::Make($select, $fetch);
				Framework\Caller::Make($closure, $fetch);
				return($fetch);
			}

			// Clone of "Fetch" method
			// @variable Mixed $select | default '*'
			// @variable ?Callable $closure | default null
			// @return Array
			public static function Get($select = '*', ?Callable $closure = null) : Array {
				return(self::Fetch($select, $closure));
			}

			// Select all columns and replace your attension columns to new names
			// @variable Mixed $select | default '*'
			// @variable Mixed $as | default '*'
			// @variable ?Callable $closure | default null
			// @return Array
			public static function SelectAs($select = '*', $as = '*', ?Callable $closure = null) : Array {
				if(is_string($select) AND is_string($as)){
					$removes = array($select);
					$select = '*, `' . $select . '` AS `' . $as . '`';
				}elseif(is_array($select) AND is_array($as) AND count($select) == count($as)){
					$removes = array();
					$selects = array();
					$selects[] = '*';
					foreach($select as $key => $value){
						$removes[] = $value;
						$selects[] = '`' . $value . '` AS `' . $as[$key] . '`';
					}
					$select = join(', ', $selects);
				}else{
					$output = array();
					return($output);
				}
				self::Prepare($select);
				$fetch = self::Result(true);
				$fetch = Framework\Cleaner::ToArray($fetch);
				if(count($fetch) <= 0){
					$output = array();
					return($output);
				}else{
					foreach($fetch as $key => $value){
						foreach($removes as $remove){
							if(!Framework\Validator::IsNullOrEmpty($value->$remove)){
								unset($fetch[$key]->$remove);
							}
						}
					}
					Framework\Caller::Make($closure, $fetch);
					return($fetch);
				}
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Fetches::class);

}

?>