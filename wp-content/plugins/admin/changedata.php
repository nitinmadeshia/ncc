<?php
global $wpdb;
$table_name=$_REQUEST['user'];
$user_id=$_REQUEST['userid'];
$app_no=$_REQUEST['appno'];

if(isset($_REQUEST['action'])&& ($_REQUEST['action']=='Active' ))
{
	
	$state=1;
	$wpdb->update( $table_name, array('is_active' => '1'), array( 'user_id' => $user_id,'application_no'=>$app_no ) ) or die (mysql_error());
	$wpdb->insert('notification', 	array('user_id' =>$user_id,  'subject' =>'Your '.$table_name. ' Account has been Activated by Admin Enjoy')) or die (mysql_error());
	require_once("accessrole.php");
	changerole($table_name,$user_id,$state);
	
	
}
if ($_REQUEST['action']=='Deactive'):

	$state=0;

	$wpdb->insert('notification', 	array('user_id' =>$user_id,  'subject' =>'Your '.$table_name. ' Account has been DeActivated by Admin kindly contect to Admin')) or die (mysql_error());

	$wpdb->update( $table_name, array('is_active' => '0'), array( 'user_id' => $user_id,'application_no'=>$app_no ) ) or die (mysql_error());

	$query="SELECT * FROM `contractorsregistration` WHERE `status`='Accept' AND `is_submitted`=1 AND `user_id`=".$user_id;
	$result=$wpdb->get_results($query) or die (mysql_error());
	$abc=count($result);
	foreach ($result as $key) {
		$catch=$key->is_active;
		if ($catch=1)
		{
			$setState=0;
		}
	}

		
	if($setState==0)
	{
		echo 'hello i m in inside ';
		require_once("accessrole.php");
		changerole($table_name,$user_id,$state);
	}
else
{
	echo "please wait....";
	echo '<script>location ="'.$url.'admin.php?page=managecontractor&user=contractorsregistration"</script>';
}
endif;


////////////////////


if(isset($_REQUEST['action'])&& ($_REQUEST['action']==viewdetails))
{
		$result=$wpdb->get_row("SELECT * FROM ".$table_name." WHERE application_no=".$app_no);
		echo '<pre>';
		print_r($result);
		echo '</pre>';
}

//////////////////////////////////////////////////////////////////
if(isset($_REQUEST['action']) && ($_REQUEST['action']==delete))
{
	
	$state=0;
	$wpdb->update( $table_name, array('status' => 'Delete'), array( 'user_id' => $user_id ) );
	$wpdb->insert('notification', 	array('user_id' =>$user_id,  'subject' =>'Your '.$table_name. ' Account has been Deleted by Admin Kindly registered it Again'));
	require_once("accessrole.php");
	changerole($table_name,$user_id,$state);
	
}
////////////////////////////////

if(isset($_REQUEST['action'])&& ($_REQUEST['action']==status))
{
	
		
	$result=$wpdb->get_row("SELECT * FROM ".$table_name." WHERE  application_no=".$app_no);
	echo '<pre>';
	print_r($result);
	echo '</pre>';
	$result->user_id;
	require_once('viewdetails.php');

	
}
///////////////////////////////////////

if(isset($_REQUEST['action']) && ($_REQUEST['action']=='approve'))
{
	$wpdb->update($table_name, array('status' => 'Accept'),array('application_no' => $app_no));
	$wpdb->insert('notification', 	array('user_id' =>$user_id,  'subject' =>'Your Application Number: '.$app_no.' has been Approved by Admin'));
	require_once("access-control.php");
	
	
}
if(isset($_REQUEST['action']) && ($_REQUEST['action']=='reject'))
{
	$wpdb->update($table_name, array('status' => 'Reject'),array('application_no' => $app_no));
	$wpdb->insert('notification', 	array('user_id' =>$user_id,  'subject' =>'Your application Number : '.$app_no. ' has been Rejected by Admin Enjoy'));
	
}


?>



