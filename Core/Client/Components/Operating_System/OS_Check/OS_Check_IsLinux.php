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
	if(!trait_exists(__NAMESPACE__ . '\\OS_Check_IsLinux')){

		// Check if the client operating system is "Linux", parse it details and store they
		trait OS_Check_IsLinux {

			// Check client operating system is "Linux" or not
			// @no_variable
			// @return Boolean
			public static function OS_Check_IsLinux() : Bool {
				if(Framework\Validator::Contain(self::$agent, 'Linux', false, true)){
					if(Framework\Validator::Contain(self::$agent, 'Zorin', false, true)){
						self::$operating_system['name'] = 'Linux - Zorin OS';
					}elseif(Framework\Validator::Contain(self::$agent, 'Elementary', false, true)){
						self::$operating_system['name'] = 'Linux - Elementary OS';
					}elseif(Framework\Validator::Contain(self::$agent, 'Gentoo', false, true)){
						self::$operating_system['name'] = 'Linux - Gentoo';
					}elseif(Framework\Validator::Contain(self::$agent, 'Manjaro', false, true)){
						self::$operating_system['name'] = 'Linux - Manjaro';
					}elseif(Framework\Validator::Contain(self::$agent, 'OpenSUSE', false, true)){
						self::$operating_system['name'] = 'Linux - OpenSUSE';
					}elseif(Framework\Validator::Contain(self::$agent, 'Ubuntu', false, true)){
						self::$operating_system['name'] = 'Linux - Ubuntu';
					}elseif(Framework\Validator::Contain(self::$agent, 'Debian', false, true)){
						self::$operating_system['name'] = 'Linux - Debian';
					}elseif(Framework\Validator::Contain(self::$agent, 'Mint', false, true)){
						self::$operating_system['name'] = 'Linux - Mint';
					}elseif(Framework\Validator::Contain(self::$agent, 'Centos', false, true) OR Framework\Validator::Contain(self::$agent, 'Cent OS', false, true)){
						self::$operating_system['name'] = 'Linux - CentOS';
					}elseif(Framework\Validator::Contain(self::$agent, 'RedHat', false, true) OR Framework\Validator::Contain(self::$agent, 'Red Hat', false, true)){
						self::$operating_system['name'] = 'Linux - RedHat';
					}elseif(Framework\Validator::Contain(self::$agent, 'Fedora', false, true)){
						self::$operating_system['name'] = 'Linux - Fedora';
					}elseif(Framework\Validator::Contain(self::$agent, 'Mageia', false, true)){
						self::$operating_system['name'] = 'Linux - Mageia';
					}elseif(Framework\Validator::Contain(self::$agent, 'Mandriva', false, true)){
						self::$operating_system['name'] = 'Linux - Mandriva';
					}elseif(Framework\Validator::Contain(self::$agent, 'Arch', false, true)){
						self::$operating_system['name'] = 'Linux - Arch';
					}elseif(Framework\Validator::Contain(self::$agent, 'Slackware', false, true)){
						self::$operating_system['name'] = 'Linux - Slackware';
					}elseif(Framework\Validator::Contain(self::$agent, 'Puppy', false, true)){
						self::$operating_system['name'] = 'Linux - Puppy';
					}elseif(Framework\Validator::Contain(self::$agent, 'MX', false, true)){
						self::$operating_system['name'] = 'Linux - MX';
					}elseif(Framework\Validator::Contain(self::$agent, 'Solus', false, true)){
						self::$operating_system['name'] = 'Linux - Solus';
					}elseif(Framework\Validator::Contain(self::$agent, 'Deepin', false, true)){
						self::$operating_system['name'] = 'Linux - Deepin';
					}elseif(Framework\Validator::Contain(self::$agent, 'Tails', false, true)){
						self::$operating_system['name'] = 'Linux - Tails';
					}else{
						self::$operating_system['name'] = 'Linux';
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

	return(\LaunchPad\Components\Client\Operating_System\OS_Check\OS_Check_IsLinux::class);

}

?>