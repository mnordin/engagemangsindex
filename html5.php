<?php
	require_once "includeAllFunctions.php";
?><!DOCTYPE html>
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
							<th>Motion</th>
							<th>Intressenter</th>
						</tr>
					</thead>
					<tbody>
					
					<?php foreach() : ?>
						<tr>
							<td>Motion</td>
							<td><?= getNumberOfIntressenter(); ?></td>
						</tr>
					<?php endforeach; ?>
					
					</tbody>
					<tfoot>
						<tr>
							<td>Motion</td>
							<td>Intressenter</td>
						</tr>
					</tfoot>
				</table>

				<footer></footer>

			</section>

		</body>
	</html>
