<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client\Operating_System\OS_Check {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\OS_Check_IsChromeOS')){

		// Check if the client operating system is "Chrome OS", parse it details and store they
		trait OS_Check_IsChromeOS {

			// Check client operating system is "Chrome OS" or not
			// @no_variable
			// @return Boolean
			public static function OS_Check_IsChromeOS() : Bool {
				if(Framework\Validator::Contain(self::$agent, 'CrOS', false, true)){
					self::$operating_system['name'] = 'Chrome OS';
					if($version = Framework\Validator::ContainRegex(self::$agent, 'Chrome\/([\d\.]*)', null, true)){
						if(isset($version[1]) AND !Framework\Validator::IsNullOrEmpty($version[1])){
							if(Framework\Validator::Contain($version[1], '.', false, true)){
								$version_explode = explode('.', $version[1]);
								$version = $version_explode[0];
								$version = (isset($version_explode[1]) AND (!Framework\Validator::IsNullOrEmpty($version_explode[1]) OR $version_explode[1] === 0 OR $version_explode[1] === '0')) ? ($version . '.' . $version_explode[1]) : $version;
								$version = (isset($version_explode[2]) AND (!Framework\Validator::IsNullOrEmpty($version_explode[2]) OR $version_explode[2] === 0 OR $version_explode[2] === '0')) ? ($version . '.' . mb_substr($version_explode[2], 0, 2, self::$charset)) : $version;
								self::$operating_system['version'] = $version;
							}
						}
					}
					if(Framework\Validator::Contain(self::$agent, 'x64', false, true) OR Framework\Validator::Contain(self::$agent, 'x86_64', false, true) OR Framework\Validator::Contain(self::$agent, 'WOW64', false, true)){
						self::$operating_system['architecture'] = 'x64';
					}elseif(Framework\Validator::Contain(self::$agent, 'x86', false, true) OR Framework\Validator::Contain(self::$agent, 'x32', false, true) OR Framework\Validator::Contain(self::$agent, 'WOW32', false, true)){
						self::$operating_system['architecture'] = 'x32';
					}
					self::$operating_system['device'] = 'Desktop';
					return true;
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsChromeOS::class);

}

?>