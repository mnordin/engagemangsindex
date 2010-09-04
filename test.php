<?php
include_once "includeAllFunctions.php";

$xml = file_get_contents("http://data.riksdagen.se/dokumentstatus/GX02Fi15");

$x = new SimpleXMLElement($xml);

print_r($x->dokaktivitet->aktivitet[0]["namn"]);
echo "----";
echo "<pre>";
print_r($x);
echo "</pre>";

