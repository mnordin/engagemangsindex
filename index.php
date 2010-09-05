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
				// PAJDIAGRAM MOTIONER
	      google.load("visualization", "1", {packages:["corechart"]});
	      google.setOnLoadCallback(drawChart);
	      function drawChart() {
	        var data = new google.visualization.DataTable();
	        data.addColumn('string', 'Organ');
	        data.addColumn('number', 'Antal Intressenter');
	        data.addRows(<?php echo count($intressenterPerOrgan); ?>);
	        <?php echo $js_string;?>

	        var chart = new google.visualization.PieChart(document.getElementById('pie_chart_mot'));
	        chart.draw(data, {width: 900, height: 750, title: 'Engagemangsindex motioner 2009-09-16 till 2010-07-14'});
	        
	      }
	    </script>
	    <script type="text/javascript">
				// PAJDIAGRAM PROPOSITIONER
	      google.load("visualization", "1", {packages:["corechart"]});
	      google.setOnLoadCallback(drawChart);
	      function drawChart() {
	        var data = new google.visualization.DataTable();
	        data.addColumn('string', 'Organ');
	        data.addColumn('number', 'Antal Intressenter');
	        data.addRows(<?php echo count($intressenterPerOrgan2); ?>);
	        <?php echo $js_string2;?>
	
	        var chart = new google.visualization.PieChart(document.getElementById('pie_chart_prop'));
	        chart.draw(data, {width: 900, height: 750, title: 'Engagemangsindex propositioner 2009-10-04 till 2010-06-18'});
	        
	      }
			</script>
			<script type="text/javascript">
				// STAPELDIAGRAM MOTIONER
	      google.load("visualization", "1", {packages:["corechart"]});
	      google.setOnLoadCallback(drawChart);
	      function drawChart() {
	        var data = new google.visualization.DataTable();
	        data.addColumn('string', 'Organ');
	        data.addColumn('number', 'Antal Intressenter');
	        data.addRows(<?php echo count($intressenterPerOrgan); ?>);
	        <?php echo $js_string;?>

	        var chart = new google.visualization.ColumnChart(document.getElementById('bar_chart_mot'));
	        chart.draw(data, {width: 900, height: 750, title: 'Engagemangsindex motioner 2009-09-16 till 2010-07-14'});
	        
	      }
	    </script>
	    <script type="text/javascript">
				// STAPELDIAGRAM PROPOSITIONER
	      google.load("visualization", "1", {packages:["corechart"]});
	      google.setOnLoadCallback(drawChart);
	      function drawChart() {
	        var data = new google.visualization.DataTable();
	        data.addColumn('string', 'Organ');
	        data.addColumn('number', 'Antal Intressenter');
	        data.addRows(<?php echo count($intressenterPerOrgan2); ?>);
	        <?php echo $js_string2;?>
	
	        var chart = new google.visualization.ColumnChart(document.getElementById('bar_chart_prop'));
	        chart.draw(data, {width: 900, height: 750, title: 'Engagemangsindex propositioner 2009-10-04 till 2010-06-18'});
	        
	      }
			</script>
			
	    <script type="text/javascript">

				function showBarChartMot() {
					hideCharts();
					$("#bar_chart_mot").removeClass("hide").addClass("show");
				}
				
				function showPieChartMot() {
					hideCharts();
					$("#pie_chart_mot").removeClass("hide").addClass("show");
				}
				
				function showBarChartProp() {
					hideCharts();
					$("#bar_chart_prop").removeClass("hide").addClass("show");
				}
				
				function showPieChartProp() {
					hideCharts();
					$("#pie_chart_prop").removeClass("hide").addClass("show");
				}
				
				function hideCharts() {
					$("#bar_chart_mot").removeClass("show").addClass("hide");
					$("#pie_chart_mot").removeClass("show").addClass("hide");
					$("#bar_chart_prop").removeClass("show").addClass("hide");
					$("#pie_chart_prop").removeClass("show").addClass("hide");
				}
				
				$(document).onload(function(){
					$("a:first").click();
				})
				
	    </script>
	
	</head>
	<body>
		<section>
			<header>
				<h1>Engagemangsindex</h1>
				<nav>
					<ul>
						<li class="sub">Motioner<ul>
							<li><a href="#" onclick="showBarChartMot();">Visa stapeldiagram</a></li>
							<li><a href="#" onclick="showPieChartMot();">Visa pajdiagram</a></li>
						</ul>
						<li class="sub">Propositioner<ul>
							<li><a href="#" onclick="showBarChartProp();">Visa stapeldiagram</a></li>
							<li><a href="#" onclick="showPieChartProp();">Visa pajdiagram</a></li>
						</ul>
					</ul>
				</nav>
			</header>
			

			<div id="bar_chart_mot" class="show"></div>

			<div id="pie_chart_mot" class="hide"></div>
			
			<div id="bar_chart_prop" class="hide"></div>
			
			<div id="pie_chart_prop" class="hide"></div>
		
			

			 <?php 
			 	if(isset($_GET['am'])){
				 	$antalMotioner = $_GET['am'];
			 	} else {
				 	$antalMotioner = 10;
			 	}
			 ?>
			<section id="mostpopular">
			 <form action="" method="get">
				<p>De <input type="text" size="3" name="am" <?php echo 'value="'.$antalMotioner.'"';?>></input> mest engagerande motionerna:</p>
			 </form>
			<?php echo getMotionerWithMostIntressenter($antalMotioner); ?>
			</section>
		</section>
	</body>
</html>