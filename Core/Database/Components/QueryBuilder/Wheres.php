<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres as Wheres
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Database\QueryBuilder\Wheres as Wheres;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Wheres')){

		// Wheres method for setting where ifs in your queries. you have access to all of this methods in models
		trait Wheres {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres\BetweenWhere
			// -----------------------------------------------------------------------------------------------------------------------
			use Wheres\BetweenWhere;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres\OrBetweenWhere
			// -----------------------------------------------------------------------------------------------------------------------
			use Wheres\OrBetweenWhere;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres\OrWhere
			// -----------------------------------------------------------------------------------------------------------------------
			use Wheres\OrWhere;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres\OrWhereEmpty
			// -----------------------------------------------------------------------------------------------------------------------
			use Wheres\OrWhereEmpty;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres\OrWhereLike
			// -----------------------------------------------------------------------------------------------------------------------
			use Wheres\OrWhereLike;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres\OrWhereNotEmpty
			// -----------------------------------------------------------------------------------------------------------------------
			use Wheres\OrWhereNotEmpty;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres\OrWhereNotLike
			// -----------------------------------------------------------------------------------------------------------------------
			use Wheres\OrWhereNotLike;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres\OrWhereNotNull
			// -----------------------------------------------------------------------------------------------------------------------
			use Wheres\OrWhereNotNull;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres\OrWhereNull
			// -----------------------------------------------------------------------------------------------------------------------
			use Wheres\OrWhereNull;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres\Where
			// -----------------------------------------------------------------------------------------------------------------------
			use Wheres\Where;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres\WhereEmpty
			// -----------------------------------------------------------------------------------------------------------------------
			use Wheres\WhereEmpty;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres\WhereLike
			// -----------------------------------------------------------------------------------------------------------------------
			use Wheres\WhereLike;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres\WhereNotEmpty
			// -----------------------------------------------------------------------------------------------------------------------
			use Wheres\WhereNotEmpty;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres\WhereNotLike
			// -----------------------------------------------------------------------------------------------------------------------
			use Wheres\WhereNotLike;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres\WhereNotNull
			// -----------------------------------------------------------------------------------------------------------------------
			use Wheres\WhereNotNull;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Wheres\WhereNull
			// -----------------------------------------------------------------------------------------------------------------------
			use Wheres\WhereNull;
		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Wheres::class);

}

?>