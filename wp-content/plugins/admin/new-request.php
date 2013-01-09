<?php
if(isset($_REQUEST['action'])&& isset($_REQUEST['user']) && ($_REQUEST['action']==newrequest))
{$url = "/ncc/wp-admin/admin.php?page=".$_REQUEST['page']."&user=".$_REQUEST['user'];
	$table_name=$_REQUEST['user'];
	?>
	<table class="widefat">
	<tr>
	<td>ID</th>
	<th>Categories </th>
	<th>View Details</th>
	<th> Status</th>
</tr>

<?php
$results=$wpdb->get_results("SELECT * FROM ".$table_name." WHERE status='New'");
		foreach ( $results as $result ) 
		{
			?>
			<tr><td><?php echo $result->user_id; ?></td>
				<td><?php echo $result->main_category; ?></td>
				<td><input type="button" class="button" value="View Details" name="button" onClick="document.location='<?php echo $url;?>&action=status&appno=<?php echo $result->application_no; ?>&userid=<?php echo $result->user_id; ?>'"></td>
				<td><?php echo $result->status; ?></td>
			</tr>
			<?php
		}



}
?>