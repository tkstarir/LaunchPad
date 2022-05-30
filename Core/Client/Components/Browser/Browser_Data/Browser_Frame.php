<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Browser\Browser_Data {

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Browser_Frame')){

		// Fetch frame of browser from details of client
		trait Browser_Frame {

			// Getting frame status and get frame name of browser
			// @variable ?Callable $closure | default null
			// @return ?Mixed
			public static function Browser_Frame(?Callable $closure = null){
				return(self::Browser_Fetch('frame', $closure));
			}

		}

	}

	return(\LaunchPad\Components\Client\Browser\Browser_Data\Browser_Frame::class);

}

?>