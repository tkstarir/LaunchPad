<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// LaunchPad bootstrapper library
	// All primitive actions are doing here
	if(!class_exists(__NAMESPACE__ . '\\LaunchPad')){

		class LaunchPad {

			// @property:public String $charset | default 'default'
			public static $charset = 'default';

			// @property:public String $charset_non_dashed | default 'default'
			public static $charset_non_dashed = 'default';

			// @property:public Array $configs
			protected static $configs = array();

			// @property:protected Array $objects
			protected static $objects = array('cores' => array(), 'components' => array());

			// Load core classes and their components that define by you or LaunchPad
			// @variable ?String $core_folder | default null
			// @return Boolean
			protected static function Core_Handle(?String $core_folder = null) : Bool {
				$cores = glob($core_folder . DS . '*');
				$result = array_map(function($core_file){
					$files = self::Components_Handle(array(), $core_file);
					foreach($files as $file){
						$file_name = explode(DS, $file);
						$file_name = end($file_name);
						if($file_name == 'BootStrap.php'){
							continue;
						}elseif(is_readable($file) AND is_file($file)){
							$component = require_once($file);
							if(class_exists($component)){
								$component = new $component;
								self::$objects['cores'][] = $component;
							}else{
								self::$objects['traits'][] = $component;
							}
						}else{
							continue;
						}
					}
					return true;
				}, $cores);
				return true;
			}

			// Sort folders at first for an array and arrange files after them
			// @variable ?String $components_folder | default null
			// @return Array
			protected static function Sort_Components(?String $components_folder = null) : Array {
				$sorted = array();
				if(is_readable($components_folder)){
					if(is_file($components_folder)){
						$sorted[] = $components_folder;
						return($sorted);
					}else{
						$components_folder = glob($components_folder . DS . '*');
						foreach($components_folder as $component){
							if(!is_readable($component)){
								continue;
							}else{
								is_dir($component) ? array_unshift($sorted, $component) : (is_file($component) ? array_push($sorted, $component) : '');
							}
						}
						return($sorted);
					}
				}else{
					return($sorted);
				}
			}

			// Get fully complete components and their pieces that define by you or LaunchPad, and put them in an array and return it
			// @variable Array $components
			// @variable ?String $core_file | default null
			// @return Array
			protected static function Components_Handle(Array $components = array(), ?String $core_file = null) : Array {
				$core_files = self::Sort_Components($core_file);
				foreach($core_files as $core_file){
					if(is_readable($core_file)){
						if(is_dir($core_file)){
							$components = self::Components_Handle($components, $core_file);
						}elseif(is_file($core_file)){
							$components[] = $core_file;
						}else{
							continue;
						}
					}
				}
				return($components);
			}

			// Load config files that define by you or LaunchPad
			// @variable ?String $config_folder | default null
			// @return Boolean
			protected static function Config_Handle(?String $config_folder = null) : Bool {
				$configs = glob($config_folder . DS . '*');
				foreach($configs as $config){
					if(is_readable($config) AND is_file($config)){
						$config_object = require_once($config);
						$config_var = $config;
						$config_var = explode(DS, $config_var);
						$config_var = end($config_var);
						$config_var = explode('.', $config_var);
						$config_var = current($config_var);
						$config_var = lcfirst($config_var);
						self::$configs[$config_var] = $config_object;
					}else{
						continue;
					}
				}
				return true;
			}

			// Load and include patterns such as models and controllers for LaunchPad to you can use them easily
			// @variable ?String $path | default null
			// @return Boolean
			protected static function Patterns_Handle(?String $path = null) : Bool {
				$path = Validator::IsNullOrEmpty($path) ? Framework_Location . Framework_Directory . DS . 'Patterns' : $path;
				if(is_dir($path)){
					$controllers = glob($path . DS . '*');
					foreach($controllers as $controller){
						is_dir($controller) ? self::Patterns_Handle($controller) : require_once($controller);
					}
					return true;
				}else{
					return false;
				}
			}

			// BootStrap and load LaunchPad requirements and files
			// @no_variable
			// @return Boolean
			public static function BootStrap() : Bool {
				self::Config_Handle(APP_PATH . APP_Directory . DS . 'Config');
				self::Core_Handle(APP_PATH . APP_Directory . DS . 'Core');
				self::Core_Handle(Framework_Location . Framework_Directory . DS . 'Core');
				self::Patterns_Handle();
				$database_auto_active = Config::Database('Auto_Start');
				$session_auto_active = Config::Core('Session_Auto_Start');
				(in_array(self::$charset, array('def', 'default', 'empty', 'none', 'undefined', 'null', null))) ? self::$charset = Config::Core('Charset') : '';
				(in_array(self::$charset_non_dashed, array('def', 'default', 'empty', 'none', 'undefined', 'null', null))) ? self::$charset_non_dashed = Config::Core('Charset_Non_Dashed') : '';
				self::Debuging();
				self::Time_Limits();
				self::Timezone();
				$database_auto_active == true ? Database::Active() : '';
				$session_auto_active == true ? Session::Active() : '';
				System::Initialize();
				// Url::Initialize();
				// Url::Initialize_Allowed_Characters();
				Input::Initialize();
				Client::Initialize();
				Logger::Info('Libraries Successfully Loaded');
				Logger::Info('Configs Successfully Loaded');
				Logger::Info('LaunchPad BootStrap Successfully Finished !');
				return true;
			}

			// Activate debuging for LaunchPad if you want
			// @no_variable
			// @return Boolean
			protected static function Debuging() : Bool {
				$debuging = Config::Core('Debuging');
				$display_errors = $debuging ? 'On' : 'Off';
				$error_reporting = $debuging ? E_ALL : false;
				ini_set('display_errors', $display_errors);
				ini_set('display_startup_errors', $display_errors);
				error_reporting($error_reporting);
				return true;
			}

			// Set time limits that you define in core config
			// @no_variable
			// @return Boolean
			protected static function Time_Limits() : Bool {
				$time_limit = Config::Core('Time_Limit');
				$time_limit = Cleaner::Number($time_limit);
				if(!Validator::IsNullOrEmpty($time_limit)){
					ini_set('max_execution_time', $time_limit);
					set_time_limit($time_limit);
					return true;
				}else{
					return false;
				}
			}

			// Set timezone that you define in core config
			// @no_variable
			// @return Boolean
			protected static function Timezone() : Bool {
				$timezone = Config::Core('Timezone');
				if(!Validator::IsNullOrEmpty($timezone)){
					$valid_timezones = timezone_identifiers_list();
					if(in_array($timezone, $valid_timezones)){
						ini_set('date.timezone', $timezone);
						date_default_timezone_set($timezone);
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\LaunchPad
			private static function Static(?Callable $closure = null) : \LaunchPad\LaunchPad {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

}

?>