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
	if(!trait_exists(__NAMESPACE__ . '\\Update')){

		// Method that is useful for collections and their childrens
		trait Update {

			// Save new data for collection in database
			// @variable ?Mixed $key | default null
			// @variable ?Mixed $value | default null
			// @return Boolean
			public function Update($key = null, $value = null) : Bool {
				$access_permit = $this->access_permit;
				$access_permit_name = array_keys($access_permit);
				$access_permit_name = $access_permit_name[0];
				$current_target = Framework\Database::Table();
				Framework\Database::Table($this->target);
				Framework\Database::Where($access_permit_name, $access_permit[$access_permit_name]);
				$result = is_array($key) ? Framework\Database::Update($key) : Framework\Database::Update($key, $value);
				!Framework\Validator::IsNullOrEmpty($current_target) ? Framework\Database::Table($current_target) : '';
				return($result);
			}

		}

	}

	return(\LaunchPad\Components\Collection\Model_Methods\Update::class);

}

?>