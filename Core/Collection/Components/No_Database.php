<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Collection {

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\No_Database')){

		// Set collection to non-database model
		trait No_Database {

			// Clear "access_permit" and "target" constants from object for non database results
			// @no_variable
			// @return Boolean
			public function No_Database() : Bool {
				if(count(self::non_database_vars) >= 1){
					foreach(self::non_database_vars as $non_database_var){
						unset($this->$non_database_var);
					}
				}
				return true;
			}

		}

	}

	return(\LaunchPad\Components\Collection\No_Database::class);

}

?>