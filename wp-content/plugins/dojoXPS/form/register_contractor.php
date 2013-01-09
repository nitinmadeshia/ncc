<?php
global $wpdb;
$table='contractorsregistration';
$user_id=get_current_user_id();
function maincategory($formCategory)
{
	global $wpdb;
	$category = array();
	$parentCategory = $wpdb->get_results("SELECT * FROM grade where parent_code='0' AND  `is_delete` =  '0'");
	
?>


<select id="place_size" name="place_size">
<?php
		foreach ($parentCategory as $value){
?>
			<optgroup label="<?php echo $value->construction_activity; ?>">
<?php
			$subCategory = $wpdb->get_results('SELECT * FROM grade where parent_code = "'.$value->category_code.'" ') or die(mysql_error());
			foreach ($subCategory as $value2) {
?>
				<option  <?php if($formCategory==$value2->id) echo 'selected="selected"'?> value="<?php echo $value2->id; ?>"><?php echo $value2->construction_activity; ?></option>
<?php
			}
?>
			</optgroup>
<?php
		}
?>
</select>
<?php
}
function get_form_by_step($step=1)
{
	global $wpdb;
	$user_id=get_current_user_id();
	$result=$wpdb->get_row("SELECT * FROM `contractorsregistration` WHERE `user_id`=" .$user_id. " AND `is_submitted`=0");
	if ($step==1) {
			
?>

<form name="Category of Application" id="categoryOfApplication" method="post" action="<?php echo $_REQUEST['REQUEST_URI']; ?>">
	<table class="widefat">
		<thead>
			<th>Category of Application</th>
			<th></th>
		</thead>
		<tbody>
			<tr>
				<td>
					<label>
						Main Category
					</label>
				</td>
				<td>
					<?php maincategory($result->main_category); ?>
				</td>
			</tr>
			<tr>
				<td>
				<label>
					Classification of Grade
				</label></td>
				<td>
				<select style="width:185px" id="txtClassificationGrade" name="txtClassificationGrade">
					
					<option <?php if($result->classification_of_grade=='1') echo 'selected="selected"'?> value="1" >1</option>
					<option <?php if($result->classification_of_grade=='2') echo 'selected="selected"'?> value="2" >2</option>
					<option <?php if($result->classification_of_grade=='3') echo 'selected="selected"'?>value="3" >3</option>
					<option <?php if($result->classification_of_grade=='4') echo 'selected="selected"'?> value="4" >4</option>
					<option <?php if($result->classification_of_grade=='5') echo 'selected="selected"'?> value="5" >5</option>
					<option <?php if($result->classification_of_grade=='6') echo 'selected="selected"'?> value="6" >6</option>

				</select></td>
			</tr>
			<tr>
				<td>
					<input type="hidden" value="<?php echo $step ?>" name="step" />
				</td>
				<td>
					<input type="submit" value="Next" name="section" />
				</td>
			</tr>	
		</tbody>

	</table>
</form>

<?php
}
if ($step==2) {
	
?>

<form name="Company Details" id="companyDetails" method="post" action="<?php echo $_REQUEST['REQUEST_URI']; ?>">
	<table class="widefat">
		<thead>
			<th>Company Details</th>
			<th></th>
		</thead>
		<tbody>
			<tr>
				<td>
					<label >Company Name</label>
				</td>
				<td>
					<input id="txtCompanyName" name="txtCompanyName" type="text" size="30" maxlength="255" value="<?php echo $result->company_name; ?>"/>
				</td>
			</tr>

			<tr>
				<td>
					<label>Trading Name</label>
				</td>
				<td>
					<input id="txtTradingName" name="txtTradingName" type="text" size="30" maxlength="255" value="<?php echo $result->trading_name; ?>"/>
				</td>
			</tr>

			<tr>
				<td>
					<label>PACRA Registration No</label>
				</td>
				<td>
					<input id="txtPRegistrationNo" name="txtPRegistrationNo" type="text" size="30" maxlength="255" value="<?php echo $result->pacra_registration_number; ?>"/>
				</td>
			</tr>
			
			<tr>
				<td>
					<label style="font-weight: bold;">Registered Office Address</label>
				</td>
				<td></td>
			</tr>
			
			<tr>
				<td>
					<label>Physical</label>
				</td>
				<td>
					<input id="txtPhysical" name="txtPhysical" value="<?php echo $result->physical_registered; ?>" type="text" size="30">
				</td>

			</tr>

			<tr>
				<td>
					<label>Postal</label>
				</td>
				<td>
					<input id="txtPostal" name="txtPostal" value="<?php echo $result->postal_registered; ?>" type="text" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Tel No (s)</label>
				</td>
				<td>
					<input id="txtTelephoneNumber" name="txtTelephoneNumber" value="<?php echo $result->telephone_no_registered; ?>" type="text" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Fax No</label>
				</td>
				<td>
					<input id="txtFaxNumber" name="txtFaxNumber" value="<?php echo $result->fax_no_registered; ?>" type="text" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>E-mail</label>
				</td>
				<td>
					<input id="txtEmail" name="txtEmail" maxlength="15" value="<?php echo $result->email_id_registered;?>" type="text" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label style="font-weight: bold;">Branch Office</label>
				</td>
				<td></td>
			</tr>

			<tr>
				<td>
					<label>Physical</label>
				</td>
				<td>
					<input id="txtBOPhysical" name="txtBOPhysical" value="<?php echo $result->physical_branch;?>" type="text" size="30">
				</td>

			</tr>

			<tr>
				<td>
					<label>Postal</label>
				</td>
				<td>
					<input id="txtBOPostal" name="txtBOPostal" value="<?php echo $result->postal_branch; ?>" type="text" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Tel No (s)</label>
				</td>
				<td>
					<input id="txtBOTelephoneNumber" name="txtBOTelephoneNumber" value="<?php echo $result->telephone_number_branch; ?>" type="text" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Fax No</label>
				</td>
				<td>
					<input id="txtBOFaxNumber" name="txtBOFaxNumber" value="<?php echo $result->fax_no_branch; ?>" type="text" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>E-mail</label>
				</td>
				<td>
					<input id="txtBOEmail" name="txtBOEmail" maxlength="15" value="<?php echo $result->email_id_branch; ?>" type="text" size="30">
				</td>
			</tr>



			<tr>
				<td>
					<label>Company Type</label>
				</td>
						
				<td>
					<select style="width:185px" id="txtCompanyType" name="txtCompanyType" >
						<option <?php if($result->company_type=='Listed Company') echo 'selected="selected"'?> value="Listed Company" >Listed Company</option>
						<option <?php if($result->company_type=='Limited Company') echo 'selected="selected"'?>value="Limited Company" >Limited Company</option>
						<option <?php if($result->company_type=='Partnership') echo 'selected="selected"'?>value="Partnership" >Partnership</option>
						<option <?php if($result->company_type=='ole Proprietor') echo 'selected="selected"'?>value="Sole Proprietor" >Sole Proprietor</option>

					</select>
				</td>
			</tr>

			<tr>
				<td>
					<label>Description of business / Contracting activities</label>
				</td>
				
				<td>
					<select style="width:185px" id="txtStatus" name="txtStatus" >
						<option <?php if($result->business_description=='Consultancy') echo 'selected="selected"'?> value="Consultancy" >Consultancy</option>
						<option  <?php if($result->business_description=='Contracting') echo 'selected="selected"'?>value="Contracting" >Contracting</option>
						<option <?php if($result->business_description=='Architecture') echo 'selected="selected"'?>value="Architecture" >Architecture</option>
						<option <?php if($result->business_description=='Quantity Surveying') echo 'selected="selected"'?>value="Quantity Surveying" >Quantity Surveying</option>
						<option <?php if($result->business_description=='Training') echo 'selected="selected"'?>value="Training" >Training</option>
						<option <?php if($result->business_description=='Professional Body') echo 'selected="selected"'?>value="Professional Body" >Professional Body</option>
						<option <?php if($result->business_description=='other') echo 'selected="selected"'?>value="other" >Other (Please specify)</option>

					</select>
				</td>
			</tr>
			
			<tr>
				<td>
					<label style="font-weight: bold;">Share Holding Pattern</label>
				</td>
				<td></td>
			</tr>

			<tr>
				<td>
					<label>Name</label>
				</td>
				<td>
				<input id="txtSHPName" name="txtSHPName" type="text" size="30" maxlength="255" value="<?php echo $result->shareholding_pattern_name; ?>" />
				</td>
			</tr>


			<tr>
				<td>
					<label>Position</label>
				</td>
				
				<td>
					<input id="txtSHPPosition" name="txtSHPPosition" maxlength="3" value="<?php echo $result->shareholding_pattern_position ; ?>"  type="text" size="30">
				</td>
			</tr>
			
			<tr>
				<td>
					<label>Passport No. / NRC No.</label>
				</td>
				<td>
					<input id="txtSHPPassportNumber" name="txtSHPPassportNumber" maxlength="45" value="<?php echo $result->shareholding_pattern_passport_nrc_number ; ?>"  type="text" size="30">
				</td>
			</tr>
			
			<tr>
				<td>
					<label>Status</label>
				</td>
				<td>
					<select style="width:185px" id="txtSHPStatus" name="txtSHPStatus">
						<option  <?php if($result->shareholding_pattern_status=='Citizen') echo 'selected="selected"'?>value="Citizen" >Citizen</option>
						<option <?php if($result->shareholding_pattern_status=='Resident') echo 'selected="selected"'?>value="Resident" >Resident</option>
						<option <?php if($result->shareholding_pattern_status=='Non-Resident') echo 'selected="selected"'?>value="Non-Resident" >Non-Resident</option>
						
					</select>
				</td>
			</tr>

			<tr>
				<td>
					<label>Shareholding %</label>
				</td>
				<td>
				<input id="txtSHPShareholding" name="txtSHPShareholding" type="text" size="30" maxlength="255" value="<?php echo $result->shareholding_pattern_percentage; ?>"/>
				</td>
	
			<tr>
				<td>
					<label>Qualification</label>
				</td>
				<td>
					<input id="txtSHPQualification" name="txtSHPQualification" type="text" size="30" maxlength="255" value="<?php echo $result->shareholding_pattern_qualification; ?>"/>
				</td>
			</tr>

			<tr>
				<td>
					<label>Details of the firms Bankers</label>
				</td>
				<td>
					<textarea style="width:250px; height: 100px" id="txtSHPDFBanker" name="txtSHPDFBanker" class="element textarea medium" ><?php echo $result->details_of_firms_bankers; ?></textarea>
				</td>
			</tr>
			
			<tr>
				<td>
					<input type="hidden" value="<?php echo $step ?>" name="step" />
				</td>
				<td>
				<input type="submit" value="Back" name="sectionBack" />
				<input type="submit" value="Next" name="section" /></td>
			</tr>
		</tbody>
	</table>
</form>
<?php	
}

if ($step==3) {
?>
<form name="Technical Data" id="technicalData" method="post" action="<?php echo $_REQUEST['REQUEST_URI']; ?>">
	<table class="widefat">
		<thead>
			<th>Technical Data</th>
			<th></th>
			<th></th>
		</thead>
		<tbody>
			<tr>
				<td>
					<label style="font-weight: bold;">Key Personnel (Professional)</label>
				</td>
				<td></td>
				<td></td>
			</tr>

			<tr>
				<td>
					<label >Position</label>
				</td>
				<td>
					<label>Engineers:</label>
				</td>
				<td>
					<input type="text" value="<?php echo $result->p_engineer; ?>" name="txtKPPEngineers" id="txtKPPEngineers" size="30" />
				</td>
			</tr>

			<tr>
				<td>
				</td>
				<td>
					<label>Architects:</label>
				</td>
				<td>
					<input type="text" value="<?php echo $result->p_architects;?>" name="txtKPPArchitects" id="txtKPPArchitects" size="30" />
				</td>
			</tr>
			
			<tr>
				<td>
				</td>
				<td>
					<label>Quantity Surveyors:</label>
				</td>
				<td>
					<input type="text" value="<?php echo $result->p_quantity_surveyors ;?>" name="txtKPPQuantitySurveyors" id="txtKPPQuantitySurveyors" size="30" />
				</td>
			</tr>
			
			<tr>
				<td>
				</td>
				<td>
					<label>Building Scientists:</label>
				</td>
				<td>
					<input type="text" value="<?php echo $result->p_buildings_scientistis ;?>" name="txtKPPBuildingScientists" id="txtKPPBuildingScientists" size="30" />
				</td>
			</tr>

			<tr>
				<td>
				</td>
				<td>
					<label>Surveyors:</label>
				</td>
				<td>
					<input type="text" value="<?php echo $result->p_surveyors ;?>" name="txtKPPSurveyors" id="txtKPPSurveyors" size="30" />
				</td>
			</tr>

			<tr>
				<td>
				</td>
				<td>
					<label>Accountants:</label>
				</td>
				<td>
					<input type="text" value="<?php echo $result->p_accountants ;?>" name="txtKPPAccountants" id="txtKPPAccountants" size="30" />
				</td>
			</tr>

			<tr>
				<td>
				</td>
				<td>
					<label>Others (which an applicant should specify)</label>
				</td>
				<td>
					<input type="text" value="<?php echo $result->professional_other ;?>" name="txtKPPOther" id="txtKPPOther" size="30" /><input type="text" value="<?php echo $result->professional_other_value;?>" name="txtKPPOtherValue" id="txtKPPValue" size="30" />
				</td>
			</tr>

			<tr>
				<td>
					<label style="font-weight: bold;">Key Personnel (Technicians) </label>
				</td>
				<td></td>
				<td></td>
			</tr>

			<tr>
				<td>
					<label >Position</label>
				</td>
				<td>
					<label>Electricians:</label>
				</td>
				<td>
					<input type="text" value="<?php echo $result->t_electricians ; ?>" name="txtKPTElectricians" id="txtKPTElectricians" size="30" />
				</td>
			</tr>

			<tr>
				<td>
				</td>
				<td>
					<label>Construction Technologist:</label>
				</td>
				<td>
					<input type="text" value="<?php echo $result->t_construction_technologist ; ?>" name="txtKPTCTechnologist" id="txtKPTCTechnologist" size="30" />
				</td>
			</tr>
			

			<tr>
				<td>
				</td>
				<td>
					<label>Others (which an applicant should specify)</label>
				</td>
				<td>
					<input type="text" value="<?php echo $result->technicians_others ; ?>" name="txtKPTOther" id="txtKPTOther" size="30" /><input type="text" value="<?php echo $result->technicians_others_value ; ?>" name="txtKPTOtherValue" id="txtKPTValue" size="30" />
				</td>
			</tr>

			<tr>
				<td>
					<label style="font-weight: bold;">Key Personnel (Skills Based)</label>
				</td>
				<td></td>
				<td></td>
			</tr>

			<tr>
				<td>
					<label >Position</label>
				</td>
				<td>
					<label>Carpenters:</label>
				</td>
				<td>
					<input type="text" value="<?php echo $result->s_carpenters ;?>" name="txtKPSBCarpenters" id="txtKPSBCarpenters" size="30" />
				</td>
			</tr>

			<tr>
				<td>
				</td>
				<td>
					<label>Steel Fixers:</label>
				</td>
				<td>
					<input type="text" value="<?php echo $result->s_steel_fixers ;?>" name="txtKPSBSteelFixers" id="txtKPSBSteelFixers" size="30" />
				</td>
			</tr>
			
			<tr>
				<td>
				</td>
				<td>
					<label>Plumbers:</label>
				</td>
				<td>
					<input type="text" value="<?php echo $result->s_plumbers ;?>" name="txtKPSBPlumbers" id="txtKPSBPlumbers" size="30" />
				</td>
			</tr>
			
			<tr>
				<td>
				</td>
				<td>
					<label>Brick Layers:</label>
				</td>
				<td>
					<input type="text" value="<?php echo $result->s_brick_layers ;?>" name="txtKPSBBrickLayers" id="txtKPSBBrick Layers" size="30" />
				</td>
			</tr>

			<tr>
				<td>
				</td>
				<td>
					<label>Others (which an applicant should specify)</label>
				</td>
				<td>
					<input type="text" value="<?php echo $result->skills_based_other ;?>" name="txtKPSBOther" id="txtKPSBOther" size="30" /><input type="text" value="<?php echo $result->skills_based_other_value;?>" name="txtKPSBOtherValue" id="txtKPSBValue" size="30" />
				</td>
			</tr>

			<tr>
				<td>
					<input type="hidden" value="<?php echo $step ?>" name="step" />
				</td>
				<td>
					<input type="submit" value="Back" name="sectionBack" />
					<input type="submit" value="Next" name="section" />
				</td>
			</tr>
		</tbody>
	</table>
</form>
<?php
}

if ($step==4) 
{
?>
<form name="Company’s Financial Information" id="companyFinancialInformation" method="post" action="<?php echo $_REQUEST['REQUEST_URI']; ?>">
	<table class="widefat">
		<thead>
			<th>Company’s Financial Information</th>
			<th></th>
			<th></th>
		</thead>
		<tbody>
			<tr>
				<td>
					<label style="font-weight: bold;">Immovable Assets</label>
				</td>
				<td></td>
				<td></td>
			</tr>
			
			<tr>
				<td>
					<label>Total Value of immovable assets</label> 
				</td>

				<td>
					<select style="width:185px" id="txtImmovableAssets" name="txtImmovableAssets">
						<option <?php if($result->immovable_assets=='>K5 Billion and above') echo 'selected="selected"'?> value=">K5 Billion and above" > >K5 Billion and above</option>
						<option <?php if($result->immovable_assets=='>2.5 Billion and above') echo 'selected="selected"'?> value=">2.5 Billion and above" > >2.5 Billion and above</option>
						<option <?php if($result->immovable_assets=='>K1.0 Billion and above') echo 'selected="selected"'?> value=">K1.0 Billion and above" > >K1.0 Billion and above</option>
						<option <?php if($result->immovable_assets=='>K0.5 Billion and above') echo 'selected="selected"'?> value=">K0.5 Billion and above" > >K0.5 Billion and above</option>
						<option <?php if($result->immovable_assets=='>K0.1 Billion and above') echo 'selected="selected"'?> value=">K0.1 Billion and above" > >K0.1 Billion and above</option>
						<option <?php if($result->immovable_assets=='K50 Million and above') echo 'selected="selected"'?> value="K50 Million and above" >  K50 Million and above</option>
					</select>
				</td>

				<td>
					
				</td>
			</tr>

			<tr>
				<td>
					<label style="font-weight: bold;">Movable Assets</label>
				</td>
				<td></td>
				<td></td>
			</tr>
			
			<tr>
				<td>
					<label>Total Value of Movable assets</label> 
				</td>

				<td>
					<select style="width:185px" id="txtMovableAssets" name="txtMovableAssets">
						<option <?php if($result->total_movable_assets=='>K5 Billion and above') echo 'selected="selected"'?> value=">K5 Billion and above" > >K5 Billion and above</option>
						<option <?php if($result->total_movable_assets=='>2.5 Billion and above') echo 'selected="selected"'?> value=">2.5 Billion and above" > >2.5 Billion and above</option>
						<option <?php if($result->total_movable_assets=='>K1.0 Billion and above') echo 'selected="selected"'?> value=">K1.0 Billion and above" > >K1.0 Billion and above</option>
						<option <?php if($result->total_movable_assets=='>K0.5 Billion and above') echo 'selected="selected"'?> value=">K0.5 Billion and above" > >K0.5 Billion and above</option>
						<option <?php if($result->total_movable_assets=='>K0.1 Billion and above') echo 'selected="selected"'?> value=">K0.1 Billion and above" > >K0.1 Billion and above</option>
						<option <?php if($result->total_movable_assets=='K50 Million and above') echo 'selected="selected"'?> value="K50 Million and above" >  K50 Million and above</option>
					</select>
				</td>

				<td>
					
				</td>
			</tr>

			<tr>
				<td>
					<label>Contracts Completed (in last five years) </label> 
				</td>

				<td>
					<select style="width:185px" id="txtContractComplete" name="txtContractComplete">
						<option <?php if($result->contracts_completed=='>K5 Billion and above') echo 'selected="selected"'?> value=">K5 Billion and above" > >K5 Billion and above</option>
						<option <?php if($result->contracts_completed=='>2.5 Billion and above') echo 'selected="selected"'?> value=">2.5 Billion and above" > >2.5 Billion and above</option>
						<option <?php if($result->contracts_completed=='>K1.0 Billion and above') echo 'selected="selected"'?> value=">K1.0 Billion and above" > >K1.0 Billion and above</option>
						<option <?php if($result->contracts_completed=='>K0.5 Billion and above') echo 'selected="selected"'?> value=">K0.5 Billion and above" > >K0.5 Billion and above</option>
						<option <?php if($result->contracts_completed=='>K0.1 Billion and above') echo 'selected="selected"'?> value=">K0.1 Billion and above" > >K0.1 Billion and above</option>
						<option <?php if($result->contracts_completed=='K50 Million and above') echo 'selected="selected"'?> value="K50 Million and above" >  K50 Million and above</option>
					
					</select>
				</td>

				<td>
					
				</td>
			</tr>

			<tr>
				<td>
					<label>Credit Facility</label> 
				</td>

				<td>
					<select style="width:185px" id="txtCreditFacility" name="txtCreditFacility">
						<option <?php if($result->credit_facility=='>K5 Billion and above') echo 'selected="selected"'?> value=">K5 Billion and above" > >K5 Billion and above</option>
						<option <?php if($result->credit_facility=='>2.5 Billion and above') echo 'selected="selected"'?> value=">2.5 Billion and above" > >2.5 Billion and above</option>
						<option <?php if($result->credit_facility=='>K1.0 Billion and above') echo 'selected="selected"'?> value=">K1.0 Billion and above" > >K1.0 Billion and above</option>
						<option <?php if($result->credit_facility=='>K0.5 Billion and above') echo 'selected="selected"'?> value=">K0.5 Billion and above" > >K0.5 Billion and above</option>
						<option <?php if($result->credit_facility=='>K0.1 Billion and above') echo 'selected="selected"'?> value=">K0.1 Billion and above" > >K0.1 Billion and above</option>
						<option <?php if($result->credit_facility=='K50 Million and above') echo 'selected="selected"'?> value="K50 Million and above" >  K50 Million and above</option>
					</select>
				</td>

				<td>
					
				</td>
			</tr>

			<tr>
				<td>
					<label>Contracts On Hand</label> 
				</td>

				<td>
					<select style="width:185px" id="txtContractHand" name="txtContractHand">
						<option <?php if($result->contracts_on_hand=='>K5 Billion and above') echo 'selected="selected"'?> value=">K5 Billion and above" > >K5 Billion and above</option>
						<option <?php if($result->contracts_on_hand=='>2.5 Billion and above') echo 'selected="selected"'?> value=">2.5 Billion and above" > >2.5 Billion and above</option>
						<option <?php if($result->contracts_on_hand=='>K1.0 Billion and above') echo 'selected="selected"'?> value=">K1.0 Billion and above" > >K1.0 Billion and above</option>
						<option <?php if($result->contracts_on_hand=='>K0.5 Billion and above') echo 'selected="selected"'?> value=">K0.5 Billion and above" > >K0.5 Billion and above</option>
						<option <?php if($result->contracts_on_hand=='>K0.1 Billion and above') echo 'selected="selected"'?> value=">K0.1 Billion and above" > >K0.1 Billion and above</option>
						<option <?php if($result->contracts_on_hand=='K50 Million and above') echo 'selected="selected"'?> value="K50 Million and above" >  K50 Million and above</option>
					</select>
				</td>

				<td>
					
				</td>
			</tr>
			<tr>
				<td>
					<input type="hidden" value="<?php echo $step ?>" name="step" />
				</td>
				<td>
					<input type="submit" value="Back" name="sectionBack" />
					<input type="submit" value="Next" name="section" />
				</td>
			</tr>
		</tbody>
	</table>
</form>
<?php
}
}
?>