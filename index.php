<?php
	require_once "bootstrap.php";
	
	$motioner = mysql_query("SELECT * FROM motion");
	
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
							<th>Datum</th>
							<th>RM</th>
							<th>Subtyp</th>
						</tr>
					</thead>
					<tbody>
					<?php while($motion = mysql_fetch_assoc($motioner)) : ?>
						<tr>
							<td><?= $motion['titel']; ?></td>
							<td><?= $motion['antal_intressenter']; ?></td>
							<td><?= $motion['organ']; ?></td>
							<td><?= $motion['datum']; ?></td>
							<td><?= $motion['rm']; ?></td>
							<td><?= $motion['subtyp']; ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</section>
	</body>
</html>