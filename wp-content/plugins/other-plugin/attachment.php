<?php
global $wpdb;
	global $current_user;
	get_current_user_id();
 	$user_email= $current_user->user_email;
	$admin_email = get_settings('admin_email');
	?>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
<?php

if($_REQUEST['email_id'])
{
?>
<input type="text" name="subject"  value="Notification From <admin><?php  echo $admin_email; ?>"  size='50'/></br>
to<input type="text" name="to" value="<?php echo $_REQUEST['email_id'] ?>" /></br>

<?php
}
else
{
?>
	<input type="text" name="subject"  value="Notification From <?php  echo $user_email; ?>"  size='70'/></br>
<?php
}
?>
attach file : <input type="file" name="file"></br>

Message:<textarea cols="20" rows="5" name="message"></textarea></br>
<input type="submit" value="submit" name="submit">
</form>


<?php

if(isset($_REQUEST['submit'])&& isset($_REQUEST['email_id']))
{
	$user_id=$_REQUEST['userid'];
	$to =$_REQUEST['email_id'];
	$attachments = array($_FILES["file"]["tmp_name"]);
	$wpdb->insert( 'notification', 	array('user_id' =>$user_id, 
					  'subject' =>$_REQUEST['message'],
					  'Current_time'=>now()
		  ));
	}
else
{	
	//move_uploaded_file($_FILES["file"]["tmp_name"],WP_CONTENT_DIR.'/uploads/'.basename($_FILES["file"]["name"]));
	$attachments = array($_FILES["file"]["tmp_name"]);
	wp_mail($admin_email,$_REQUEST['subject'],$_REQUEST['message'],$admin_email,$attachments);
	
}

?>