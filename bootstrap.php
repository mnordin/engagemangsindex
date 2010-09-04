<?php
/**
 * Prepare for work, tie your shoes and get ready.
 */
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('FUNCTIONS', ROOT . DS . 'functions');
define('CLASSES', ROOT . DS . 'classes');

/**
 * ikluderar alla php filer ifrån en mapp
 */
function includeAll($path) {
	foreach (glob($path . '/*.php') as $filename) {
		include_once($filename);
	}
}

includeAll(FUNCTIONS);
includeAll(CLASSES);

if(file_exists(ROOT . DS . 'database.php')) {
	include_once ROOT . DS . 'database.php';
} else {
	require_once ROOT . DS . 'database.default.php';
}

if(!mysql_connect($database['server'], $database['user'], $database['password'])) {
	trigger_error('db connection not established', E_USER_NOTICE);
}
if(!mysql_select_db($database['db_name'])) {
	trigger_error('db could not be selected', E_USER_NOTICE);
}

?>
