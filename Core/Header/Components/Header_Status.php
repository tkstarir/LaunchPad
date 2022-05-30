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
	if(!trait_exists(__NAMESPACE__ . '\\Header_Status')){

		// Setting header status by code
		trait Header_Status {

			// Setting header status by it code such as 404, 403 and ...
			// @variable Int $header_status | default 0
			// @return Boolean
			public static function Header_Status(Int $header_status = 0) : Bool {
				$header_status = self::Get_Header_Status($header_status);
				if(Framework\Validator::IsNullOrEmpty($header_status)){
					return false;
				}else{
					header($header_status);
					return true;
				}
			}

		}

	}

	return(\LaunchPad\Components\Header\Header_Status::class);

}

?>