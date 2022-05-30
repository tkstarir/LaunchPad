<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Database\QueryBuilder\Joins as Joins
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Database\QueryBuilder\Joins as Joins;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Joins')){

		// Joins methods based on PDO
		trait Joins {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Joins\CrossJoin
			// -----------------------------------------------------------------------------------------------------------------------
			use Joins\CrossJoin;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Joins\Join
			// -----------------------------------------------------------------------------------------------------------------------
			use Joins\Join;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Joins\LeftJoin
			// -----------------------------------------------------------------------------------------------------------------------
			use Joins\LeftJoin;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Joins\RightJoin
			// -----------------------------------------------------------------------------------------------------------------------
			use Joins\RightJoin;
		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Joins::class);

}

?>