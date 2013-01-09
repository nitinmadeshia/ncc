<?php
$gradePage=site_url('/wp-admin/admin.php?page=grade');
$action=$_REQUEST['action'];
$table='grade';
global $wpdb;
//======================= Actions Below ========================
if ($action=='delete'){
	$gradeTable='grade';
	$id=$_REQUEST['id'];
	$data=array('is_delete'=>1);
	$where=array('id'=>$id);
	$wpdb->update($gradeTable,$data,$where);
	echo '<b>Deleted Successfully.</b>';
    echo "<script>location ='$gradePage'</script>";
}
if ($action=='addSubCategorySubmit') {
	$parent_code=$_REQUEST['parent_code'];
	$category_code=$_REQUEST['category_code'];
	$construction_activity=$_REQUEST['construction_activity'];
	$data=array('parent_code' =>$parent_code,'category_code'=>$category_code,'construction_activity'=>$construction_activity );
	$wpdb->insert($table,$data) or die (mysql_error());
	echo '<b>Successfully Submitted.</b>';
    echo "<script>location ='$gradePage'</script>";

}
if ($action=='addParentSubmit') {
	$parent_grade=$_REQUEST['parent_grade'];
	$construction_activity=$_REQUEST['construction_activity'];
	$data=array('category_code'=>$parent_grade,'construction_activity'=>$construction_activity,'parent_code'=>0);
	$wpdb->insert($table,$data) or die (mysql_error());
	echo '<b>Successfully Submitted.</b>';
    echo "<script>location ='$gradePage'</script>";
}
?>


<?php
//======================= Forms Below ========================
if ($action=='addSubCategory') {
?>
<table class="widefat">
	<form method='post' action="<?php echo $_SERVER['REQUEST_URI']?>">
		<thead>
			<th>Add Sub Category</th>
			<th></th>
		</thead>
		<tbody>
			<tr>
				<td>
					<label class="description">Parent Code </label>
				</td>
				<td>
					<select name="parent_code" style="width:230px;">
						<?php
							$parent_array=$wpdb->get_results("SELECT `category_code`, `construction_activity` FROM `grade` WHERE `parent_code`='0'") or die( mysql_error());
							foreach ($parent_array as $key) {
								echo '<option value="'.$key->category_code.'" >'.$key->category_code.' ['.$key->construction_activity.']'.'</option>';
							}
						?> 

					</select>
					
				</td>
			</tr>

			<tr>
				<td>
					<label class="description">Category Code </label>
				</td>
				<td>
					<input type="text" name="category_code" maxlength="255" value=""/> 
				</td>
			</tr>
			<tr>
				<td>
					<label class="description">Construction Activity</label>
				</td>
				<td>
					<input type="text" name="construction_activity" maxlength="255" value=""/> 
				</td>
			</tr>
			<tr>
				<td><input type="hidden" name='action' value='addSubCategorySubmit'></td>
				<td><input type="submit" name="submit" value="Submit" /></td>
			</tr>		
		</tbody>
	</form>
</table>
<?php
}
?>

<?php
if ($action=='addParent') {
?>
<table class="widefat">
	<form method='post' action="<?php echo $_SERVER['REQUEST_URI']?>">
		<thead>
			<th>Add Parent</th>
			<th></th>
		</thead>
		<tbody>
			<tr>
				<td>
					<label class="description">Construction Activity</label>
				</td>
				<td>
					<input type="text" name="construction_activity" maxlength="255" value=""/> 
				</td>
			</tr>
			<tr>
				<td>
					<label class="description">Grade Code </label>
				</td>
				<td>
					<input type="text" name="parent_grade" maxlength="255" value=""/> 
				</td>
			</tr>
			<tr>
				<td><input type="hidden" name='action' value='addParentSubmit'></td>
				<td><input type="submit" name="submit" value="Submit" /></td>
			</tr>		
		</tbody>
	</form>
</table>
<?php
}
?>

<?php
if (!isset($_REQUEST['action'])) {

?>
<table class="widefat">
	<thead>
		<th>Name</th>
		<th>Type</th>
		<th>Parent</th>
		<th>Code</th>
		<th>Delete</th>
	</thead>
	<tbody>
		<?php
			$list_array=$wpdb->get_results("SELECT * FROM `grade` WHERE `is_delete`=0") or die( mysql_error());
			foreach ($list_array as $key) {
		?>		
		<tr>
			<td><?php echo $key->construction_activity ?></td>
			<td><?php if ($key->parent_code=='0') {echo 'Parent category';} else echo 'Sub category' ?></td>
			<td><?php echo $key->parent_code?></td>
			<td><?php echo $key->category_code ?></td>
			<td><a href="<?php echo $gradePage.'&action=delete&id='.$key->id ?>">Delete</a></td>
		</tr>
		<?php
			}
		
		?>
	</tbody>
</table>	
<?php
}
?>
<a href='<?php echo $gradePage; ?>'>List of Grades</a>
<a href='<?php echo $gradePage; ?>&action=addSubCategory'>Add Sub Category</a>
<a href='<?php echo $gradePage; ?>&action=addParent'>Add Parent</a>



