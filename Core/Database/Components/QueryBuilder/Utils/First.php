<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder\Utils {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\First')){

		// First method for getting first row in result
		trait First {

			// Get First Index of Your Query Result
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Collection
			public static function First(?Callable $closure = null){
				self::Prepare('*');
				$fetch = self::Result(true);
				$fetch = Framework\Cleaner::ToArray($fetch);
				$output = count($fetch) <= 0 ? false : current($fetch);
				$output !== false ? Framework\Caller::Make($closure, $output) : '';
				return($output);
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Utils\First::class);

}

?>