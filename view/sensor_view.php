<table class="w3-table-all w3-card-4">
				<tr>
					<th>Sensor Name</th>
					<th>Status</th>
					<th>Value</th>
				</tr>
<?php
    $sensor_tbl = "";
	if ($data)
	{
		foreach ($data as $sensor)
		{
			$sensor_tbl .= '<tr class="w3-hover-green">
								<td>'.$sensor->sID.'</td>
								<td>'.$sensor->sStatus.'</td>
								<td>'.$sensor->SValue.'</td>
							</tr>';
		}
	}
	else	
	{
		$sensor_tbl .= '<tr class="w3-hover-green">
								<td>'.$sid.'</td>
								<td>no data</td>
								<td>no data</td>
							</tr>';
	}
	echo $sensor_tbl;
?>
</table>
