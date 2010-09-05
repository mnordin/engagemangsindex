<?php
require_once "../bootstrap.php";

	$i = $_GET['i'];

	$motioner = new SimpleXMLElement(file_get_contents("http://data.riksdagen.se/dokumentlista/?rm=2009%2F10&typ=prop&sort=d&utformat=xml&p=$i"));


	$docStatus = simplexml_load_file($motioner->dokument->dokumentstatus_url_xml);
	$organ = getOrgan($docStatus);
	$titel = getTitel($docStatus);
	$datum = getDatum($docStatus);
	$rm = $docStatus->dokument->rm;
	$subtyp = $docStatus->dokument->subtyp;
	$hangar_id = $docStatus->dokument->hangar_id;


$query = "INSERT INTO proposition (titel, organ, datum, rm, subtyp, hangar_id) VALUES ('$titel', '$organ', '$datum', '$rm', '$subtyp', '$hangar_id')";
echo "$query <br/><br/>";
$result = mysql_query($query);

if($result) {
	echo "<h1 style='font-size:300%'>$i OK</h1>";
} else {
	echo mysql_error();
}

?>