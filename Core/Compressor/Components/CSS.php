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
	if(!trait_exists(__NAMESPACE__ . '\\CSS')){

		// CSS compressor
		trait CSS {

			// CSS compressor
			// @variable ?String $string | default null
			// @return ?String
			public static function CSS(?String $string = null) : ?String {
				$special_characters = Framework\Config::Core('Special_Characters');
				$replaced_characters = array($special_characters['L'] => ' ', $special_characters['R'] => ' ', $special_characters['T'] => ' ', $special_characters['LL'] => ' ', $special_characters['RR'] => ' ', $special_characters['TT'] => ' ', $special_characters['LR'] => ' ', $special_characters['RL'] => ' ', $special_characters['LT'] => ' ', $special_characters['TL'] => ' ', $special_characters['RT'] => ' ', $special_characters['NRT'] => ' ', $special_characters['NTR'] => ' ', $special_characters['TRN'] => ' ', $special_characters['TNR'] => ' ', $special_characters['TNR'] => ' ', $special_characters['RTN'] => ' ', $special_characters['RNT'] => '');
				$replaced_css_selectors = array(': active' => ':active', ': after' => ':after', ': before' => ':before', ': checked' => ':checked', ': disabled' => ':disabled', ': empty' => ':empty', ': enabled' => ':enabled', ': first-child' => ':first-child', ': first-letter' => ':first-letter', ': first-line' => ':first-line', ': first-of-type' => ':first-of-type', ': focus' => ':focus', ': hover' => ':hover', ': in-range' => ':in-range', ': invalid' => ':invalid', ': lang' => ':lang', ': last-child' => ':last-child', ': last-of-type' => ':last-of-type', ': link' => ':link', ': not' => ':not', ': nth-child' => ':nth-child', ': nth-last-child' => ':nth-last-child', ': nth-last-of-type' => ':nth-last-of-type', ': nth-of-type' => ':nth-of-type', ': only-of-type' => ':only-of-type', ': only-child' => ':only-child', ': optional' => ':optional', ': out-of-range' => ':out-of-range', ': read-only' => ':read-only', ': read-write' => ':read-write', ': required' => ':required', ': root' => ':root', ': selection' => ':selection', ': target' => ':target', ': valid' => ':valid', ': visited' => ':visited');
				foreach($replaced_characters as $key => $value){
					$string = preg_replace('/[' . $key . ']/imu', $value, $string);
				}
				$string = str_ireplace(array('{', '}', ';', ':', ',', '>'), array(' { ', ' } ', '; ', ': ', ', ', ' > '), $string);
				$string = str_ireplace(array(':: ', ' ::', ' : :', ': : ', ' : : '), array('::', '::', '::', '::', '::'), $string);
				$string = str_ireplace(array('!important'), array(' !important'), $string);
				foreach($replaced_css_selectors as $key => $value){
					$string = preg_replace('/' . $key . '/imu', $value, $string);
				}
				$string = str_ireplace(array('  '), array(' '), $string);
				$string = Framework\Cleaner::Trim($string);
				settype($string, 'String');
				return(!Framework\Validator::IsNullOrEmpty($string) ? $string : '');
			}

		}

	}

	return(\LaunchPad\Components\Compressor\CSS::class);

}

?>