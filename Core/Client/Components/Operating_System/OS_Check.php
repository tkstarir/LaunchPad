<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Operating_System {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Client\Operating_System\OS_Check as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Client\Operating_System\OS_Check as Components;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\OS_Check')){

		// Check and store name, version and architecture of operating system of client
		trait OS_Check {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsAndroid
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsAndroid;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsBada
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsBada;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsBeOS
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsBeOS;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsBlackBerry
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsBlackBerry;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsChromeOS
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsChromeOS;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsFreeBSD
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsFreeBSD;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsIOS
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsIOS;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsKaiOS
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsKaiOS;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsLinux
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsLinux;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsNetBSD
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsNetBSD;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsNokia
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsNokia;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsOpenBSD
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsOpenBSD;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsOpenSolaris
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsOpenSolaris;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsOS2
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsOS2;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsOSF1
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsOSF1;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsOSX
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsOSX;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsPalmOS
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsPalmOS;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsRemixOS
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsRemixOS;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsSunOS
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsSunOS;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsSymbianOS
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsSymbianOS;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsWatchOS
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsWatchOS;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsWindows
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsWindows;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsWindowsPhone
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\OS_Check_IsWindowsPhone;

		}

	}

	return(\LaunchPad\Components\Client\Operating_System\OS_Check::class);

}

?>