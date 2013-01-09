<?php
global $wpdb;
global $user_id;

$user_id=get_current_user_id();
$url = "/ncc/wp-admin/admin.php?page=notification";
if(isset($_REQUEST['message_id']))
{
	$message_id=$_REQUEST['message_id'];
	$result=$wpdb->query("UPDATE notification SET  isread = 0  where message_id=".$message_id);
}
?>

<table class="widefat" >
	<tr>
		<th>FROM</th>
		<th>SUBJECT</th>
		<th>READ/UNREAD </th>
		<th>Time</th>
	</tr>
<?php
	$results=$wpdb->get_results("SELECT * FROM notification  WHERE user_id=".$user_id." ORDER BY `Current_time` DESC" );
	foreach ( $results as $result ) 
		{
			?>

			<tr onclick="document.location = '<?php echo $url; ?>&message_id=<?php echo $result->message_id; ?>'" style="cursor: pointer;">
            	<td>ADMIN</td>
            	<td><?php echo $result->subject; ?></td>
            	<td><?php if($result->isread==1) echo "unread *****";else echo "Read"; ?></td>
            	<td><?php echo $result->Current_time; ?></td>
            </tr>
            <?php
		}
?>
</table>