<?php
include_once "../includeAllFunctions.php";

$docList = simplexml_load_file("http://data.riksdagen.se/dokumentlista/?rm=2009%2F10&typ=mot&utformat=xml&p=3");
echo "<pre>";
print_r($docList);
echo $_SERVER['PHP_SELF'];
echo "</pre>";

$docStatus = simplexml_load_file($docList->dokument->dokumentstatus_url_xml);
echo "<pre>";
echo getNumberOfIntressenter($docStatus);
echo "</pre>";

?>