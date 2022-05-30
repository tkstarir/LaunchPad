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
	if(!trait_exists(__NAMESPACE__ . '\\Last')){

		// Last method for getting last row in result 
		trait Last {

			// Get last index of your query result
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Collection
			public static function Last(?Callable $closure = null){
				self::Prepare('*');
				$fetch = self::Result(true);
				$fetch = Framework\Cleaner::ToArray($fetch);
				$output = count($fetch) <= 0 ? false : end($fetch);
				$output !== false ? Framework\Caller::Make($closure, $output) : '';
				return($output);
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Utils\Last::class);

}

?>