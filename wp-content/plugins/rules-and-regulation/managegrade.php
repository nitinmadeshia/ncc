<h1>Manage Grades</h1>
<label>Add New Grade</label>
<input type="text" name="txtNewGrade" /> <br />
<br />
<label>List of Grades</label>
<table class="widefat">
	
	<tr>
		<td>Grade Name</td>
		<td>edit grade</td>
		<td>delete grade</td>
	</tr>
	<?php
	for($i=1;$i<=4;$i++)
	{
	?>
	<tr>
		<td>sample grade <?php echo $i?></td>
		<td><a href="#">edit</a></td>
		<td><a href="#">delete</a></td>
	</tr>
	<?php
	}
	?>
	</table>