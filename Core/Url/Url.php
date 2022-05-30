<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	// Check for existence of class
	if(!class_exists(__NAMESPACE__ . '\\Url')){

		// Url class to work with tweaks and routed tweaks, Getting tweaks string (REQUEST_URI), Convert a url to base url and ...
		class Url extends LaunchPad {

			// @property:protected Array $tweaks
			protected static $tweaks = array();

			// @property:protected Array $routed_tweaks
			protected static $routed_tweaks = array();

			// @property:protected Array $tweaks_string | default null
			protected static $tweaks_string = null;

			// @property:protected Array $routed_tweaks_string | default null
			protected static $routed_tweaks_string = null;

			// @property:protected Array $allowed_characters | default null
			protected static $allowed_characters = null;

			// Tweaks method for get tweaks by their indexes (Requested URIs)
			// @no_variable
			// @return Boolean
			public static function Initialize() : Bool {
				if(isset($_SERVER['argc']) AND isset($_SERVER['argv'])){
					if(System::IsCli()){
						$tweaks = Cleaner::XSS($tweaks);
						$tweaks = array_values($tweaks);
						$tweaks = join(DS, $tweaks);
					}else{
						$tweaks = !Validator::IsNullOrEmpty($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : getenv('REQUEST_URI');
						$tweaks = Cleaner::Trim($tweaks);
					}
				}else{
					$tweaks = !Validator::IsNullOrEmpty($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : getenv('REQUEST_URI');
				}
				if(strpos($tweaks, '?') !== false OR strpos($tweaks, DS . '?') !== false){
					$tweaks = strpos($tweaks, DS . '?') !== false ? explode(DS . '?', $tweaks) : explode('?', $tweaks);
					$tweaks = current($tweaks);
					$tweaks = Cleaner::Trim($tweaks);
				}
				$tweaks = Cleaner::Slash_Remover($tweaks);
				$tweaks = explode('/', $tweaks);
				foreach($tweaks as $tweak_key => $tweak_value){
					if(Validator::IsNullOrEmpty($tweak_value)){
						unset($tweaks[$tweak_key]);
					}else{
						continue;
					}
				}
				$tweaks = array_values($tweaks);
				ksort($tweaks);
				self::$tweaks = $tweaks;
				Logger::Info('Url Class Initialize');
				return true;
			}

			// Get tweak by it index
			// @variable Int $tweaks | default 0
			// @return ?String
			public static function Tweaks(Int $tweak = 0) : ?String {
				$tweak = (isset(self::$tweaks[$tweak]) AND !Validator::IsNullOrEmpty(self::$tweaks[$tweak])) ? self::$tweaks[$tweak] : '';
				settype($tweak, 'String');
				return($tweak);
			}

			// Get routed tweak by it index
			// @variable Int $routed_tweak | default 0
			// @return ?String
			public static function Routed_Tweaks(Int $routed_tweak = 0) : ?String {
				$routed_tweak = (isset(self::$routed_tweaks[$routed_tweak]) AND !Validator::IsNullOrEmpty(self::$routed_tweaks[$routed_tweak])) ? self::$routed_tweaks[$routed_tweak] : '';
				settype($routed_tweak, 'String');
				return($routed_tweak);
			}

			// Get routed tweaks as array
			// @no_variable
			// @return Array
			public static function All_Tweaks() : Array {
				$tweaks = self::$tweaks;
				settype($tweaks, 'Array');
				return($tweaks);
			}

			// Get routed tweaks as array
			// @no_variable
			// @return Array
			public static function All_Routed_Tweaks() : Array {
				$routed_tweaks = self::$routed_tweaks;
				settype($routed_tweaks, 'Array');
				return($routed_tweaks);
			}

			// return request uri or real tweaks as string
			// @no_variable
			// @return ?String
			public static function Tweaks_String() : ?String {
				$tweaks_string = self::$tweaks_string;
				settype($tweaks_string, 'String');
				return($tweaks_string);
			}

			// return routed tweaks or routed directory dad you define it, as string
			// @no_variable
			// @return ?String
			public static function Routed_Tweaks_String() : ?String {
				$routed_tweaks_string = self::$routed_tweaks_string;
				settype($routed_tweaks_string, 'String');
				return($routed_tweaks_string);
			}

			// Initialize allowed characters
			// @no_variable
			// @return Boolean
			public static function Initialize_Allowed_Characters() : Bool {
				$tweaks = self::All_Tweaks();
				self::$allowed_characters = Config::Url('Allowed_Characters');
				if(!is_null(self::$allowed_characters)){
					self::$tweaks_string = count($tweaks) == 0 ? DS : join(DS, $tweaks);
					foreach($tweaks as $tweak){
						if(!Validator::IsNullOrEmpty($tweak)){
							if(!preg_match('/^[' . self::$allowed_characters . ']+$/imu', $tweak)){
								Show::Error('HTML', '400', 'Bad Request for Tweaks (Request Uri)');
							}else{
								continue;
							}
						}
					}
					Logger::Info('Url allowed characters initialized & processed');
					return true;
				}else{
					Logger::Warning('Url allowed characters hasn\'t an acceptable value. please check it');
					return false;
				}
			}

			// Return clone of self class as static for OOP objects
			// @variable ?Callable $closure | default null
			// @return \LaunchPad\Url
			private static function Static(?Callable $closure = null) : \LaunchPad\Url {
				$static = new Static();
				Caller::Make($closure, $static);
				return($static);
			}

		}

	}

	return(\LaunchPad\Url::class);

}

?>