<?php
/*global $wpdb;

$user_id=get_current_user_id();
$result=$wpdb->get_col($wpdb->prepare("SELECT user_id from manufacturerregistration"));

if(in_array($user_id,$result) == true)
{
	echo 'Your account has been Deactivate by the admin. Please contact to admin to Activate it.';
}
else
{
//getForm($divId,$component,$url,$isXhr,$method,$submitUrl,$lookupUrl)
$jsonQueryUrl=plugins_url('dojoXPS').'/forms/registration/dojoJsonformanufacture.php';
$isXhr='true';
$method=POST;
//$submitUrl=$_SERVER['REQUEST_URI'];
//$submitUrl=plugins_url('dojoXPS').'/dojoPort/dojoSubmit.php';
$submitUrl=admin_url().'admin-ajax.php';
//$submitUrl=plugins_url('dojoXPS').'/DojoToPhpPort.php';
$lookupUrl=null;
//echo($submitUrl);
//getForm('manufactureform','component111',$jsonQueryUrl,$isXhr,$method,$submitUrl,$lookupUrl );
}
*/
?>
<div id="manufactureform" >
<?php
if (isset($_REQUEST['section'])) {
$step = $_REQUEST['step'];
}
elseif (isset($_REQUEST['sectionBack'])) {
$step = $_REQUEST['step']-2;
}
else
{
	$step= 1;
}
require_once('form/register_manufacturer.php');
get_form_by_step($step);
?>
</div>
