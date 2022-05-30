<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @library \PDO, \PDOException
	// -----------------------------------------------------------------------------------------------------------------------
	use \PDO, \PDOException;

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Database as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Database as Components;

	// Check for existence of class
	if(!class_exists(__NAMESPACE__ . '\\Database')){

		// Database core for all database process and operatings
		class Database extends LaunchPad {

			// @property:protected ?\PDO $connection | default null
			protected static $connection = null;

			// @property:protected Boolean $debug_errors | default false
			protected static $debug_errors = false;

			// @property:protected Int $fetch_type | default PDO::FETCH_NAMED (11)
			protected static $fetch_type = PDO::FETCH_NAMED | 11;

			// @property:protected Int $stringify_fetches | default PDO::ATTR_STRINGIFY_FETCHES (17)
			protected static $stringify_fetches = PDO::ATTR_STRINGIFY_FETCHES | 17;

			// @property:protected Boolean $emulate_prepares | default true
			protected static $emulate_prepares = true;

			// @property:protected Int $error_mode | default PDO::ERRMODE_EXCEPTION (2)
			protected static $error_mode = PDO::ERRMODE_EXCEPTION | 2;

			// @property:protected Int $null_natural | default PDO::NULL_NATURAL (0)
			protected static $null_natural = PDO::NULL_NATURAL | 0;

			// @property:protected ?\PDO $current_process | default null
			protected static $current_process = null;

			// @property:protected Boolean $is_model | default false
			protected static $is_model = false;

			// @property:protected ?String $model_name | default null
			protected static $model_name = null;

			// @property:protected ?String $table | default null
			protected static $table = null;

			// @property:protected Int $initializes_count | default 0
			protected static $initializes_count = 0;

			// Valid operators for where ifs closures
			// @property:protected Array $valid_operators
			protected static $valid_operators = array('=', '!=', '<', '>', '<=', '>=', '<>', '+=', '-=', '*=', '/=', '&=', '%=', '^-=', '|*=');

			// @property:protected Int $limit | default 0
			protected static $limit = 0;

			// @property:protected Int $offset | default null
			protected static $offset = null;

			// @property:protected Array $order_by
			protected static $order_by = array();

			// @property:protected Array $asc_or_desc
			protected static $asc_or_desc = array();

			// @property:protected ?String $group_by | default null
			protected static $group_by = null;

			// @property:protected ?String $ai_column | default 'id'
			protected static $ai_column = 'id';

			// @property:protected ?String $unions | default null
			protected static $unions = null;

			// @property:protected Array $targets
			protected static $targets = array();

			// @property:protected Array $wheres
			protected static $wheres = array();

			// @property:protected Array $havings
			protected static $havings = array();

			// @property:protected ?String $table_prefixes | default null
			protected static $table_prefixes = null;

			// @property:protected ?String $table_suffixes | default null
			protected static $table_suffixes = null;

			// @property:protected ?String $column_prefixes | default null
			protected static $column_prefixes = null;

			// @property:protected ?String $column_suffixes | default null
			protected static $column_suffixes = null;

			// @property:protected Array $joins
			protected static $joins = array();

			// @property:protected Boolean $aggregate | default false
			protected static $aggregate = false;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Base
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Base;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Commands\Result
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Commands\Result;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Commands\RowCount
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Commands\RowCount;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Commands\Prepare
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Commands\Prepare;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Connect
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Connect;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\First_Initialize_Command
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\First_Initialize_Command;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Execute
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Execute;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Initialize
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Initialize;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Functions
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Functions;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\AI_Column
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Properties\AI_Column;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\GroupBy
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Properties\GroupBy;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Limit_Offset
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Properties\Limit_Offset;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Orders
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Properties\Orders;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Table
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Properties\Table;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Confine
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\QueryBuilder\Confine;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Delete
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\QueryBuilder\Delete;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Each
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\QueryBuilder\Each;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Exists
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\QueryBuilder\Exists;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Fetch
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\QueryBuilder\Fetches;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Fragments
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\QueryBuilder\Fragments;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Ins
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\QueryBuilder\Ins;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Joins
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\QueryBuilder\Joins;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Slices
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\QueryBuilder\Slices;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Update
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\QueryBuilder\Update;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Utils
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\QueryBuilder\Utils;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Unions
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\QueryBuilder\Unions;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Wheres
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\QueryBuilder\Wheres;

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			private static function Static(?Callable $closure = null) : \LaunchPad\Database {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\Database::class);

}

?>