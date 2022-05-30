<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Header {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Content_Length')){

		// Setting response length
		trait Content_Length {

			// Setting content length for page in headers
			// @variable Float $length | default 0
			// @return Boolean
			public static function Content_Length(Float $length = 0) : Bool {
				if(!empty($length) AND (is_double($length) OR is_float($length) OR is_numeric($length)) AND $length >= 1){
					header('Content-Length: ' . $length);
					return true;
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Header\Content_Length::class);

}

?>