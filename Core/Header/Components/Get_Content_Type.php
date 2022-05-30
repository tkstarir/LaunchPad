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
	if(!trait_exists(__NAMESPACE__ . '\\Get_Content_Type')){

		// Content types of extensions that save into "Mimes" config
		trait Get_Content_Type {

			// Get content type of an extension by it Name
			// @variable String $extension | default 'none'
			// @return ?String
			public static function Get_Content_Type(?String $extension = 'none') : ?String {
				$mimes = Framework\Config::Mimes('Allowed_Mimes');
				$extension = Framework\Cleaner::Lower_Case($extension);
				$content_type = isset($mimes[$extension]) ? $mimes[$extension] : '';
				settype($content_type, 'String');
				return($content_type);
			}

		}

	}

	return(\LaunchPad\Components\Header\Get_Content_Type::class);

}

?>