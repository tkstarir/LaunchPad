<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Compressor {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Java_Script')){

		// Javascript compressor
		trait Java_Script {

			// Javascript compressor
			// @variable ?String $string | default null
			// @return ?String
			public static function Java_Script(?String $string = null) : ?String {
				$special_characters = Framework\Config::Core('Special_Characters');
				$replaced_characters = array($special_characters['L'] => ' ', $special_characters['R'] => ' ', $special_characters['T'] => ' ', $special_characters['LL'] => ' ', $special_characters['RR'] => ' ', $special_characters['TT'] => ' ', $special_characters['LR'] => ' ', $special_characters['RL'] => ' ', $special_characters['LT'] => ' ', $special_characters['TL'] => ' ', $special_characters['RT'] => ' ', $special_characters['NRT'] => ' ', $special_characters['NTR'] => ' ', $special_characters['TRN'] => ' ', $special_characters['TNR'] => ' ', $special_characters['TNR'] => ' ', $special_characters['RTN'] => ' ', $special_characters['RNT'] => '');
				foreach($replaced_characters as $key => $value){
					$string = preg_replace('/[' . $key . ']/imu', $value, $string);
				}
				$string = str_ireplace(array('{', '}', ';', ','), array(' { ', ' } ', '; ', ', '), $string);
				$string = str_ireplace(array('elseif', 'else if'), array(' else if ', ' else if '), $string);
				$string = str_ireplace(array('==', '!=', '!==', '===', '&&', '||'), array(' == ', ' != ', ' !== ', ' === ', ' && ', ' || '), $string);
				$string = str_ireplace(array('  ', '! ', ' , ', '== =', '= ==', '= = ='), array(' ', '!', ', ', '===', '===', '==='), $string);
				$string = str_ireplace(array('  '), array(' '), $string);
				$string = Framework\Cleaner::Trim($string);
				settype($string, 'String');
				return(!Framework\Validator::IsNullOrEmpty($string) ? $string : '');
			}

		}

	}

	return(\LaunchPad\Components\Compressor\Java_Script::class);

}

?>