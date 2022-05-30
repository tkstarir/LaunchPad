<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Operating_System\OS_Data {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\OS_Fetch')){

		// Fetch details from operating system of client
		trait OS_Fetch {

			// Get all operating system details or a specified parameter (Name, Version, Architecture)
			// @variable ?Mixed $index | default null
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function OS_Fetch($index = null, ?Callable $closure = null){
				$operating_system = self::$operating_system;
				if(is_null($index) OR Framework\Validator::IsNullOrEmpty($index)){
					$parameter = $operating_system;
				}else{
					$parameter = Framework\Cleaner::Trim($index);
					$parameter = Framework\Cleaner::Lower_Case($parameter);
					$parameter = $parameter == 'arch' ? 'architecture' : $parameter;
					$parameter = (in_array($parameter, array('name', 'version', 'architecture', 'device')) AND isset($operating_system[$parameter])) ? $operating_system[$parameter] : false;
				}
				Framework\Caller::Make($index, $parameter);
				Framework\Caller::Make($closure, $parameter);
				return($parameter);
			}

			// Clone of "OS_Fetch" method
			// @variable ?Mixed $index | default null
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function OS($index = null, ?Callable $closure = null){
				return(self::OS_Fetch($index, $closure));
			}

		}

	}

	return(\LaunchPad\Components\Client\Operating_System\OS_Data\OS_Fetch::class);

}

?>