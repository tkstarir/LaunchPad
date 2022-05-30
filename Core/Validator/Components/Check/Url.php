<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Validator\Check {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Url')){

		// Validation of inputs and contents to see that them had a valid url format or not
		trait Url {

			// Check your input(s) are a valid url or not
			// @variable Mixed $urls | default null
			// @return Boolean
			public static function Url($url = null) : Bool {
				if(is_array($url) OR is_object($url)){
					$output = true;
					foreach($url as $key => $value){
						if(!self::Url($value)){
							$output = false;
							break;
						}else{
							$output = true;
							continue;
						}
					}
					settype($output, 'Boolean');
					return($output);
				}else{
					$url = Framework\Cleaner::Trim($url);
					if(mb_substr($url, 0, 7, self::$charset) == 'http://' OR mb_substr($url, 0, 8, self::$charset) == 'https://'){
						$exploded_url = explode('.', $url);
						if(count($exploded_url) == 2 OR count($exploded_url) == 3){
							if(filter_var($url, FILTER_VALIDATE_URL)){
								return true;
							}else{
								return false;
							}
						}else{
							return false;
						}
					}else{
						return false;
					}
				}
			}

		}

	}

	return(\LaunchPad\Components\Validator\Check\Url::class);

}

?>