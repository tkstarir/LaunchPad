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
	if(!trait_exists(__NAMESPACE__ . '\\OS_Check_IsWindows')){

		// Check if the client operating system is "Windows", parse it details and store they
		trait OS_Check_IsWindows {

			// Check client operating system is "Windows" or not
			// @no_variable
			// @return Boolean
			public static function OS_Check_IsWindows() : Bool {
				if(Framework\Validator::Contain(self::$agent, 'Windows NT', false, true)){
					self::$operating_system['name'] = 'Windows';
					if($version = Framework\Validator::ContainRegex(self::$agent, 'Windows NT (.*?);', null, true)){
						$version = $version[1];
						switch($version){
							case('6.3'): case(6.3): self::$operating_system['version'] = '8.1'; break;
							case('6.2'): case(6.2): self::$operating_system['version'] = '8'; break;
							case('6.1'): case(6.1): self::$operating_system['version'] = '7'; break;
							case('6.0'): case('6'): case(6): self::$operating_system['version'] = 'Vista'; break;
							case('5.3'): case('5.2'): case('5.1'): case(5.3): case(5.2): case(5.1): self::$operating_system['version'] = 'XP'; break;
							case('5.01'): case('5.2'): case(5.01): case(5): self::$operating_system['version'] = '2000'; break;
							case('4.0'): case(4): self::$operating_system['version'] = 'NT 4.0'; break;
							default: $version >= 10 ? (self::$operating_system['version'] = '10') : '';
						}
					}
					if(Framework\Validator::Contain(self::$agent, 'x64', false, true) OR Framework\Validator::Contain(self::$agent, 'x86_64', false, true) OR Framework\Validator::Contain(self::$agent, 'WOW64', false, true)){
						self::$operating_system['architecture'] = 'x64';
					}elseif(Framework\Validator::Contain(self::$agent, 'x86', false, true) OR Framework\Validator::Contain(self::$agent, 'x32', false, true) OR Framework\Validator::Contain(self::$agent, 'WOW32', false, true)){
						self::$operating_system['architecture'] = 'x32';
					}
					self::$operating_system['device'] = 'Desktop';
					return true;
				}elseif($operating_system = Framework\Validator::ContainRegex(self::$agent, '(Win 9x 4.90|Windows (ME|98|95|CE))', null, true)){
					self::$operating_system['name'] = 'Windows';
					switch(end($operating_system)){
						case('Win 9x 4.90'): case('ME'): case('me'): self::$operating_system['version'] = 'ME'; break;
						case('98'): case(98): self::$operating_system['version'] = '98'; break;
						case('95'): case(95): self::$operating_system['version'] = '95'; break;
						case('CE'): case('ce'): self::$operating_system['version'] = 'CE'; break;
					}
					self::$operating_system['version'] = $version;
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

	return(\LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsWindows::class);

}

?>