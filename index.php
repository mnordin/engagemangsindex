<?php
	require_once "bootstrap.php";
	
	$intressenterPerOrganData = mysql_query("SELECT sum(antal_intressenter) as antal_intressenter, organ as organ_namn FROM motion GROUP BY organ ORDER BY antal_intressenter DESC");
	
	$intressenterPerOrgan = array();
	$antal_intressenter = array();
	$organ_namn = array();
	
	while($organ = mysql_fetch_assoc($intressenterPerOrganData)) {
		$organ['organ_namn'] = organizer($organ['organ_namn']) . ' (' . $organ['organ_namn'] . ')';
		$intressenterPerOrgan[] = $organ;
	}
	
	$js_string = '';
	
	foreach($intressenterPerOrgan as $index => $organ) {
		$js_string .= 'data.setValue('.$index.', 0, \''.$organ['organ_namn'].'\');';
		$js_string .= 'data.setValue('.$index.', 1, '.$organ['antal_intressenter'].');';
	}
	
	echo '<pre>';
	print_r($intressenterPerOrgan);
	echo '</pre>';
	
	$pieChartUrl = 'http://chart.apis.google.com/chart?cht=p3&chd=t:'. $antal_intressenter .'&chs=900x330&chl=' . $organ_namn;
	echo $pieChartUrl;
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
		<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	    <script type="text/javascript">
	      google.load("visualization", "1", {packages:["corechart"]});
	      google.setOnLoadCallback(drawChart);
	      function drawChart() {
	        var data = new google.visualization.DataTable();
	        data.addColumn('string', 'Organ');
	        data.addColumn('number', 'Antal Intressenter');
	        data.addRows(<?php echo count($intressenterPerOrgan); ?>);
	        <?php echo $js_string;?>
	
	        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
	        chart.draw(data, {width: 1450, height: 1300, title: 'Engagemangsindex'});
	        
	      }
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
			
			<?php echo $js_string;?>
			
			<div id="chart_div"></div>
			
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
			<!-- 
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
			 -->
		</section>
	</body>
</html>