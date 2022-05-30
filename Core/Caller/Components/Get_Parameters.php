<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Caller {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @library \ReflectionFunction
	// -----------------------------------------------------------------------------------------------------------------------
	use \ReflectionFunction;

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Get_Parameters')){

		// Pass your closure into a ReflectionFunction class and get it parameters
		trait Get_Parameters {

			// Get your closure parameters and return them as array
			// @variable ?Callable $closure | default null
			// @return Array
			protected static function Get_Parameters(?Callable $closure = null) : Array {
				$reflection_function = new ReflectionFunction($closure);
				$parameters = $reflection_function->getParameters();
				$parameters = Framework\Cleaner::ToArray($parameters);
				return($parameters);
			}

		}

	}

	return(\LaunchPad\Components\Caller\Get_Parameters::class);

}

?>