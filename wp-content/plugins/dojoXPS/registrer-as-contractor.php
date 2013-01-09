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

function submitForm($step,$actionType=null)
{
	$user_id=get_current_user_id();

	echo $step;
	global $wpdb;
	$table='contractorsregistration';
	
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
			
			$main_category=$_REQUEST['place_size'];
			$classification_of_grade=$_REQUEST['txtClassificationGrade'];
			$is_submitted=0;
			$result=$wpdb->get_col($wpdb->prepare("SELECT `is_submitted` from contractorsregistration WHERE $user_id=" .$user_id));
			if(in_array($is_submitted,$result) == true)
			{
				$application_no=$_SESSION['registerContractorApplicationID'];
				$wpdb->update($table,array( 'main_category'=>$main_category,
								            'classification_of_grade'=>$classification_of_grade),
								 	  
								 	  array('application_no'=>$application_no));
			}
			else
			{
			$application_no = substr(number_format(10 * rand(),0,'',''),0,10);
			$_SESSION['registerContractorApplicationID']=$application_no;
			$data = array('user_id'=>$user_id,
						  'application_no'=>$_SESSION['registerContractorApplicationID'],
						  'status'=>'New',
						  'main_category'=>$main_category,
						  'classification_of_grade'=>$classification_of_grade);
			$wpdb->insert($table,$data) or die(mysql_error());
			}
		}
		if($submitStep==2)
		{
			$application_no=$_SESSION['registerContractorApplicationID'];
			$company_name=$_REQUEST['txtCompanyName'];
			$trading_name=$_REQUEST['txtTradingName'];
			$pacra_registration=$_REQUEST['txtPRegistrationNo'];
			$rphysical=$_REQUEST['txtPhysical'];
			$rpostal=$_REQUEST['txtPostal'];
			$rtelephone=$_REQUEST['txtTelephoneNumber'];
			$remail_id=$_REQUEST['txtEmail'];
			$rfax_no=$_REQUEST['txtFaxNumber'];
			$bphysical=$_REQUEST['txtBOPhysical'];
			$bpostal=$_REQUEST['txtBOPostal'];
			$btelephone=$_REQUEST['txtBOTelephoneNumber'];
			$bemail_id=$_REQUEST['txtBOEmail'];
			$bfax_no=$_REQUEST['txtBOFaxNumber'];
			$company_type=$_REQUEST['txtCompanyType'];
			$business_description=$_REQUEST['txtStatus'];
			$SHPName=$_REQUEST['txtSHPName'];
			$SHPPosition=$_REQUEST['txtSHPPosition'];
			$SHPPassportNumber=$_REQUEST['txtSHPPassportNumber'];
			$SHPStatus=$_REQUEST['txtSHPStatus'];
			$SHPShareholdingpercentage=$_REQUEST['txtSHPShareholding'];
			$SHPQualification=$_REQUEST['txtSHPQualification'];
			$SHPDFBanker=$_REQUEST['txtSHPDFBanker'];
			$wpdb->update($table,array('company_name' =>$company_name , 
						'trading_name'=>$trading_name,
						'pacra_registration_number'=>$pacra_registration,
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
						'business_description'=>$business_description,
						'shareholding_pattern_name'=>$SHPName,
						'shareholding_pattern_position'=>$SHPPosition,
						'shareholding_pattern_passport_nrc_number'=>$SHPPassportNumber,
						'shareholding_pattern_status'=>$SHPStatus,
						'shareholding_pattern_percentage'=>$SHPShareholdingpercentage,
						'shareholding_pattern_qualification'=>$SHPQualification,
						'details_of_firms_bankers'=>$SHPDFBanker),
						array('application_no'=>$application_no));
			
		}
		if($submitStep==3)
		{
			$application_no=$_SESSION['registerContractorApplicationID'];
			$engineer=$_REQUEST['txtKPPEngineers'];
			$architects=$_REQUEST['txtKPPArchitects'];
			$quantity_surveyors=$_REQUEST['txtKPPQuantitySurveyors'];
			$building_scientists=$_REQUEST['txtKPPBuildingScientists'];
			$surveyors=$_REQUEST['txtKPPSurveyors'];
			$accountants=$_REQUEST['txtKPPAccountants'];
			$pothers=$_REQUEST['txtKPPOther'];
			$pothers_value=$_REQUEST['txtKPPOtherValue'];
			$telectricians=$_REQUEST['txtKPTElectricians'];
			$tconstruction_technologist=$_REQUEST['txtKPTCTechnologist'];
			$tothers=$_REQUEST['txtKPTOther'];
			$tothers_value=$_REQUEST['txtKPTOtherValue'];
			$sbcarpenters=$_REQUEST['txtKPSBCarpenters'];
			$sbsteelfixers=$_REQUEST['txtKPSBSteelFixers'];
			$sbplumbers=$_REQUEST['txtKPSBPlumbers'];
			$sbbrick_layers=$_REQUEST['txtKPSBBrickLayers'];
			$sbothers=$_REQUEST['txtKPSBOther'];
			$sbothers_value=$_REQUEST['txtKPSBOtherValue'];
			$wpdb->update($table,array('p_engineer'=>$engineer,
						'p_architects'=>$architects,
						'p_quantity_surveyors'=>$quantity_surveyors,
						'p_buildings_scientistis'=>$building_scientists,
						'p_surveyors'=>$surveyors,
						'p_accountants'=>$accountants,
						'professional_other'=>$pothers,
						'professional_other_value'=>$pothers_value,
						't_electricians'=>$telectricians,
						't_construction_technologist'=>$tconstruction_technologist,
						'technicians_others'=>$tothers,
						'technicians_others_value'=>$tothers_value,
						's_carpenters'=>$sbcarpenters,
						's_steel_fixers'=>$sbsteelfixers,
						's_plumbers'=>$sbplumbers,
						's_brick_layers'=>$sbbrick_layers,
						'skills_based_other'=>$sbothers,
						'skills_based_other_value'=>$sbothers_value),
			array('application_no' =>$application_no));
			//print_r($wpdb);
						
			}
		if($submitStep==4)
		{
			$application_no=$_SESSION['registerContractorApplicationID'];
			$immovable_assets=$_REQUEST['txtImmovableAssets'];
			$total_movable_assets=$_REQUEST['txtMovableAssets'];
			$contracts_completed=$_REQUEST['txtContractComplete'];
			$credit_facility=$_REQUEST['txtCreditFacility'];
			$contracts_on_hand=$_REQUEST['txtContractHand'];
			$wpdb->update($table,array('immovable_assets' => $immovable_assets,
									   'total_movable_assets'=>$total_movable_assets,
			 						   'contracts_completed'=>$contracts_completed,
			 						   'credit_facility'=>$credit_facility,
			 						   'contracts_on_hand'=>$contracts_on_hand,
			 						   'is_submitted'=>'1'),
								 array('application_no' => $application_no));
			
		}

}

?>
<div id="contractorform" >	
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
require_once('form/register_contractor.php');

get_form_by_step($step);
submitForm($step, $actionType);
?>
</div>