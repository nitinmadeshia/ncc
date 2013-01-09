<?php
global $wpdb;
require_once('changedata.php');
if(isset($_REQUEST['page']) && isset($_REQUEST['user']) && !isset($_REQUEST['action']))
{
$url = "/ncc/wp-admin/admin.php?page=".$_REQUEST['page']."&user=".$_REQUEST['user'];

	$table_name=$_REQUEST['user'];
		?>
   <table border="2" class="widefat" >
   	<tr>
        <th>ID</th>
        <th>Activate/Deactivate</th>
        <th>Company Name </th>
        <th>View Details</th>
        <th>Delete</th>
        <th>Reset Password</th>
        <th>Phone Number</th>
        <th>Email Id</th>
        <th>Send Notification</th>
   </tr>
    <?php
	$results = $wpdb->get_results("SELECT * FROM ".$table_name." where status='Accept'");
		foreach ( $results as $result ) 
		{
        	$user_id=$result->user_id;
			$active=$wpdb->get_var("SELECT ".$_REQUEST['user']." FROM cms_register where user_id=".$user_id);
	?>
			<tr>
            <td><?php echo $user_id ?></td>
            <td><input type="button" class="button" value="<?php if($active == 0) echo $is='Active';else echo $is='Deactive'; ?>"name="button" onClick="document.location='<?php echo $url; ?>&action=<?php echo $is ?>&userid=<?php echo $user_id; ?>'"></td>
			<td><?php echo $result->company_name; ?></td>
            <td><input type="button" class="button" value="View Details" name="button" onclick="document.location='<?php echo $url; ?>&action=viewdetails&appno=<?php echo $result->application_no; ?>'"></td>
            <td><input type="button" class="button" value="Delete" name="button" onclick="document.location='<?php echo $url; ?>&action=delete&userid=<?php echo $user_id; ?>'"></td>
        
             <td><a onClick="myDialog.show()">Reset Password</a></td>
             <td><?php echo $result->telephone_no_registered; ?> </td>
             <td><?php echo $result->email_id_registered; ?> </td>
             <td><a href="<?php $_SERVER['REQUEST_URI'] ?>?page=send_attachment&email_id=<?php echo $result->email_id_registered; ?>&userid=<?php echo $user_id; ?>">send notification</a></td>
    </tr>         		
                
    <?php
		}
    ?>
    </table>
        
        <?php
}
?>