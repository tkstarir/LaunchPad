<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Session\CRUD {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// -----------------------------------------------------------------------------------------------------------------------
	// | @library \RecursiveIteratorIterator, \RecursiveArrayIterator
	// -----------------------------------------------------------------------------------------------------------------------
	use \RecursiveIteratorIterator, \RecursiveArrayIterator;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Read')){

		// CRUD "Read" section for reading indexes in sessions
		trait Read {

			// Read an index from sessions with specified key
			// @variable Mixed $multiple_variables
			// @return ?Mixed
			public static function Read(...$multiple_variables){
				$multiple_variables_count = count($multiple_variables);
				if(Framework\Validator::Between($multiple_variables_count, 1, 2, true) AND is_string($multiple_variables[0])){
					return(count($multiple_variables) == 2 ? self::Get($multiple_variables[0], $multiple_variables[1]) : self::Get($multiple_variables[0]));
				}else{
					$closures = Framework\Cleaner::Closures($multiple_variables);
					$indexes = new RecursiveArrayIterator($multiple_variables);
					$indexes = new RecursiveIteratorIterator($indexes);
					$indexes = iterator_to_array($indexes, false);
					$values = array();
					foreach($indexes as $index_key => $index_value){
						$index_value = self::Read($index_value);
						!empty($index_value) ? $values[] = $index_value : '';
					}
					foreach($closures as $closure){
						Framework\Caller::Make($closure, $values);
					}
					return($values);
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\CRUD\Read::class);

}

?>