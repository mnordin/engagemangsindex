<?php
//include_once "../includeAllFunctions.php";
$i = 1;
do {
	$docList = simplexml_load_file("http://data.riksdagen.se/dokumentlista/?rm=2009%2F10&typ=mot&utformat=xml&p=".$i);
	$docStatus = simplexml_load_file($docList->dokument->dokumentstatus_url_xml);
	usleep(500);
	echo "<pre>";
	print_r($docList);
	echo "</pre>";
	echo "N€STA POST". $docList->attributes()->nasta_sida;
	//spara till db
	$i++;
}
	while ($i<=3);
?>