<?php
	foreach ($Att->result() as $key) {
		?>
		<tr>
			<td><?php echo $key->name; ?></td>
			<td><?php echo $key->Attendance; ?></td>
			<td><?php echo $key->Att_Date; ?></td>
		</tr>

		<?php
	}

?>