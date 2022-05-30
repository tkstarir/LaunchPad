<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Client {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Initialize')){

		// Initialize "Client" core
		trait Initialize {

			// Fetch user agent from envirnoments or global $_SERVER variable and begin processes for checking client details and getting user ADDRS (IPs)
			// @no_variable
			// @return Boolean
			public static function Initialize() : Bool {
				$initialize_status = false;
				Framework\Config::Client('Default_Agent', function(?String $default_agent = null){
					if(isset($_SERVER['HTTP_USER_AGENT']) AND !Framework\Validator::IsNullOrEmpty($_SERVER['HTTP_USER_AGENT'])){
						self::$agent = Framework\Cleaner::Trim($_SERVER['HTTP_USER_AGENT']);
					}elseif(!is_null(getenv('HTTP_USER_AGENT')) AND !Framework\Validator::IsNullOrEmpty(getenv('HTTP_USER_AGENT'))){
						self::$agent = Framework\Cleaner::Trim(getenv('HTTP_USER_AGENT'));
					}else{
						self::$agent = $default_agent;
					}
				});
				Framework\Config::Client('Default_OS', function(Array $default_operating_system){
					self::$operating_system['name'] = $default_operating_system['name'];
					self::$operating_system['version'] = $default_operating_system['version'];
					self::$operating_system['architecture'] = $default_operating_system['architecture'];
				});
				Framework\Config::Client('Default_Browser', function(Array $default_browser){
					self::$browser['name'] = $default_browser['name'];
					self::$browser['version'] = $default_browser['version'];
					self::$browser['frames'] = $default_browser['frames'];
				});
				$operating_system_check_methods = array('OS_Check_IsOSF1', 'OS_Check_IsWatchOS', 'OS_Check_IsBada', 'OS_Check_IsChromeOs', 'OS_Check_IsIOS', 'OS_Check_IsOSX', 'OS_Check_IsSymbianOS', 'OS_Check_IsWindows', 'OS_Check_IsWindowsPhone', 'OS_Check_IsFreeBSD', 'OS_Check_IsOpenBSD', 'OS_Check_IsNetBSD', 'OS_Check_IsOpenSolaris', 'OS_Check_IsSunOS', 'OS_Check_IsOS2', 'OS_Check_IsBeOS', 'OS_Check_IsKaiOS', 'OS_Check_IsPalmOS', 'OS_Check_IsRemixOS', 'OS_Check_IsAndroid', 'OS_Check_IsLinux', 'OS_Check_IsNokia', 'OS_Check_IsBlackBerry');
				$operating_system_status = Framework\Caller::Make(function(Framework\Client $client) use ($operating_system_check_methods) : Bool {
					$status = false;
					foreach($operating_system_check_methods as $method_key => $method_value){
						$check_operating_system = forward_static_call_array(array($client, $method_value), array());
						if(Framework\Validator::Boolean($check_operating_system) AND $check_operating_system === true){
							$status = true;
							break;
						}else{
							$status = false;
							continue;
						}
					}
					return($status);
				}, null);
				$browser_check_methods = array('Browser_Check_IsWebTV', 'Browser_Check_IsBlazer', 'Browser_Check_IsInternetExplorer', 'Browser_Check_IsEdge', 'Browser_Check_IsOpera', 'Browser_Check_IsVivaldi', 'Browser_Check_IsDragon', 'Browser_Check_IsGaleon', 'Browser_Check_IsNetscape', 'Browser_Check_IsSeaMonkey', 'Browser_Check_IsFirefox', 'Browser_Check_IsYandex', 'Browser_Check_IsDolfin', 'Browser_Check_IsSamsung', 'Browser_Check_IsChrome', 'Browser_Check_IsOmniWeb', 'Browser_Check_IsAndroid', 'Browser_Check_IsBlackBerry', 'Browser_Check_IsNokia', 'Browser_Check_IsGSA', 'Browser_Check_IsSafari', 'Browser_Check_IsNetPositive', 'Browser_Check_IsFirebird', 'Browser_Check_IsKonqueror', 'Browser_Check_IsIcab', 'Browser_Check_IsPhoenix', 'Browser_Check_IsAmaya', 'Browser_Check_IsLynx', 'Browser_Check_IsShiretoko', 'Browser_Check_IsIceweasel');
				$browser_status = Framework\Caller::Make(function(Framework\Client $client) use ($browser_check_methods) : Bool {
					$status = false;
					foreach($browser_check_methods as $method_key => $method_value){
						$check_browser = forward_static_call_array(array($client, $method_value), array());
						if(Framework\Validator::Boolean($check_browser) AND $check_browser === true){
							$status = true;
							break;
						}else{
							$status = false;
							continue;
						}
					}
					return($status);
				}, null);
				self::OS_Check_Device();
				self::Browser_Frames_IsChromeFrame();
				self::Browser_Frames_IsFacebookWebView();
				if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) OR !empty(getenv('HTTP_ACCEPT_LANGUAGE'))){
					$accept_language = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : getenv('HTTP_ACCEPT_LANGUAGE');
					preg_match_all('/([a-zA-Z]{2,3}-[a-zA-Z]{2,3}),([a-zA-Z]{2,3})/imu', $accept_language, $matches);
					self::$language['locale'] = (isset($matches[1]) AND isset($matches[1][0]) AND !Framework\Validator::IsNullOrEmpty($matches[1][0])) ? $matches[1][0] : null;
					self::$language['language'] = (isset($matches[2]) AND isset($matches[2][0]) AND !Framework\Validator::IsNullOrEmpty($matches[2][0])) ? $matches[2][0] : null;
					$encoding = (isset($_SERVER['HTTP_ACCEPT_ENCODING']) AND !Framework\Validator::IsNullOrEmpty($_SERVER['HTTP_ACCEPT_ENCODING'])) ? $_SERVER['HTTP_ACCEPT_ENCODING'] : (!Framework\Validator::IsNullOrEmpty(getenv('HTTP_ACCEPT_ENCODING')) ? getenv('HTTP_ACCEPT_ENCODING') : null);
					if(!is_null($encoding)){
						$encoding = explode(', ', $encoding);
						$encoding = Framework\Cleaner::Trim($encoding);
						$encoding = join('|', $encoding);
						self::$language['encoding'] = $encoding;
						$language_status = true;
					}else{
						self::$language['encoding'] = null;
						$language_status = false;
					}
				}else{
					$language_status = false;
				}
				$default_addr_type = Framework\Config::Client('Default_ADDR_Type');
				$default_addr_type = Framework\Validator::IsNullOrEmpty($default_addr_type) ? 'REMOTE_ADDR' : $default_addr_type;
				if(isset($_SERVER[$default_addr_type])){
					$default_addr = Framework\Cleaner::Trim($_SERVER[$default_addr_type]);
					$default_addr = Framework\Validator::IP($default_addr) ? $default_addr : null;
					self::$ip['default_addr'] = $default_addr_type;
					self::$ip[$default_addr_type] = $default_addr;
					self::$ip['addrs'][$default_addr_type] = $default_addr;
					$ip_status = true;
				}elseif(!Framework\Validator::IsNullOrEmpty(getenv($default_addr_type))){
					$default_addr = Framework\Cleaner::Trim(getenv($default_addr_type));
					$default_addr = Framework\Validator::IP($default_addr) ? $default_addr : null;
					self::$ip[$default_addr] = $default_addr;
					self::$ip['addrs'][$default_addr] = $default_addr;
				}else{
					self::$ip['default_addr'] = $default_addr_type;
					self::$ip[$default_addr_type] = null;
				}
				$addrs = array('REMOTE_ADDR', 'CLIENT_IP', 'FORWARDED', 'FORWARDED_FOR', 'FORWARDED_FOR_IP', 'HTTP_CLIENT_IP', 'HTTP_FORWARDED', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED_FOR_IP', 'HTTP_PROXY_CONNECTION', 'HTTP_VIA', 'HTTP_X_FORWARDED', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED_FOR_IP', 'VIA', 'X_FORWARDED', 'X_FORWARDED_FOR', 'X_FORWARDED_FOR_IP');
				foreach($addrs as $addr){
					if(isset(self::$ip['addrs'][$addr])){
						continue;
					}else{
						if(isset($_SERVER[$addr]) AND !Framework\Validator::IsNullOrEmpty($_SERVER[$addr]) AND Framework\Validator::IP($_SERVER[$addr])){
							self::$ip['addrs'][$addr] = $_SERVER[$addr];
						}elseif(!Framework\Validator::IsNullOrEmpty(getenv($addr)) AND Framework\Validator::IP(getenv($addr))){
							self::$ip['addrs'][$addr] = getenv($addr);
						}else{
							continue;
						}
					}
				}
				return($operating_system_status === true AND $browser_status === true AND $language_status === true);
			}

		}

	}

	return(\LaunchPad\Components\Client\Initialize::class);

}

?>