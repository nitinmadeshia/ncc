<?php
global $wpdb;
$table_name=$_REQUEST['user'];
$user_id=$_REQUEST['userid'];
$app_no=$_REQUEST['appno'];

if(isset($_REQUEST['action'])&& ($_REQUEST['action']==Active ))
{
	
	$active=1;
	$wpdb->insert('notification', 	array('user_id' =>$user_id,  'subject' =>'Your '.$table_name. ' Account has been Activated by Admin Enjoy'));
	require_once("accessrole.php");
	changerole($table_name,$user_id,$active);
	
	
}
if ($_REQUEST['action']=='Deactive'):

	$active=0;
	$wpdb->insert('notification', 	array('user_id' =>$user_id,  'subject' =>'Your '.$table_name. ' Account has been DeActivated by Admin kindly contect to Admin'));
	require_once("accessrole.php");
	changerole($table_name,$user_id,$active);
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
	
	$active=0;
	$wpdb->update( $table_name, array('status' => 'Delete'), array( 'user_id' => $user_id ) );
	$wpdb->insert('notification', 	array('user_id' =>$user_id,  'subject' =>'Your '.$table_name. ' Account has been Deleted by Admin Kindly registered it Again'));
	require_once("accessrole.php");
	changerole($table_name,$user_id,$active);
	
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
	
}
if(isset($_REQUEST['action']) && ($_REQUEST['action']=='reject'))
{
	$wpdb->update($table_name, array('status' => 'Reject'),array('application_no' => $app_no));
	$wpdb->insert('notification', 	array('user_id' =>$user_id,  'subject' =>'Your application Number : '.$app_no. ' has been Rejected by Admin Enjoy'));
	
}


?>



