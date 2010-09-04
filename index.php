<?php
	require_once "bootstrap.php";
	$url = 'http://data.riksdagen.se/dokumentlista/?rm=&typ=mot&sz='.$_GET['s'].'&sort=d&utformat=xml';
	$motioner = new SimpleXMLElement(file_get_contents($url));
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Engagemangsindex</title>
		<meta name="description" content="">
		<link rel="stylesheet" href="stylesheets/structure.css" media="all">
	</head>
	<body>
		<section>
			<header>
				<h1>Engagemangsindex</h1>
				<nav>
					<ul>
						<li><a href=""></a></li>
					</ul>
				</nav>
			</header>
				<table>
					<thead>
						<tr>
							<th>Motionstitel</th>
							<th>Intressenter</th>
							<th>Organ</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($motioner->dokument as $motionDokument): ?>
						<tr>
							<?php $motionstatus = new SimpleXMLElement(file_get_contents($motionDokument->dokumentstatus_url_xml)); ?>
							<?php echo '<td><a href="'.$motionDokument->dokument_url_html.'">' . $motionDokument->titel . '</a></td>'; ?>
							<?php echo '<td><a href="'. $motionDokument->dokumentstatus_url_xml .'">' . 
							getNumberOfIntressenter($motionstatus)
							. '</a></td>'; ?>
							<?php echo '<td><a href="'. $motionDokument->dokumentstatus_url_xml .'">' .
							getOrgan($motionstatus)
							. '</a></td>'; ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</section>
	</body>
</html>