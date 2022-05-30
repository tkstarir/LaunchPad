<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Database\Functions as Functions
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Database\Functions as Functions;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Functions')){

		// Efficient functions of sql and LaunchPad methods
		trait Functions {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Functions\Aggregates\Average
			// -----------------------------------------------------------------------------------------------------------------------
			use Functions\Aggregates\Average;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Functions\Aggregates\Count
			// -----------------------------------------------------------------------------------------------------------------------
			use Functions\Aggregates\Count;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Functions\Aggregates\Maximum
			// -----------------------------------------------------------------------------------------------------------------------
			use Functions\Aggregates\Maximum;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Functions\Aggregates\Minimum
			// -----------------------------------------------------------------------------------------------------------------------
			use Functions\Aggregates\Minimum;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Functions\Aggregates\Num
			// -----------------------------------------------------------------------------------------------------------------------
			use Functions\Aggregates\Num;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Functions\Aggregates\Sum
			// -----------------------------------------------------------------------------------------------------------------------
			use Functions\Aggregates\Sum;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Functions\Converters\Concat
			// -----------------------------------------------------------------------------------------------------------------------
			use Functions\Converters\Concat;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Database\Functions\Converters\Column
			// -----------------------------------------------------------------------------------------------------------------------
			use Functions\Converters\Column;
		}

	}

	return(\LaunchPad\Components\Database\Functions::class);

}

?>