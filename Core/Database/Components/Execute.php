<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @library \PDO, \PDOException
	// -----------------------------------------------------------------------------------------------------------------------
	use \PDO, \PDOException;

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Execute')){

		// Prepare method for connection based on PDO
		trait Execute {

			// Prepare query and execute it
			// @variable Array $query_statements
			// @return Boolean
			protected static function Execute(Array $query_statements = array()){
				if(isset($query_statements['query'])){
					try{
						self::$current_process = null;
						$query = self::$connection->prepare($query_statements['query']);
						foreach(self::$targets as $target_key => $target_value){
							$param_type = gettype($target_value);
							switch($param_type){
								case('string'): $parameter_type = PDO::PARAM_STR; break;
								case('integer'): $parameter_type = PDO::PARAM_INT; break;
								case('boolean'): $parameter_type = PDO::PARAM_BOOL; break;
								case('null'): $parameter_type = PDO::PARAM_NULL; break;
								default: $parameter_type = PDO::PARAM_STR; break;
							}
							$target_key = str_replace(array(':'), array(''), $target_key);
							$query->bindValue($target_key, $target_value, $parameter_type);
						}
						$result = $query->execute();
						self::$current_process = $query;
						self::$wheres = array();
						return($result);
					}catch(PDOException $error){
						Framework\Logger::Warning('Database Connection Has a Problem. Please Check it');
						self::$debug_errors == true ? self::Debuging($error) : '';
						return false;
					}
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Database\Execute::class);

}

?>