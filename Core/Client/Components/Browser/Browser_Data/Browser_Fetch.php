<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Browser\Browser_Data {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Browser_Fetch')){

		// Fetch details from browser of client
		trait Browser_Fetch {

			// Get all browser details or a specified parameter (Name, Version, Frame)
			// @variable ?Mixed $index | default null
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Browser_Fetch($index = null, ?Callable $closure = null){
				$browser = self::$browser;
				if(is_null($index) OR Framework\Validator::IsNullOrEmpty($index)){
					$parameter = $browser;
				}else{
					$parameter = Framework\Cleaner::Trim($index);
					$parameter = Framework\Cleaner::Lower_Case($parameter);
					$parameter = (in_array($parameter, array('name', 'version', 'frame')) AND isset($browser[$parameter])) ? $browser[$parameter] : false;
				}
				Framework\Caller::Make($index, $parameter);
				Framework\Caller::Make($closure, $parameter);
				return($parameter);
			}

			// Clone of "Browser_Fetch" method
			// @variable ?Mixed $index | default null
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Browser($index = null, ?Callable $closure = null){
				return(self::Browser_Fetch($index, $closure));
			}

		}

	}

	return(\LaunchPad\Components\Client\Browser\Browser_Data\Browser_Fetch::class);

}

?>