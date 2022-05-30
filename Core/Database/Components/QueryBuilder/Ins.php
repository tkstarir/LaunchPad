<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Database\QueryBuilder\Ins as Ins
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Database\QueryBuilder\Ins as Ins;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Ins')){

		// IN methods for query (IN, NOT IN)
		trait Ins {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Ins\In
			// -----------------------------------------------------------------------------------------------------------------------
			use Ins\In;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Ins\NotIn
			// -----------------------------------------------------------------------------------------------------------------------
			use Ins\NotIn;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Ins\OrIn
			// -----------------------------------------------------------------------------------------------------------------------
			use Ins\OrIn;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Ins\OrNotIn
			// -----------------------------------------------------------------------------------------------------------------------
			use Ins\OrNotIn;
		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Ins::class);

}

?>