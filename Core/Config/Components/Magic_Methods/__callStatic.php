<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Config\Magic_Methods {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\__callStatic')){

		// "__callStatic" Magic method for getting data from config files
		trait __callStatic {

			// "__callStatic" For getting configs that you want configs fetch from there
			// This way is because of your custom configs files for when you want declare them and get them parameters in your project
			// @variable ?String $configuration_section | default null
			// @variable Array $configuration_parameters
			// @return ?Mixed
			public static function __callStatic(?String $configuration_section = null, Array $configuration_parameters = array()){
				$if_not_exists = isset($configuration_parameters[1]) ? $configuration_parameters[1] : null;
				$config_index = $configuration_parameters[0];
				$config_index = Framework\Cleaner::Trim($config_index);
				$configuration_section = Framework\Cleaner::Lower_Case($configuration_section);
				if(Framework\Validator::IsNullOrEmpty($config_index)){
					$if_not_exists = Validator::IsNullOrEmpty($if_not_exists) ? null : $if_not_exists;
					$output = $if_not_exists;
				}else{
					$selected_config = (isset(self::$configs[$configuration_section]) AND is_array(self::$configs[$configuration_section]) AND count(self::$configs[$configuration_section]) >= 1) ? array_keys(self::$configs[$configuration_section]) : array();
					$output = (is_array($selected_config) AND !in_array($config_index, $selected_config)) ? (Framework\Validator::IsNullOrEmpty($if_not_exists) ? null : $if_not_exists) : self::$configs[$configuration_section][$config_index];
				}
				foreach($configuration_parameters as $callable_key => $callable_value){
					Framework\Caller::Make($callable_value, $output);
				}
				return($output);
			}

		}

	}

	return(\LaunchPad\Components\Config\Magic_Methods\__callStatic::class);

}

?>