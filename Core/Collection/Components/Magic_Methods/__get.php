<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Collection\Magic_Methods {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\__get')){

		// "__get" Magic method for getting data from collection
		trait __get {

			// Get specified index from collection data
			// @variable ?String $name | default null
			// @return ?Mixed
			public function __get(?String $name = null){
				if($name == 'count'){
					if(is_numeric($this->data)){
						return($this->data);
					}else{
						$count = count($this->data);
						return($count);
					}
				}elseif(isset($this->data[$name])){
					return($this->data[$name]);
				}else{
					return false;
				}
			}

		}

	}

	return(\LaunchPad\Components\Collection\Magic_Methods\__get::class);

}

?>