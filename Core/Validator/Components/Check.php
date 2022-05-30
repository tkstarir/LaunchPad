<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Validator {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Validator\Check as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Validator\Check as Components;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Check')){

		// Check and validate data
		trait Check {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Validator\Check\Base64
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Base64;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Validator\Check\Between
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Between;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Validator\Check\Boolean
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Boolean;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Validator\Check\Contain
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Contain;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Validator\Check\ContainRegex
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\ContainRegex;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Validator\Check\Hash
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Hash;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Validator\Check\IP
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\IP;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Validator\Check\IsNullOrEmpty
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\IsNullOrEmpty;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Validator\Check\JSON
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\JSON;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Validator\Check\Serialize
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Serialize;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Validator\Check\Object_Or_Array
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Object_Or_Array;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Validator\Check\Url
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Url;

		}

	}

	return(\LaunchPad\Components\Validator\Check::class);

}

?>