<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @library \PDO, \PDOException
	// -----------------------------------------------------------------------------------------------------------------------
	use \PDO, \PDOException;

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Update')){

		// Update database based on PDO according to your statements
		trait Update {

			// Update database according to your statements
			// @variable Mixed $column
			// @variable ?Mixed $value | default null
			// @variable ?Callable $closure | default null
			// @return Boolean
			public static function Update($column = array(), $value = null, ?Callable $closure = null) : Bool {
				try{
					$updates = is_array($column) ? $column : array($column => $value);
					$query_statements = self::Initialize('UPDATE', $updates);
					self::Execute($query_statements);
					self::Current_Process(true);
					$result = true;
				}catch(PDOException $error){
					Framework\Logger::Warning('Database Connection Has a Problem. Please Check it');
					self::$debug_errors == true ? self::Debuging($error) : '';
					$result = false;
				}finally{
					Framework\Caller::Make($value, $result);
					Framework\Caller::Make($closure, $result);
					return($result);
				}
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Update::class);

}

?>