<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Language\Language_Data {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Language_Fetch')){

		// Fetch details from language of client
		trait Language_Fetch {

			// Get all language details or a specified parameter (Locale, Language, Encoding)
			// @variable ?Mixed $index | default null
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Language_Fetch($index = null, ?Callable $closure = null){
				$language = self::$language;
				if(is_null($index) OR Framework\Validator::IsNullOrEmpty($index)){
					$parameter = $language;
				}else{
					$parameter = Framework\Cleaner::Trim($index);
					$parameter = Framework\Cleaner::Lower_Case($parameter);
					$parameter = (in_array($parameter, array('locale', 'language', 'encoding')) AND isset($language[$parameter])) ? $language[$parameter] : false;
				}
				Framework\Caller::Make($index, $parameter);
				Framework\Caller::Make($closure, $parameter);
				return($parameter);
			}

			// Clone of "Language_Fetch" method
			// @variable ?Mixed $index | default null
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Language($index = null, ?Callable $closure = null){
				return(self::Language_Fetch($index, $closure));
			}

		}

	}

	return(\LaunchPad\Components\Client\Language\Language_Data\Language_Fetch::class);

}

?>