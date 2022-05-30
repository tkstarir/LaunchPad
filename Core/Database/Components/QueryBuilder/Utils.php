<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Database\QueryBuilder\Utils as Utils
	// -----------------------------------------------------------------------------------------------------------------------

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Utils')){

		// Util methods for results of queries
		trait Utils {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Utils\First
			// -----------------------------------------------------------------------------------------------------------------------
			use Utils\First;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Utils\Last
			// -----------------------------------------------------------------------------------------------------------------------
			use Utils\Last;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Utils\Middle
			// -----------------------------------------------------------------------------------------------------------------------
			use Utils\Middle;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Utils\Search
			// -----------------------------------------------------------------------------------------------------------------------
			use Utils\Search;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\QueryBuilder\Utils\Value
			// -----------------------------------------------------------------------------------------------------------------------
			use Utils\Value;

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Utils::class);

}

?>