<?php 
	function getMotionerWithMostIntressenter($antal = 10) {
		
		$return = '';
		
		$sql = 'SELECT * FROM motion ORDER BY antal_intressenter DESC LIMIT 0,'.$antal;
		$result = mysql_query($sql);
		
		$return .= '<table>
					<thead>
						<tr>
							<th>Motionstitel</th>
							<th>Engagemangsindex</th>
						</tr>
					</thead>
					<tbody>';
		
		while ($motion = mysql_fetch_assoc($result)) {
						$return .= '<tr>
							<td>';
						$return .= '<a href="http://data.riksdagen.se/dokument/'.$motion['dok_id'].'">'.$motion['titel'].'</a>';
						$return .= '</td><td>';
						$return .= $motion['antal_intressenter'];
						$return .= '</td></tr>';
		}
		
		$return .= '</tbody></table>';
		
		return $return;
		
	}