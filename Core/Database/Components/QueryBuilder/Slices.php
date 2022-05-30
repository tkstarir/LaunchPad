<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Slices')){

		// Slices methods based on PDO
		trait Slices {

			// Slice fetched result to your number of pieces
			// @variable Int $offset | default 0
			// @variable Mixed $length | default 0
			// @variable ?Callable $closure | default null
			// @return Array
			public static function Slice(Int $offset = 0, $length = 0, ?Callable $closure = null) : Array {
				$data = self::Fetch('*');
				if($offset >= 0 AND is_numeric($length) AND $length >= 1){
					$offset = $offset <= 0 ? 0 : $offset;
					$data = array_slice($data, $offset, $length);
				}else{
					$data = array_slice($data, 0, $offset);
				}
				Framework\Caller::Make($length, $data);
				Framework\Caller::Make($closure, $data);
				return($data);
			}

			// Slice fetched result to your number of pieces by AI column
			// @variable Int $offset | default 0
			// @variable Mixed $length | default 0
			// @variable ?Mixed $ai_column | default null
			// @variable ?Callable $closure | default null
			// @return Array
			public static function SliceById(Int $offset = 0, $length = 0, $ai_column = '', ?Callable $closure = null) : Array {
				$data = self::Fetch('*');
				if($offset >= 0 AND is_numeric($length) AND $length >= 1){
					$column = Framework\Validator::IsNullOrEmpty($ai_column) ? self::Appellation(self::$ai_column, 'column') : $ai_column;
					foreach($data as $key => $value){
						settype($value[$column], 'Int');
						if($value[$column] <= $offset){
							unset($data[$key]);
						}
					}
					$data = array_slice($data, 0, $length);
				}else{
					$data = array_slice($data, 0, $offset);
				}
				Framework\Caller::Make($length, $data);
				Framework\Caller::Make($ai_column, $data);
				Framework\Caller::Make($closure, $data);
				return($data);
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Slices::class);

}

?>