<?php
/*
global $wpdb;

$user_id=get_current_user_id();
$result=$wpdb->get_col($wpdb->prepare("SELECT user_id from contractorsregistration"));

if(in_array($user_id,$result) == true)
{
	echo 'Your account has been Deactivate by the admin. Please contact to admin to Activate it.';
}
else
{
//getForm($divId,$component,$url,$isXhr,$method,$submitUrl,$lookupUrl)
$jsonQueryUrl=plugins_url('dojoXPS').'/forms/registration/dojoJson.php';
$isXhr='true';
$method=POST;
//$submitUrl=$_SERVER['REQUEST_URI'];
//$submitUrl=plugins_url('dojoXPS').'/dojoPort/dojoSubmit.php';
$submitUrl=admin_url().'admin-ajax.php';
//$submitUrl=plugins_url('dojoXPS').'/DojoToPhpPort.php';
$lookupUrl=null;
//echo($submitUrl);
//getForm('contractorform','component111',$jsonQueryUrl,$isXhr,$method,$submitUrl,$lookupUrl );
}
*/
$user_id=get_current_user_id();
echo $user_id;
function submitForm($step)
{
	if ($step=1)
		{
			$data = array('user_id'=>'',
						  'application_no'=>'',
						  'main_category'=>'',
						  'classification_of_grade'=>''	);
			//$wpdb->insert('table',);
		}

}
?>
<div id="contractorform" >	
<?php
if (isset($_REQUEST['section'])) {
$step = $_REQUEST['step']+1;

}
elseif (isset($_REQUEST['sectionBack'])) {
$step = $_REQUEST['step']-1;
}
else
{
	$step= 1;
}
require_once('form/register_contractor.php');



get_form_by_step($step);


?>
</div>