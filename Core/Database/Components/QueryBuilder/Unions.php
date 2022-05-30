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
	if(!trait_exists(__NAMESPACE__ . '\\Unions')){

		// Union and union all methods based on PDO
		trait Unions {

			// Insert current query statements into an union area and clear it for new query
			// @variable ?String $select | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			public static function Union(?String $select = null, ?Callable $closure = null) : \LaunchPad\Database {
				$database_object = self::Static();
				$select = Framework\Validator::IsNullOrEmpty($select) ? '*' : $select;
				$select = self::Initialize('SELECT', $select);
				$select['query'] = 'UNION ' . $select['query'];
				self::$unions = $select['query'];
				Framework\Caller::Make($closure, $database_object);
				return($database_object);
			}

			// Insert current query statements into an union all area and clear it for new query
			// @variable ?String $select | default null
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Database
			public static function UnionAll(?String $select = null, ?Callable $closure = null) : \LaunchPad\Database {
				$database_object = self::Static();
				$select = Framework\Validator::IsNullOrEmpty($select) ? '*' : $select;
				$select = self::Initialize('SELECT', $select);
				$select['query'] = 'UNION ALL ' . $select['query'];
				self::$unions = $select['query'];
				Framework\Caller::Make($closure, $database_object);
				return($database_object);
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Unions::class);

}

?>