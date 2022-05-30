<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\System\Built_in_Web {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\PHP_Binary')){

		// PHP binary trait for getting binary location of php software
		trait PHP_Binary {

			// Get PHP binary file that located in PHP application folder
			// @no_variable
			// @return ?String
			public static function PHP_Binary() : ?String {
				$binary = null;
				$paths = getenv('PATH');
				if(empty($paths)){
					return($binary);
				}else{
					$paths = explode(PS, $paths);
					foreach($paths as $path){
						if(strpos($path, 'php.exe') !== false AND is_readable($path) AND self::IsWindows()){
							$binary = $path;
							break;
						}else{
							$extension = self::IsWindows() ? '.exe' : '';
							$temp_binary = $path . DS . 'php' . $extension;
							if(is_readable($temp_binary) AND is_file($temp_binary)){
								$temp_binary = str_ireplace(array('/', '\/', '\\'), array('/', '/', '/'), $temp_binary);
								$binary = Framework\Cleaner::Slash_Remover($temp_binary);
								break;
							}else{
								continue;
							}
						}
					}
				}
				return($binary);
			}

		}

	}

	return(\LaunchPad\Components\System\Built_in_Web\PHP_Binary::class);

}

?>