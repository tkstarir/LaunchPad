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
	if(!trait_exists(__NAMESPACE__ . '\\Create')){

		// Create command and it options for "CountDown" application
		trait Create {

			// @property:protected Array $create_valid_types
			protected static $create_valid_types = array('config' => 'Config', 'model' => 'Model', 'view' => 'View', 'controller' => 'Controller', 'router' => 'Router', 'core' => 'Core', 'component' => 'Component', 'event' => 'Event', 'presenter' => 'Presenter', 'provider' => 'Provider');

			// @property:protected Array $create_valid_types
			protected static $create_valid_types_help = array('config' => '        Custom Config File', 'model' => '         New Controller in Patterns (HMVCR "M" Pattern)', 'view' => '          New View in Patterns (HMVCR "V" Pattern)', 'controller' => '    New Controller in Patterns (HMVCR "C" Pattern)', 'router' => '        New Controller in Patterns (HMVCR "R" Pattern)', 'core' => '          New Custom Core Library', 'component' => '     New Component for Core Libraries (Trait)', 'event' => '         New Event Listener', 'presenter' => '     New Presenter in Patterns', 'provider' => '      New Provider For LaunchPad Bootstrapping');

			// @property:protected Array $create_valid_types_directories
			protected static $create_valid_types_directories = array('config' => APP_PATH . APP_Directory . DS . 'Config', 'controller' => APP_PATH . APP_Directory . DS . 'Patterns' . DS . 'Controllers', 'core' => APP_PATH . APP_Directory . DS . 'Core', 'component' => APP_PATH . APP_Directory . DS . 'Core');

			// @property:protected String $create_command_help | default '/vendor/tkstarir/Structures/Console/Commands/Create.TK'
			protected static $create_command_help = 'Commands' . DS . 'Create.TK';

			// Scrutiny and command processing
			// @variable Array $options
			// @return Boolean
			public static function Create(Array $options = array()) : Bool {
				if(self::Create_Options_Process($options)){
					return true;
				}else{
					return false;
				}
			}

			// Process custom options that entered by you in terminal
			// @variable Array $options
			// @return Boolean
			protected static function Create_Options_Process(Array $options = array()) : Bool {
				$output = false;
				$new_line = Framework\Config::Newline();
				$special_characters = Framework\Config::Core('Special_Characters');
				if(count($options) == 0 OR count($options) == 1 OR (count($options) != 3 AND count($options) != 4) OR in_array('-h', $options) OR in_array('--help', $options) OR in_array('help', $options)){
					$syntax_error = ((count($options) == 0 OR (count($options) != 3 AND count($options) != 4)) AND !in_array('-h', $options) AND !in_array('--help', $options) AND !in_array('help', $options)) ? '{{Line}}** Invalid Syntax for Create Command. Please Read Help Documention **{{Line}}' : '';
					$create_valid_types_help = '';
					foreach(self::$create_valid_types_help as $type => $description){
						$create_valid_types_help = $create_valid_types_help . '{{Tab}}';
						$create_valid_types_help = $create_valid_types_help . $type . ' ' . $description;
						$create_valid_types_help = $create_valid_types_help . '{{Line}}';
					}
					$create_command_help = self::Help(self::$create_command_help, '{{Valid_Types}}', $create_valid_types_help, $syntax_error);
					Framework\Logger::Info($create_command_help, true);
					$output = false;
				}else{
					if(!in_array($options[1], array_keys(self::$create_valid_types))){
						Framework\Logger::Error($new_line . 'Invalid Type for Create' . $new_line . $new_line . 'Type "php countdown create --help"', true);
						$output = false;
					}else{
						$options[2] = strpos($options[2], '--name=') !== false ? preg_replace('/\-\-name\=/imu', '', $options[2], 1) : $options[2];
						if(!isset($options[2]) OR Framework\Validator::IsNullOrEmpty($options[2]) OR preg_match('/[^a-zA-Z0-9-_.\/ ]/imu', $options[2])){
							Framework\Logger::Error($new_line . 'Invalid Syntax for Create Command' . $new_line . $new_line . 'Enter a Valid Name for Creation' . $new_line . $new_line . 'Names to Create Can Only Accept this RexEXP Range: "a-zA-Z0-9-_.\/ "', true);
							$output = false;
						}else{
							$file_target = self::$create_valid_types_directories[$options[1]];
							if(!is_dir($file_target)){
								Framework\Logger::Error($new_line . 'Create Failure !' . $new_line . $new_line . 'File Directory Not Found' . $new_line . $new_line . $file_target, true);
								$output = false;
							}else{
								if(file_exists($file_target . DS . $options[2] . '.php') AND !in_array('--rewrite', $options)){
									$create_type = self::$create_valid_types[$options[1]];
									$create_type = ucfirst($create_type);
									Framework\Logger::Error($new_line . 'Create Failure !' . $new_line . $new_line . '"' . $options[2] . '.php' . '" ' . $create_type . ' Exists. Path: ' . $new_line . $special_characters['T'] . $file_target . DS . $options[2] . '.php' . $new_line . $new_line . 'Add --rewrite Option for Re-Write New Contents on it', true);
									$output = false;
								}elseif(!file_exists($file_target . DS . $options[2] . '.php') AND in_array('--rewrite', $options)){
									$create_type = self::$create_valid_types[$options[1]];
									$create_type = ucfirst($create_type);
									Framework\Logger::Error($new_line . 'Create Failure !' . $new_line . $new_line . '"' . $options[2] . '.php' . '" ' . $create_type . ' not Exists so You Can\'t Re-Write it' . $new_line . $new_line . 'Please Create it first', true);
									$output = false;
								}else{
									$sample_file = self::$create_valid_types[$options[1]] . '.TK';
									$sample_file_location = Framework_Location . Framework_Directory . DS . 'Structures' . DS . 'Console' . DS . 'Prototypes' . DS . $sample_file;
									$content_file = file_get_contents($sample_file_location);
									$content_file = str_replace(array('{{Version}}'), array(Version), $content_file);
									$content_file = str_replace(array('{{Name}}'), array($options[2]), $content_file);
									$content_file = str_replace(array('{{Namespace}}'), array(Framework\Config::Core('Namespace')), $content_file);
									if($options[1] == 'core'){
										$file_target = $file_target . DS . $options[2];
										if(file_exists($file_target) AND is_dir($file_target) AND !in_array('--rewrite', $options)){
											$create_type = self::$create_valid_types[$options[1]];
											$create_type = ucfirst($create_type);
											Framework\Logger::Error($new_line . 'Create Failure !' . $new_line . $new_line . '"' . $options[2] . '.php' . '" Core Exists. Path: ' . $new_line . $special_characters['T'] . $file_target . DS . $options[2] . '.php' . $new_line . $new_line . 'Add --rewrite Option for Re-Write New Contents on it', true);
											$output = false;
										}elseif(!file_exists($file_target . DS . $options[2] . '.php') AND in_array('--rewrite', $options)){
											$create_type = self::$create_valid_types[$options[1]];
											$create_type = ucfirst($create_type);
											Framework\Logger::Error($new_line . 'Create Failure !' . $new_line . $new_line . '"' . $options[2] . '.php' . '" Core not Exists so You Can\'t Re-Write it' . $new_line . $new_line . 'Please Create it first', true);
											$output = false;
										}else{
											!is_dir($file_target) ? mkdir($file_target) : '';
											$file_target_to_write = $file_target . DS . $options[2] . '.php';
											$output = true;
										}
									}elseif($options[1] == 'component'){
										$component_name = $options[2];
										$component_name = explode('/', $component_name);
										if(count($component_name) <= 1){
											Framework\Logger::Error($new_line . 'Create Failure !' . $new_line . $new_line . 'Component Definition Must Have a Valid Parent Core Directory' . $new_line . $new_line . 'Examples:' . $new_line . $special_characters['T'] . 'Database/PDO/Custom-Component' . $new_line . $special_characters['T'] . 'Database/PDO/Custom1/Custom1/Custom-Component', true);
											$output = false;
										}else{
											$core_directory = $component_name[0];
											if(!is_dir($file_target . DS . $core_directory) OR !file_exists($file_target . DS . $core_directory)){
												Framework\Logger::Error($new_line . 'Create Failure !' . $new_line . $new_line . 'Component Definition Must Have a Valid Parent Core Directory.' . $new_line . $core_directory . ' is not Valid a Core Parent' . $new_line . $new_line . 'Examples:' . $new_line . $special_characters['T'] . 'Database/PDO/Custom-Component' . $new_line . $special_characters['T'] . 'Database/PDO/Custom1/Custom1/Custom-Component', true);
												$output = false;
											}else{
												$component_directory = $file_target . DS . $core_directory . DS . 'Components';
												(!is_dir($component_directory) OR !file_exists($component_directory)) ? mkdir($component_directory) : '';
												$component_file = end($component_name);
												$component_next_directory = $component_directory;
												$component_namespace = 'Components\\' . $component_name[0];
												unset($component_name[0]);
												foreach($component_name as $component_sub_folder){
													if($component_file == $component_sub_folder){
														$file_target_to_write = $component_next_directory . DS . $component_file . '.php';
														$output = true;
														break;
													}else{
														$component_next_directory = $component_next_directory . DS . $component_sub_folder;
														$component_namespace = $component_namespace . '\\' . $component_sub_folder;
														(!is_dir($component_next_directory) OR !file_exists($component_next_directory)) ? mkdir($component_next_directory) : '';
														$output = false;
														continue;
													}
												}
											}
											if($output == true){
												if(is_file($file_target_to_write) AND file_exists($file_target_to_write) AND !in_array('--rewrite', $options)){
													$create_type = self::$create_valid_types[$options[1]];
													$create_type = ucfirst($create_type);
													$component_name_to_show = explode(DS, $file_target_to_write);
													$component_name_to_show = end($component_name_to_show);
													Framework\Logger::Error($new_line . 'Create Failure !' . $new_line . $new_line . '"' . $component_name_to_show . '" Component Exists. Path: ' . $new_line . $special_characters['T'] . $file_target_to_write . $new_line . $new_line . 'Add --rewrite Option for Re-Write New Contents on it', true);
													$output = false;
												}elseif(!is_file($file_target_to_write) AND !file_exists($file_target_to_write) AND in_array('--rewrite', $options)){
													$create_type = self::$create_valid_types[$options[1]];
													$create_type = ucfirst($create_type);
													rmdir(dirname($file_target_to_write));
													$component_name_to_show = explode(DS, $file_target_to_write);
													$component_name_to_show = end($component_name_to_show);
													Framework\Logger::Error($new_line . 'Create Failure !' . $new_line . $new_line . '"' . $component_name_to_show . '" Component not Exists so You Can\'t Re-Write it' . $new_line . $new_line . 'Please Create it first', true);
													$output = false;
												}else{
													$component_file = str_replace(array('-'), array('_'), $component_file);
													$content_file = str_replace(array('{{Component_Namespace}}'), array($component_namespace), $content_file);
													$content_file = str_replace(array('{{Trait_Name}}'), array($component_file), $content_file);
													$output = true;
												}
											}
										}
									}else{
										$file_target_to_write = $file_target . DS . $options[2] . '.php';
										$output = true;
									}
									if($output !== false){
										if(in_array('--rewrite', $options)){
											$write_type = 'Re-Write';
											unlink($file_target_to_write);
										}else{
											$write_type = 'Create';
										}
										file_put_contents($file_target_to_write, $content_file);
										Framework\Logger::Error($new_line . $write_type . ' Successfully !' . $new_line . $new_line . 'File Located at:' . $new_line . $new_line . $file_target_to_write, true);
										$output = true;
									}
								}
							}
						}
					}
				}
				return($output);
			}

		}

	}

	return(\LaunchPad\Components\Console\Commands\Create::class);

}

?>