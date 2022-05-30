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
	if(!trait_exists(__NAMESPACE__ . '\\Hash')){

		// Hash validation for checking that your inputs and contents had a valid format of your specified algorithm or not
		trait Hash {

			// Check your input(s) are hash or not with your specified algorithm
			// @variable ?Mixed $hashs | default null
			// @variable ?String $hash_type | default 'md5'
			// @return Boolean
			public static function Hash($hashs = null, ?String $hash_type = null) : Bool {
				$hash_type = Framework\Validator::IsNullOrEmpty($hash_type) ? 'md5' : $hash_type;
				if(is_array($hashs) OR is_object($hashs)){
					$output = true;
					foreach($hashs as $key => $value){
						if(!self::Hash($value, $hash_type)){
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
					$hash_type = Framework\Cleaner::Lower_Case($hash_type);
					switch($hash_type){
						case('adler32'): case('crc32'): case('crc32b'): case('fnv132'): case('fnv1a32'): case('joaat'): $output = preg_match('/^[a-f0-9]{8}$/imu', $hashs); break;
						case('fnv164'): case('fnv1a64'): $output = preg_match('/^[a-f0-9]{16}$/imu', $hashs); break;
						case('haval128,3'): case('haval128,4'): case('haval128,5'): case('md2'): case('md4'): case('md5'): case('ripemd128'): case('tiger128,3'): case('tiger128,4'): $output = preg_match('/^[a-f0-9]{32}$/imu', $hashs); break;
						case('haval160,3'): case('haval160,4'): case('haval160,5'): case('ripemd160'): case('sha1'): case('tiger160,3'): case('tiger160,4'): $output = preg_match('/^[a-f0-9]{40}$/imu', $hashs); break;
						case('haval192,3'): case('haval192,4'): case('haval192,5'): case('tiger192,3'): case('tiger192,4'): $output = preg_match('/^[a-f0-9]{48}$/imu', $hashs); break;
						case('haval224,3'): case('haval224,4'): case('haval224,5'): case('sha224'): case('sha3-224'): case('sha512/224'): $output = preg_match('/^[a-f0-9]{56}$/imu', $hashs); break;
						case('gost'): case('gost-crypto'): case('haval256,3'): case('haval256,4'): case('haval256,5'): case('ripemd256'): case('sha256'): case('sha3-256'): case('sha512/256'): case('snefru'): case('snefru256'): $output = preg_match('/^[a-f0-9]{64}$/imu', $hashs); break;
						case('ripemd320'): $output = preg_match('/^[a-f0-9]{80}$/imu', $hashs); break;
						case('sha3-384'): case('sha384'): $output = preg_match('/^[a-f0-9]{96}$/imu', $hashs); break;
						case('sha512'): case('sha3-512'): case('whirlpool'): $output = preg_match('/^[a-f0-9]{128}$/imu', $hashs); break;
						default: $output = false; break;
					}
					settype($output, 'Boolean');
					return($output);
				}
			}

		}

	}

	return(\LaunchPad\Components\Validator\Check\Hash::class);

}

?>