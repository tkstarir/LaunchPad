<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Caller {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Get_Requires')){

		// Convert your requested callbacks requires to real objects
		trait Get_Requires {

			// Get type of your requested callbacks requires and clone an object from it real object, or give your default values
			// @variable Array $parameters
			// @variable Array $default_parameters
			// @return Array
			protected static function Get_Requires(Array $parameters = array(), Array $default_parameters = array()) : Array {
				$requires = array();
				$requires_count = 0;
				foreach($parameters as $parameter){
					$parameter_name = $parameter->getName();
					$parameter_type = $parameter->getType();
					$parameter_type = is_null($parameter_type) ? 'null' : $parameter_type->getName();
					$parameter_type = Framework\Cleaner::Lower_Case($parameter_type);
					if(in_array($parameter_type, array('null', 'nullable', 'string', 'int', 'bool', 'resource', 'object', 'array', 'float', 'double'))){
						if(!isset($default_parameters[$requires_count])){
							if($parameter->isDefaultValueAvailable()){
								$parameter_default_value = $parameter->getDefaultValue();
								$requires[$parameter_name] = $parameter_default_value;
							}else{
								// Error this param must have a default value
							}
						}else{
							$default_parameter_type = gettype($default_parameters[$requires_count]);
							if(empty($parameter_type) OR $parameter_type == 'null' OR $default_parameter_type == $parameter_type){
								$requires[$parameter_name] = $default_parameters[$requires_count];
							}else{
								// Error invalid type for parameter
							}
						}
					}else{
						if(class_exists($parameter_type)){
							$require_object = new $parameter_type;
							($require_object instanceof $parameter_type) ? ($requires[$parameter_name] = $require_object) : '';
						}else{
							$default_parameter = new \ReflectionClass($default_parameters[$requires_count]);
							if(isset($default_parameters[$requires_count]) AND $default_parameter->getName() == $parameter_type){
								$requires[$parameter_name] = $default_parameters[$requires_count];
							}else{
								// Error your requested require not exists
							}
						}
					}
					$requires_count++;
				}
				return($requires);
			}

		}

	}

	return(\LaunchPad\Components\Caller\Get_Requires::class);

}

?>