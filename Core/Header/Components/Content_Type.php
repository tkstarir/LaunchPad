<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Header {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Content_Type')){

		// Setting content type
		trait Content_Type {

			// Setting content type for a page or controller
			// @variable ?String $content_type | default null
			// @return Boolean
			public static function Content_Type(?String $content_type = null) : Bool {
				$content_type = self::Get_Content_Type($content_type);
				if($content_type == 'invalid_content_type'){
					return false;
				}else{
					header('Content-Type: ' . $content_type . '; Charset=' . self::$charset);
					return true;
				}
			}

		}

	}

	return(\LaunchPad\Components\Header\Content_Type::class);

}

?>