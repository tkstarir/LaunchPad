<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Header {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Go')){

		// Redirect helper
		trait Go {

			// Go or redirect method with redirect type to specified 301 or 302 type
			// @variable ?String $url | default null
			// @variable Int $redirect_type | default 0
			// @return Boolean
			public static function Go(?String $url = null, Int $redirect_type = 0) : Bool {
				$url = Framework\Cleaner::Trim($url);
				if(Framework\Validator::IsNullOrEmpty($redirect_type)){
					header('Location: ' . $url);
					return true;
				}elseif($redirect_type == 301){
					header('Location: ' . $url, true, 301);
					return true;
				}elseif($redirect_type == 302){
					header('Location: ' . $url, true, 302);
					return true;
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Header\Go::class);

}

?>