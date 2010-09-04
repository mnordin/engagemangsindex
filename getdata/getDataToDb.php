<?php
include_once "../bootstrap.php";
$i = 1;
do {
	$docList = simplexml_load_file("http://data.riksdagen.se/dokumentlista/?rm=2009%2F10&typ=mot&utformat=xml&p=".$i);
	$docStatus = simplexml_load_file($docList->dokument->dokumentstatus_url_xml);
	usleep(500);
	//fält
	echo "<pre>";
	 $dok_id = $docStatus->dokument->dok_id;
	 $titel=$docStatus->dokument->titel;
	 $antal_intressenter = getNumberOfIntressenter($docStatus);
	 $organ = $docStatus->dokument->organ; 
	 $datum = $docStatus->dokument->datum;
	 $rm = $docStatus->dokument->rm;
	 $subtyp = $docStatus->dokument->subtyp;
	 $hangar_id =$docStatus->dokument->hangar_id;
	mysql_query("INSERT INTO motion 
		(dok_id , titel , antal_intressenter , organ , datum , rm , hangar_id )
		VALUES ( $dok_id ,$titel,$antal_intressenter,$organ,$datum,$rm,$hangar_id");
	echo $dok_id . ":".$titel. ":".$antal_intressenter. ":".$organ. ":".$datum. ":".$rm. ":".$hangar_id. ":";
	echo "NÄSTA POST". $docList->attributes()->nasta_sida;
	echo "</pre>";
	//spara till db
	$i++;
}
	while ($i<=10);
?>