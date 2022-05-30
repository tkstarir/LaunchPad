<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad {

	/*
		-----------------------------------------------------------------------------------------------------------------------
		| @namespace \LaunchPad\Components
		-----------------------------------------------------------------------------------------------------------------------
		| 
		| Use LaunchPad component for tkstarir composer components such JDC, TDD and ...
		| Composer always load all tkstarir components and you can use them everwhere.
		| The components of tkstarir is not related to framework and their packages are
		| diffrent with LaunchPad.
		| 
		-----------------------------------------------------------------------------------------------------------------------
	*/
	use \LaunchPad\Components as Components;

	// -----------------------------------------------------------------------------------------------------------------------
	// | @constant DR | Server document root
	// -----------------------------------------------------------------------------------------------------------------------
	!defined('DR') ? define('DR', getenv('DOCUMENT_ROOT')) : '';

	// -----------------------------------------------------------------------------------------------------------------------
	// | @constant DS | Directory separator of operating system
	// -----------------------------------------------------------------------------------------------------------------------
	!defined('DS') ? define('DS', str_ireplace(array('/', '\/', '\\'), array('/', '/', '/'), DIRECTORY_SEPARATOR)) : '';

	// -----------------------------------------------------------------------------------------------------------------------
	// | @constant PS | Path separator of operating system
	// -----------------------------------------------------------------------------------------------------------------------
	!defined('PS') ? define('PS', PATH_SEPARATOR) : '';

	// -----------------------------------------------------------------------------------------------------------------------
	// | @constant Framework_Location | Location of LaunchPad in vendor directory
	// -----------------------------------------------------------------------------------------------------------------------
	!defined('Framework_Location') ? define('Framework_Location', str_ireplace(array('/', '\/', '\\'), array('/', '/', '/'), dirname(__DIR__)) . DS) : '';

	// -----------------------------------------------------------------------------------------------------------------------
	// | @constant Framework_Directory | Directory name of launchpad in vendor directory
	// -----------------------------------------------------------------------------------------------------------------------
	!defined('Framework_Directory') ? define('Framework_Directory', 'launchpad') : '';

	// -----------------------------------------------------------------------------------------------------------------------
	// | @constant APP_PATH | Your application path in base path of project
	// -----------------------------------------------------------------------------------------------------------------------
	!defined('APP_PATH') ? define('APP_PATH', str_ireplace(array('/', '\/', '\\'), array('/', '/', '/'), dirname(dirname(dirname(__DIR__)))) . DS) : '';

	// -----------------------------------------------------------------------------------------------------------------------
	// | @constant APP_Directory | Directory name of project in base path of project
	// -----------------------------------------------------------------------------------------------------------------------
	!defined('APP_Directory') ? define('APP_Directory', 'App') : '';

	// -----------------------------------------------------------------------------------------------------------------------
	// | @constant Version | Current version of LaunchPad for Showing and Processes
	// -----------------------------------------------------------------------------------------------------------------------
	!defined('Version') ? define('Version', '1.5.0') : '';

	/*
		-----------------------------------------------------------------------------------------------------------------------
		| Bootstrapper of LaunchPad
		-----------------------------------------------------------------------------------------------------------------------
		| 
		| As every thing and every framework, LaunchPad too need a bootstrapper to load
		| self pure libraries and files. This is the first action of framework.
		| Loading of cores and they components at first and process bootstrap commands.
		| This requiring is for loading bootstrap library to call it after.
		| 
		-----------------------------------------------------------------------------------------------------------------------
	*/
	require_once(Framework_Location . Framework_Directory . DS . 'Core' . DS . 'BootStrap.php');

}

?>