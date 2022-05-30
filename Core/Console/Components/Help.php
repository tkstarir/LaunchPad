<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Console {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Help')){

		// Getting help block text in terminal (CountDown)
		trait Help {

			// Get command help block text, Based on LaunchPad formats and replace special characters of it
			// @variable ?String $help_block_address | default null
			// @variable ?String $extra_key | default null
			// @variable ?String $extra_value | default null
			// @variable ?String $syntax_error | default null
			// @return ?String
			public static function Help(?String $help_block_address = null, ?String $extra_key = null, ?String $extra_value = null, ?String $syntax_error = null) : ?String {
				$new_line = Framework\Config::Newline();
				$special_characters = Framework\Config::Core('Special_Characters');
				$help_block_address = self::$help_structures . $help_block_address;
				if(is_file($help_block_address) AND file_exists($help_block_address)){
					$syntax_error = Framework\Validator::IsNullOrEmpty($syntax_error) ? '' : Framework\Logger::Convert_To_Cli_Type($syntax_error);
					$help_block_text = file_get_contents($help_block_address);
					$help_block_text = str_replace(array($new_line, $special_characters['T']), array('', ''), $help_block_text);
					if(is_string($extra_key) AND is_string($extra_key)){
						if(!Framework\Validator::IsNullOrEmpty($extra_key) AND !Framework\Validator::IsNullOrEmpty($extra_key)){
							$help_block_text = str_replace(array($extra_key), array($extra_value), $help_block_text);
						}
					}
					$help_block_text = Framework\Logger::Convert_To_Cli_Type($help_block_text);
					$help_block_text = $syntax_error . $help_block_text;
				}else{
					$help_block_text = '';
				}
				settype($help_block_text, 'String');
				return($help_block_text);
			}

		}

	}

	return(\LaunchPad\Components\Console\Help::class);

}

?>