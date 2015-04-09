<?php namespace core;

/*
 * config - an example for setting up system settings
*/
class Config {

	public function __construct() {

		//turn on output buffering
		ob_start();

		//site address
		define('DIR', 'http://localhost/sampleapp/');

		//set default controller and method for legacy calls
		define('DEFAULT_CONTROLLER', 'welcome');
		define('DEFAULT_METHOD' , 'index');

		//set a default language
		define('LANGUAGE_CODE', 'en');

		//database details ONLY NEEDED IF USING A DATABASE
		define('DB_TYPE', 'mysql');
		define('DB_HOST', 'localhost');
		define('DB_NAME', 'sampleapp');
		define('DB_USER', 'root');
		define('DB_PASS', '');
		define('PREFIX', 'dc_');

		//set prefix for sessions
		define('SESSION_PREFIX', 'dc_');

		//optionall create a constant for the name of the site
		define('SITETITLE', 'Home');

		//turn on custom error handling
		set_exception_handler('core\logger::exception_handler');
		set_error_handler('core\logger::error_handler');

		//set timezone
		date_default_timezone_set('America/New_York');

		//start sessions
		\helpers\session::init();

		//set the default template
		\helpers\session::set('template', 'default');
	}

}
