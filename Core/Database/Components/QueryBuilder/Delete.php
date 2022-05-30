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
	if(!trait_exists(__NAMESPACE__ . '\\Delete')){

		// Delete method in database based on PDO
		trait Delete {

			// Delete rows according to your queries
			// @variable ?Mixed $limit | default null
			// @variable ?Callable $closure | default null
			// @return Boolean
			public static function Delete($limit = null, ?Callable $closure = null) : Bool {
				try{
					(!is_null($limit) AND is_numeric($limit)) ? Self::Limit($limit) : '';
					$query_statements = self::Initialize('DELETE', array());
					self::Execute($query_statements);
					self::Current_Process(true);
					$result = true;
				}catch(PDOException $error){
					Framework\Logger::Warning('Database Connection Has a Problem. Please Check it');
					self::$debug_errors == true ? self::Debuging($error) : '';
					$result = false;
				}finally{
					Framework\Caller::Make($limit, $result);
					Framework\Caller::Make($closure, $result);
					return($result);
				}
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Delete::class);

}

?>