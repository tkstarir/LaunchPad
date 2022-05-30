<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Browser {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad\Components\Client\Browser\Browser_Check as Components
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad\Components\Client\Browser\Browser_Check as Components;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Browser_Check')){

		// Check and store name, version and frame of browser of client
		trait Browser_Check {

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsAmaya
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsAmaya;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsAndroid
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsAndroid;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsBlackBerry
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsBlackBerry;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsBlazer
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsBlazer;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsChrome
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsChrome;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsDolfin
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsDolfin;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsDragon
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsDragon;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsEdge
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsEdge;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsFirebird
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsFirebird;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsFirefox
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsFirefox;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsGaleon
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsGaleon;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsGSA
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsGSA;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsICab
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsICab;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsIceweasel
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsIceweasel;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsInternetExplorer
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsInternetExplorer;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsKonqueror
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsKonqueror;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsLynx
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsLynx;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsNetPositive
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsNetPositive;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsNetscape
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsNetscape;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsNokia
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsNokia;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsOmniWeb
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsOmniWeb;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsOpera
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsOpera;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsPhoenix
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsPhoenix;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsSafari
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsSafari;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsSamsung
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsSamsung;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsSeaMonkey
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsSeaMonkey;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsShiretoko
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsShiretoko;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsVivaldi
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsVivaldi;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsWebTv
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsWebTv;

			// -----------------------------------------------------------------------------------------------------------------------
			// | @component \LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsYandex
			// -----------------------------------------------------------------------------------------------------------------------
			use Components\Browser_Check_IsYandex;

		}

	}

	return(\LaunchPad\Components\Client\Browser\Browser_Check::class);

}

?>