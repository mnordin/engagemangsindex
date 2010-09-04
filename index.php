<?php 
	$url = 'http://data.riksdagen.se/dokumentlista/?rm=&typ=mot&sz=200&sort=d&utformat=xml';
	$motioner = new SimpleXMLElement(file_get_contents($url));
	
	$motionListaHtml = '';
	$motionListaHtml .= '<ul>';
	
	foreach($motioner->dokument as $motionDokument) {
		
		$motionListaHtml .= '<li>';
		$motionListaHtml .= '<a href="#">' . $motionDokument->titel . '</a>';
		$motionListaHtml .= '</li>';
	}
	
	$motionListaHtml .= '</ul>';
	
	echo $motionListaHtml;