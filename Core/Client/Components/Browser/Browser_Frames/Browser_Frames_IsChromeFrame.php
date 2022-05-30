<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Browser\Browser_Frames {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Browser_Frames_IsChromeFrame')){

		// Check if the client browser run into "Chrome Frame", set frame status to it
		trait Browser_Frames_IsChromeFrame {

			// Check client browser run into "Chrome Frame" or not
			// @no_variable
			// @return Boolean
			public static function Browser_Frames_IsChromeFrame() : Bool {
				if(Framework\Validator::Contain(self::$agent, 'chromeframe', false, true)){
					self::$browser['frames'] = 'Chrome Frame';
					return true;
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Client\Browser\Browser_Frames\Browser_Frames_IsChromeFrame::class);

}

?>