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
#####Props
	$intressenterPerOrganData2 = mysql_query("SELECT count(organ) as antal_intressenter, organ as organ_namn FROM proposition GROUP BY organ");
	
	$intressenterPerOrgan2 = array();
	$antal_intressenter2 = array();
	$organ_namn2 = array();
	
	while($organ2 = mysql_fetch_assoc($intressenterPerOrganData2)) {
		$organ2['organ_namn'] = organizer($organ2['organ_namn']) . ' (' . $organ2['organ_namn'] . ')';
		$intressenterPerOrgan2[] = $organ2;
	}
	
	$js_string2 = '';
	
	foreach($intressenterPerOrgan2 as $index => $organ2) {
		$js_string2 .= 'data.setValue('.$index.', 0, \''.$organ2['organ_namn'].'\');';
		$js_string2 .= 'data.setValue('.$index.', 1, '.$organ2['antal_intressenter'].');';
	}

	

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Engagemangsindex</title>
		<meta name="description" content="">
		<link rel="stylesheet" href="stylesheets/structure.css" media="all">
		<script type="text/javascript" src="js/jquery.1.4.2-min.js"></script>
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
	        chart.draw(data, {width: 1450, height: 1300, title: 'Engagemangsindex motioner'});
	        
	      }
	    </script>
	    <script type="text/javascript">
	      google.load("visualization", "1", {packages:["corechart"]});
	      google.setOnLoadCallback(drawChart);
	      function drawChart() {
	        var data = new google.visualization.DataTable();
	        data.addColumn('string', 'Organ');
	        data.addColumn('number', 'Antal Intressenter');
	        data.addRows(<?php echo count($intressenterPerOrgan2); ?>);
	        <?php echo $js_string2;?>
	
	        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
	        chart.draw(data, {width: 1450, height: 1300, title: 'Engagemangsindex propositioner'});
	        
	      }
	
				function showBarChart() {
					hideCharts();
					$("#bar_chart").removeClass("hide").addClass("show");
				}
				
				function showPieChart() {
					hideCharts();
					$("#pie_chart").removeClass("hide").addClass("show");
				}
				
				function hideCharts() {
					$("#pie_chart").removeClass("show").addClass("hide");
					$("#bar_chart").removeClass("show").addClass("hide");
				}
				
	    </script>
	
	</head>
	<body>
		<section>
			<header>
				<h1>Engagemangsindex</h1>
				<nav>
					<ul>
						<li><a href="#" onclick="showBarChart();">Visa stapeldiagram</a></li>
						<li><a href="#" onclick="showPieChart();">Visa pajdiagram</a></li>
					</ul>
				</nav>
			</header>
			

			<div id="pie_chart" class="hide"></div>

			<div id="chart_div"></div>
			<div id="chart_div2"></div>
			
			<div id="bar_chart"></div>
			
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