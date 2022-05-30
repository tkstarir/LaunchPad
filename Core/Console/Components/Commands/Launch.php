<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Console\Commands {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Launch')){

		// Launch command and it options for "CountDown" application
		trait Launch {

			// @property:protected Array $launch_valid_options_types
			protected static $launch_valid_options_types = array('--hostname' => 'Hostname', '--http-port' => 'Port', '--target' => 'Target');

			// @property:protected String $launch_command_help | default '/vendor/tkstarir/Structures/Console/Commands/Launch.TK'
			protected static $launch_command_help = 'Commands' . DS . 'Launch.TK';

			// Launch LaunchPad on custom/default host and port
			// @variable Array $options
			// @return Boolean
			public static function Launch(Array $options = array()) : Bool {
				if(self::Launch_Options_Process($options)){
					$command = Framework\System::Built_Command();
					$server = Framework\System::Get_Hostname() . ':' . Framework\System::Get_Port();
					$target = Framework\System::Get_Target();
					Framework\Logger::Cli_Newline(true);
					Framework\Logger::Info('Dev-Server Launch Into: "' . $target . '" at "http://' . $server . '"', true);
					Framework\Logger::Cli_Newline(true);
					exec($command, $output, $returns);
					return true;
				}else{
					return false;
				}
			}

			// Process custom options that entered by you in terminal
			// @variable Array $options
			// @return Boolean
			protected static function Launch_Options_Process(Array $options = array()) : Bool {
				$output = false;
				$new_line = Framework\Config::Newline();
				$special_characters = Framework\Config::Core('Special_Characters');
				foreach($options as $option){
					if(Framework\Cleaner::Lower_Case($option) == 'launch'){
						$output = true;
						continue;
					}else{
						if(!Framework\Validator::IsNullOrEmpty($option)){
							if(in_array($option, self::$help_options)){
								$launch_command_help = self::Help(self::$launch_command_help);
								Framework\Logger::Info($launch_command_help, true);
								$output = false;
								break;
							}else{
								if(strstr($option, '=')){
									$option = explode('=', $option);
									$option_type = current($option);
									$option_value = end($option);
									if(!in_array($option_type, array_keys(self::$launch_valid_options_types))){
										Framework\Logger::Error($new_line . 'Invalid Option for Launch Command "' . $option_type . '"' . $new_line . $new_line . 'Type "php countdown launch help"', true);
										$output = false;
										break;
									}else{
										$option_method = self::$launch_valid_options_types[$option_type];
										$output = Framework\System::$option_method($option_value);
										if($output == true){
											continue;
										}else{
											break;
										}
									}
								}else{
									Framework\Logger::Error($new_line . 'Invalid Option for Launch Command "' . $option . '"' . $new_line . $new_line . 'Type "php countdown launch help"', true);
									$output = false;
									break;
								}
							}
						}else{
							$output = true;
							continue;
						}
					}
				}
				return($output);
			}

		}

	}

	return(\LaunchPad\Components\Console\Commands\Launch::class);

}

?>