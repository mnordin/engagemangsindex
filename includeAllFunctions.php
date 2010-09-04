<?php
function includeAllFunctions($cataloge) {
	/*
	 ikluderar alla php filer ifrån en mapp
		*/
	foreach (glob($cataloge . "/*.php") as $filename) {
		include_once($filename);
	}
}

includeAllFunctions("functions");