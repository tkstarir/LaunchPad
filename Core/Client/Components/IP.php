<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Client\IP as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Client\IP as Components;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\IP')){

		// IP components for check and set client ips, proxy ips, forwarded ips and ...
		trait IP {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\IP\IP_Data
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\IP_Data;

		}

	}

	return(\LaunchPad\Components\Client\IP::class);

}

?>