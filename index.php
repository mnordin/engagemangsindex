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
	//print_r($intressenterPerOrgan);
	echo '</pre>';

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
	
	        var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
	        chart.draw(data, {width: 1200, height: 1000, title: 'Engagemangsindex'});
	        
	      }
		</script>
		<script type="text/javascript">
			google.load("visualization", "1", {packages:["corechart"]});
    	google.setOnLoadCallback(drawChart);
	    
	
	      function drawChart() {
	        var data = new google.visualization.DataTable();
	        data.addColumn('string', 'Organ');
	        data.addColumn('number', 'Antal Intressenter');
	        data.addRows(<?php echo count($intressenterPerOrgan); ?>);
					
	        <?php echo $js_string;?>
	
	        var chart = new google.visualization.ColumnChart(document.getElementById('bar_chart'));
	        chart.draw(data, {width: 1200, height: 1000, title: 'Engagemangsindex'});
	        
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
			
			<?php //echo $js_string;?>
			
			<div id="pie_chart" class="hide"></div>
			
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