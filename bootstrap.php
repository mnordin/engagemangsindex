<?php
/**
 * Prepare for work, tie your shoes and get ready.
 */
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('FUNCTIONS', ROOT . DS . 'functions');

/**
 * ikluderar alla php filer ifrån en mapp
 */
function includeAll($path) {
	foreach (glob($path . '/*.php') as $filename) {
		include_once($filename);
	}
}

includeAll(FUNCTIONS);

?>