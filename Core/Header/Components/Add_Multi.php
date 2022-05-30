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
	if(!trait_exists(__NAMESPACE__ . '\\Add_Multi')){

		// Add multiple headers to reponse
		trait Add_Multi {

			// Add multi custom headers to request response
			// @variable Array $headers;
			// @return Boolean
			public static function Add_Multi(Array $headers) : Bool {
				if(count($headers) <= 0){
					return false;
				}else{
					$add_headers_status = false;
					$headers = Framework\Cleaner::Trim($headers);
					foreach($headers as $header_name => $header_value){
						if(self::Add($header_name, $header_value)){
							$add_headers_status = true;
							continue;
						}else{
							$add_headers_status = false;
							break;
						}
					}
					return($add_headers_status);
				}
			}

		}

	}

	return(\LaunchPad\Components\Header\Add_Multi::class);

}

?>