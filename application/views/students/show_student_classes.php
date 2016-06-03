<?php
	foreach ($Present->result() as $key) {

		?>
		<tr>
			<td><?php echo $key->name; ?></td>
			<td><?php echo $key->father_name; ?></td>
			<td><label class="std_id"><?php echo $key->s_id;?></label></td>
			<td style="display:none;"><label class="class_id" ><?php echo $key->ClassNo;?></label></td>		
			<td>
			    <label class="radio-inline">
			      <input type="radio"  class="att" name="attr"  value="p">P
			    </label>
			    <label class="radio-inline">
			      <input type="radio"  class="att" name="attr"  value="a">A
			    </label>
			    <label class="radio-inline">
			      <input type="radio"  class="att" name="attr"  value="l">L
			    </label>
 				
		  </td>
		</tr>
		<?php 
		} 
		?>
	

