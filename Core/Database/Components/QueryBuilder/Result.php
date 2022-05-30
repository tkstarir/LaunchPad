<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder {

	// @component \LaunchPad
	use \LaunchPad as Framework;

	if(!trait_exists(__NAMESPACE__ . '\\Result')){

		// Query Select Result Method Based on PDO
		trait Result {

			// Get Result of Select Queries as Array
			// @variable Boolean $all | default false
			// @return ?Mixed
			protected static function Result(Bool $all = false){
				$target = self::Table();
				$result = $all == true ? self::$current_process->fetchAll(self::$fetch_type) : self::$current_process->fetch(self::$fetch_type);
				if(self::$aggregate == false){
					$collaction = array();
					foreach($result as $key => $value){
						if(is_array($value)){
							$value_keys = array_keys($value);
							if(in_array(self::$ai_column, $value_keys)){
								$access_permit_key = self::$ai_column;
							}else{
								if(isset($value_keys[0])){
									$access_permit_key = $value_keys[0];
								}else{
									$current = current($value_keys);
									$access_permit_key = !Framework\Validator::IsNullOrEmpty($current) ? $current : '';
								}
							}
							if(isset($value[self::$ai_column])){
								$access_permit_value = $value[self::$ai_column];
							}else{
								if(isset($value[0])){
									$access_permit_value = $value[0];
								}else{
									$current = current($value);
									$access_permit_value = !Framework\Validator::IsNullOrEmpty($current) ? $current : '';
								}
							}
							$access_permit = array($access_permit_key => $access_permit_value);
							$collection_object = new Framework\Collection;
							$collection_object->data = $value;
							$collection_object->access_permit = $access_permit;
							$collection_object->target = $target;
							$collaction[] = $collection_object;
						}else{
							$collaction[] = $value;
						}
					}
				}else{
					$collaction = end($result);
				}
				self::Current_Process(true);
				return($collaction);
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Result::class);

}

?>