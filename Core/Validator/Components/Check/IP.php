<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Validator\Check {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\IP')){

		// IP validation for checking that your inputs and contents had a valid format of ip algorithm or not
		trait IP {

			// Check your input(s) are ip or not
			// @variable Mixed $strings | default null
			// @return Boolean
			public static function IP($strings = null) : Bool {
				if(is_array($strings) OR is_object($strings)){
					$output = true;
					foreach($strings as $key => $value){
						if(!self::IP($value)){
							$output = false;
							break;
						}else{
							$output = true;
							continue;
						}
					}
					settype($output, 'Boolean');
					return($output);
				}else{
					$strings = Framework\Cleaner::Trim($strings);
					$ip_to_long = ip2long($strings);
					if(!is_null($ip_to_long)){
						if(filter_var($strings, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6) != false){
							if(preg_match_all('/^[0-9]{1,3}(.[0-9]{1,3}){3}$/imu', $strings, $matches)){
								if(isset($matches[0][0]) AND !self::IsNullOrEmpty($matches[0][0])){
									$output = true;
								}else{
									$output = false;
								}
							}else{
								$output = false;
							}
						}else{
							$output = false;
						}
					}else{
						$output = false;
					}
					settype($output, 'Boolean');
					return($output);
				}
			}

		}

	}

	return(\LaunchPad\Components\Validator\Check\IP::class);

}

?>