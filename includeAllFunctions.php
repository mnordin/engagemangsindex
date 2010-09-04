<?php
function includeAllFunctions($cataloge) {
	
	chroot("./");
	/*
	 ikluderar alla php filer ifrån en mapp
		*/
	foreach (glob("/functions/*.php") as $filename) {
		include_once($filename);
	}
}

includeAllFunctions("functions");
