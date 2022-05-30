<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\Commands {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @library \PDO, \PDOException
	// -----------------------------------------------------------------------------------------------------------------------
	use \PDO, \PDOException;

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	if(!trait_exists(__NAMESPACE__ . '\\Prepare')){

		// Prepare query structures based on PDO
		trait Prepare {

			// Prepare query and execute it
			// @variable Mixed $type | default '*'
			// @return Boolean
			public static function Prepare($type = '*') : Bool {
				try{
					$query_statements = self::Initialize('SELECT', $type);
					self::Execute($query_statements);
					$result = true;
				}catch(PDOException $error){
					Framework\Logger::Warning('Database connection has a problem. Please check it');
					self::$debug_errors == true ? self::Debuging($error) : '';
					$result = false;
				}finally{
					return($result);
				}
			}

		}

	}

	return(\LaunchPad\Components\Database\Commands\Prepare::class);

}

?>