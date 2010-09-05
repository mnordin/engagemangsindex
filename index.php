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
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
		<script src="js/jgcharts.pack.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				var api = new jGCharts.Api(); 
				jQuery('<img>') 
				.attr('src', api.make({
					data : [[<?=$_GET['1_1']?>], [<?=$_GET['2_1']?>], [<?=$_GET['3_1']?>]],
					type : 'p',
					size : '400x400',
					legend : ['hej', 'nej', 'tjej']
				})) 
				.appendTo("#bar1");
			});
		</script>
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
			
			<div id="bar1"></div>
			
			<form method="GET" action="">
				<input name="1_1" type="text" value="<?=$_GET['1_1']?>"></input>
				<input name="1_2" type="text" value="<?=$_GET['1_2']?>"></input>
				<input name="1_3" type="text" value="<?=$_GET['1_3']?>"></input>
				<input name="2_1" type="text" value="<?=$_GET['2_1']?>"></input>
				<input name="2_2" type="text" value="<?=$_GET['2_2']?>"></input>
				<input name="2_3" type="text" value="<?=$_GET['2_3']?>"></input>
				<input name="3_1" type="text" value="<?=$_GET['3_1']?>"></input>
				<input name="3_2" type="text" value="<?=$_GET['3_2']?>"></input>
				<input name="3_3" type="text" value="<?=$_GET['3_3']?>"></input>
				<input type="submit"></input>
			</form>
			
			<br />
			
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