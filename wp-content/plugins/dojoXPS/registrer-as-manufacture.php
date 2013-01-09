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

function submitForm($step,$actionType=null)
{

	echo $step;
	global $wpdb;
	$table='manufacturerregistration';
	
	if ($actionType=='next') {
		$submitStep=$step-1;
	}
	if ($actionType=='prev') {
	
		$submitStep=$step+1;
	}
	 if ($actionType==null) {
	
	 	$submitStep=0;
	 }
	if ($submitStep=='1')
		{
			$user_id=get_current_user_id();
			echo $user_id;
			$main_category=$_REQUEST['place_size'];
			$classification_of_grade=$_REQUEST['txtClassificationGrade'];
			$application_no = substr(number_format(10 * rand(),0,'',''),0,10);
			$company_name=$_REQUEST['txtCompanyName'];
			$trading_name=$_REQUEST['txtTradingName'];
			$pacra_registration=$_REQUEST['txtPRegistrationNo'];
			$rphysical=$_REQUEST['txtPhysical'];
			$rpostal=$_REQUEST['txtPostal'];
			$rtelephone=$_REQUEST['txtTelephoneNumber'];
			$rfax_no=$_REQUEST['txtFaxNumber'];
			$remail_id=$_REQUEST['txtEmail'];
			$bphysical=$_REQUEST['txtBOPhysical'];
			$bpostal=$_REQUEST['txtBOPostal'];
			$btelephone=$_REQUEST['txtBOTelephoneNumber'];
			$bemail_id=$_REQUEST['txtBOEmail'];
			$bfax_no=$_REQUEST['txtBOFaxNumber'];
			$bcompany_type=$_REQUEST['txtCompanyType'];
			$bbusiness_type=$_REQUEST['txtStatus'];
			$SHPName=$_REQUEST['txtSHPName'];
			$SHPPosition=$_REQUEST['txtSHPPosition'];
			$SHPPassportNumber=$_REQUEST['txtSHPPassportNumber'];
			$SHPStatus=$_REQUEST['txtSHPStatus'];
			$SHPShareholdingpercentage=$_REQUEST['txtSHPShareholding'];
			$SHPQualification=$_REQUEST['txtSHPQualification'];
			

			$data = array('user_id'=>$user_id,
						  'application_no'=>$application_no,
						  'status'=>'New',
						  'company_name' =>$company_name , 
						  'trading_name'=>$trading_name,
						  'pacra_registration_name'=>$pacra_registration,
						  'physical_registered'=>$rphysical,
						  'postal_registered'=>$rpostal,
						  'telephone_no_registered'=>$rtelephone,
						  'email_id_registered'=>$remail_id,
						  'fax_no_registered'=>$rfax_no,
						  'physical_branch'=>$bphysical,
						  'postal_branch'=>$bpostal,
						  'telephone_number_branch'=>$btelephone,
						  'email_id_branch'=>$bemail_id,
						  'fax_no_branch'=>$bfax_no,
						  'company_type'=>$company_type,
						  'shareholding_pattern_name'=>$SHPName,
						  'shareholding_pattern_position'=>$SHPPosition,
						   'shareholding_pattern_status'=>$SHPStatus,
						  'shareholding_pattern_percentage'=>$SHPShareholdingpercentage,
						  'shareholding_pattern_qualification'=>$SHPQualification
						  );
print_r($data);
			$wpdb->insert($table,$data) or die(mysql_error());
		}
}
	
?>

<div id="manufactureform" >
<?php
if (isset($_REQUEST['section'])) {
$step = $_REQUEST['step']+1;
$actionType='next';
}
elseif (isset($_REQUEST['sectionBack'])) {
$step = $_REQUEST['step']-1;
$actionType='prev';
}
else
{
	$step= 1;
}
require_once('form/register_manufacturer.php');
get_form_by_step($step);
submitForm($step, $actionType);
echo "sub";
?>
</div>