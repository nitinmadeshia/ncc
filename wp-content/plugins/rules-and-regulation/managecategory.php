<h1>Manage Category Page</h1>
<label>Add New Category</label>
<input type="text" name="txtNewCategory" /> <br />
<br />
<label>List of Category</label>
<table class="widefat">
	
	<tr>
		<td>Category Name</td>
		<td>edit category</td>
		<td>delete category</td>
	</tr>
	<?php
	for($i=1;$i<=4;$i++)
	{
	?>
	<tr>
		<td>sample category <?php echo $i?></td>
		<td><a href="#">edit</a></td>
		<td><a href="#">delete</a></td>
	</tr>
	<?php
	}
	?>
	</table>