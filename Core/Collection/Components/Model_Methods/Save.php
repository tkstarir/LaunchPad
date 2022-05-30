<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Collection\Model_Methods {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Save')){

		// Method that is useful for collections and their childrens
		trait Save {

			// Get current data and save it to collection in database
			// @no_variable
			// @return Boolean
			public function Save() : Bool {
				$access_permit = $this->access_permit;
				$access_permit_name = array_keys($access_permit);
				$access_permit_name = $access_permit_name[0];
				$current_target = Framework\Database::Table();
				Framework\Database::Table($this->target);
				Framework\Database::Where($access_permit_name, $access_permit[$access_permit_name]);
				$result = Framework\Database::Update($this->data);
				!Framework\Validator::IsNullOrEmpty($current_target) ? Framework\Database::Table($current_target) : '';
				return($result);
			}

		}

	}

	return(\LaunchPad\Components\Collection\Model_Methods\Save::class);

}

?>