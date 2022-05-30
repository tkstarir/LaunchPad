<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Input {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of class
	if(!trait_exists(__NAMESPACE__ . '\\Initialize')){

		// Initialize Input core for fetching methods parameters from pure php
		trait Initialize {

			// Getting data from Post, Get, Request methods and retrieve uploaded files by client and store them into input core
			// @no_variable
			// @return Boolean
			public static function Initialize() : Bool {
				$puts = file_get_contents('php://input');
				$available_methods = array('posts' => $_POST, 'gets' => $_GET, 'requests' => $_REQUEST, 'files' => $_FILES);
				if(!empty($puts)){
					$puts = json_decode($puts, false);
					$available_methods['puts'] = $puts;
				}
				if(isset($available_methods['posts']) AND count($available_methods['posts']) >= 1){
					foreach($available_methods['posts'] as $post_key => $post_value){
						$post_key = Framework\Cleaner::Trim($post_key);
						$post_value = Framework\Cleaner::Trim($post_value);
						self::$posts[$post_key] = $post_value;
					}
				}
				if(isset($available_methods['gets']) AND count($available_methods['gets']) >= 1){
					foreach($available_methods['gets'] as $get_key => $get_value){
						$get_key = Framework\Cleaner::Trim($get_key);
						$get_value = Framework\Cleaner::Trim($get_value);
						self::$gets[$get_key] = $get_value;
					}
				}
				if(isset($available_methods['requests']) AND count($available_methods['requests']) >= 1){
					foreach($available_methods['requests'] as $request_key => $request_value){
						$request_key = Framework\Cleaner::Trim($request_key);
						$request_value = Framework\Cleaner::Trim($request_value);
						self::$requests[$request_key] = $request_value;
					}
				}
				if(isset($available_methods['files']) AND count($available_methods['files']) >= 1){
					foreach($available_methods['files'] as $files_key => $files_value){
						self::$files[$files_key] = $files_value;
					}
				}
				if(isset($available_methods['puts']) AND count($available_methods['puts']) >= 1){
					foreach($available_methods['puts'] as $put_key => $put_value){
						$put_key = Framework\Cleaner::Trim($put_key);
						$put_value = Framework\Cleaner::Trim($put_value);
						self::$puts[$put_key] = $put_value;
					}
				}
				return true;
			}

		}

	}

	return(\LaunchPad\Components\Input\Initialize::class);

}

?>