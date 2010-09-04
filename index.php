<?php
	require_once "includeAllFunctions.php";
	$url = 'http://data.riksdagen.se/dokumentlista/?rm=&typ=mot&sz=20&sort=d&utformat=xml';
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
						</tr>
					</thead>
					<tbody>
					<?php foreach($motioner->dokument as $motionDokument): ?>
						<tr>
						<?php echo '<td><a href="#">' . $motionDokument->titel . '</a></td>'; ?>
						<td></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</section>
	</body>
</html>