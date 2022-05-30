<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Browser\Browser_Check {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Browser_Check_IsInternetExplorer')){

		// Check if the client browser is "Internet Explorer (IE)", parse it details and store they
		trait Browser_Check_IsInternetExplorer {

			// Check client browser is "Internet Explorer (IE)" or not
			// @no_variable
			// @return Boolean
			public static function Browser_Check_IsInternetExplorer() : Bool {
				if(Framework\Validator::ContainRegex(self::$agent, 'MSIE ([\d\.]*)', false, true) AND $version = Framework\Validator::ContainRegex(self::$agent, 'Trident\/(7.0|6.0|5.0|4.0)', false, true)){
					self::$browser['name'] = 'Internet Explorer (IE)';
					if(isset($version[1])){
						switch($version[1]){
							case('7.0'): case(7.0): case(7): self::$browser['version'] = '11.0'; break;
							case('6.0'): case(6.0): case(6): self::$browser['version'] = '10.0'; break;
							case('5.0'): case(5.0): case(5): self::$browser['version'] = '9.0'; break;
							case('4.0'): case(4.0): case(4): self::$browser['version'] = '8.0'; break;
							default: self::$browser['version'] = self::$browser_version_unknown; break;
						}
					}else{
						self::$browser['version'] = self::$browser_version_unknown;
					}
					self::$browser['frames'] = self::$browser_frame_default;
					return true;
				}elseif(Framework\Validator::Contain(self::$agent, 'microsoft internet explorer', false, true)){
					self::$browser['name'] = 'Internet Explorer (IE)';
					self::$browser['version'] = Framework\Validator::ContainRegex(self::$agent, '308|425|426|474|0b1', null, true) ? '1.5' : '1.0';
					self::$browser['frames'] = self::$browser_frame_default;
					return true;
				}elseif(Framework\Validator::Contain(self::$agent, 'MSIE', false, true) AND !Framework\Validator::Contain(self::$agent, 'Opera', false, true)){
					self::$browser['name'] = 'Internet Explorer (IE)';
					if($version = Framework\Validator::ContainRegex(self::$agent, 'MSIE ([\d\.]*)', null, true)){
						self::$browser['version'] = isset($version[1]) ? $version[1] : self::$browser_version_unknown;
					}else{
						self::$browser['version'] = self::$browser_version_unknown;
					}
					self::$browser['frames'] = self::$browser_frame_default;
					return true;
				}elseif(Framework\Validator::Contain(self::$agent, 'Trident', false, true)){
					self::$browser['name'] = 'Internet Explorer (IE)';
					if($version = Framework\Validator::ContainRegex(self::$agent, 'rv\:([\d\.]*)', null, true)){
						self::$browser['version'] = isset($version[1]) ? $version[1] : self::$browser_version_unknown;
					}else{
						self::$browser['version'] = self::$browser_version_unknown;
					}
					self::$browser['frames'] = self::$browser_frame_default;
					return true;
				}elseif(Framework\Validator::Contain(self::$agent, 'MSPIE', false, true)){
					self::$browser['name'] = 'Pocket Internet Explorer (PIE)';
					if($version = Framework\Validator::ContainRegex(self::$agent, 'MSPIE ([\d\.]*)', null, true)){
						self::$browser['version'] = isset($version[1]) ? $version[1] : self::$browser_version_unknown;
					}else{
						self::$browser['version'] = self::$browser_version_unknown;
					}
					self::$browser['frames'] = self::$browser_frame_default;
					return true;
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Client\Browser\Browser_Check\Browser_Check_IsInternetExplorer::class);

}

?>