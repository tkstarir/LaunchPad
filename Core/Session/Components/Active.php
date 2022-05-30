<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Session {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Active')){

		// CRUD methods (Create, Read, Update, Delete) for session core
		trait Active {

			// Initialize sessions based on your way, imports old sessions to current process and save session save path
			// @no_variable
			// @return ?String
			public static function Active() : ?String {
				if(self::$active){
					// Error Session already started
					return false;
				}else{
					$sessions_type = Framework\Config::Core('Sessions_Type');
					if(in_array($sessions_type, array('session_start', 'session_write_close'))){
						$sessions_type == 'session_start' ? session_start() : session_write_close();
						if(isset($_SESSION)){
							$sessions = $_SESSION;
							if(count($sessions) >= 1){
								foreach($sessions as $session_key => $session_value){
									!isset(self::$sessions[$session_key]) ? (self::$sessions[$session_key] = $session_value) : '';
								}
							}
						}
						$current_path = session_save_path();
						$current_path = Framework\Cleaner::Trim($current_path);
						$current_path = str_replace(array(DS, '\\'), array(DS, DS), $current_path);
						$cookie_params = session_get_cookie_params();
						self::$active = true;
						self::$save_path = $current_path;
						self::$cache_expire = session_cache_expire();
						self::$cache_limiter = session_cache_limiter();
						self::$id = session_id();
						self::$name = session_name();
						self::$cookie_params = $cookie_params;
						self::$module_name = session_module_name();
						return true;
					}else{
						// Error invalid Session_Type
						return false;
					}
				}
			}

		}

	}

	return(\LaunchPad\Components\Session\Active::class);

}

?>