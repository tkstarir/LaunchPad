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
	if(!trait_exists(__NAMESPACE__ . '\\Content_Disposition')){

		// Setting attachment for response
		trait Content_Disposition {

			// Setting disposition for a page in headers of response
			// @variable ?String $file_name | default null
			// @return Boolean
			public static function Content_Disposition(?String $file_name = null) : Bool {
				if(Framework\Validator::IsNullOrEmpty($file_name)){
					return false;
				}else{
					$file_name = Framework\Cleaner::Trim($file_name);
					header('Content-Disposition: attachment; filename=' . $file_name);
					return true;
				}
			}

		}

	}

	return(\LaunchPad\Components\Header\Content_Disposition::class);

}

?>