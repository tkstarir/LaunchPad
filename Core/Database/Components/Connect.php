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
	if(!trait_exists(__NAMESPACE__ . '\\Connect')){

		// Database connect method for activation connection based on PDO
		trait Connect {

			// Connect to database with your details based on PDO
			// @variable ?String $username | default null
			// @variable ?String $password | default null
			// @variable ?String $database | default null
			// @variable ?String $hostname | default null
			// @variable Int $port | default 3306
			// @variable Boolean $debug_errors | default true
			// @return Boolean
			protected static function Connect(?String $username = null, ?String $password = null, ?String $database = null, ?String $hostname = 'localhost', Int $port = 3306, Bool $debug_errors = true) : Bool {
				try{
					if(empty(self::$connection)){
						self::$connection = new PDO('mysql: host=' . $hostname . '; port=' . $port . '; dbname=' . $database, $username, $password);
						$first_command = self::First_Initialize_Command();
						self::$connection->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, self::$stringify_fetches);
						self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, self::$emulate_prepares);
						self::$connection->setAttribute(PDO::ATTR_ERRMODE, self::$error_mode);
						self::$connection->setAttribute(PDO::ATTR_ORACLE_NULLS, self::$null_natural);
						self::$connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, $first_command);
						self::$connection->exec($first_command);
						self::$debug_errors = $debug_errors;
						$defaults = array('def', 'default', 'empty', 'none', 'undefined', 'null', null);
						(in_array(self::$table_prefixes, $defaults)) ? self::$table_prefixes = Framework\Config::Database('Tables_Prefixes') : '';
						(in_array(self::$table_suffixes, $defaults)) ? self::$table_suffixes = Framework\Config::Database('Tables_Suffixes') : '';
						(in_array(self::$column_prefixes, $defaults)) ? self::$column_prefixes = Framework\Config::Database('Columns_Prefixes') : '';
						(in_array(self::$column_suffixes, $defaults)) ? self::$column_suffixes = Framework\Config::Database('Columns_Suffixes') : '';
						Framework\Logger::Info('Database Initialized !');
						return true;
					}else{
						Framework\Logger::Warning('Database Already Initialized !');
						return false;
					}
				}catch(PDOException $error){
					Framework\Logger::Warning('Database Connection Has a Problem. Please Check it');
					self::$debug_errors == true ? self::Debuging($error) : '';
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Database\Connect::class);

}

?>