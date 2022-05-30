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
	if(!trait_exists(__NAMESPACE__ . '\\Delete')){

		// CRUD "Delete" section for deleteing indexes from sessions
		trait Delete {

			// Delete an index from sessions with specified key
			// @variable Mixed $multiple_variables
			// @return Boolean
			public static function Delete(...$multiple_variables) : Bool {
				$multiple_variables_count = count($multiple_variables);
				if($multiple_variables_count == 1 AND is_string($multiple_variables[0])){
					return(self::Get($multiple_variables[0]));
				}else{
					$closures = Framework\Cleaner::Closures($multiple_variables);
					$indexes = new RecursiveArrayIterator($multiple_variables);
					$indexes = new RecursiveIteratorIterator($indexes);
					$indexes = iterator_to_array($indexes, false);
					$result = null;
					foreach($indexes as $index){
						$delete_result = self::Clear($index);
						(is_null($result) OR $result == true) ? $result = $delete_result : '';
					}
					foreach($closures as $closure){
						Framework\Caller::Make($closure, $result);
					}
					return($result);
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\CRUD\Delete::class);

}

?>