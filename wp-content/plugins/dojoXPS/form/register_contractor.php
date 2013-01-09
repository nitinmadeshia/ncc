<?php
function maincategory()
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
				<option value="<?php echo $value2->parent_code; ?>"><?php echo $value2->construction_activity; ?></option>
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
					<?php maincategory(); ?>
				</td>
			</tr>
			<tr>
				<td>
				<label>
					Classification of Grade
				</label></td>
				<td>
				<select style="width:185px" id="txtClassificationGrade" name="txtClassificationGrade">
					
					<option value="1" >1</option>
					<option value="2" >2</option>
					<option value="3" >3</option>
					<option value="4" >4</option>
					<option value="5" >5</option>
					<option value="6" >6</option>

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
					<input id="txtCompanyName" name="txtCompanyName" type="text" size="30" maxlength="255" value=""/>
				</td>
			</tr>

			<tr>
				<td>
					<label>Trading Name</label>
				</td>
				<td>
					<input id="txtTradingName" name="txtTradingName" type="text" size="30" maxlength="255" value=""/>
				</td>
			</tr>

			<tr>
				<td>
					<label>PACRA Registration No</label>
				</td>
				<td>
					<input id="txtPRegistrationNo" name="txtPRegistrationNo" type="text" size="30" maxlength="255" value=""/>
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
					<input id="txtPhysical" name="txtPhysical" value="" type="text" size="30">
				</td>

			</tr>

			<tr>
				<td>
					<label>Postal</label>
				</td>
				<td>
					<input id="txtPostal" name="txtPostal" value="" type="text" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Tel No (s)</label>
				</td>
				<td>
					<input id="txtTelephoneNummber" name="txtTelephoneNummber" value="" type="text" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Fax No</label>
				</td>
				<td>
					<input id="txtFaxNumber" name="txtFaxNumber" value="" type="text" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>E-mail</label>
				</td>
				<td>
					<input id="txtEmail" name="txtEmail" maxlength="15" value="" type="text" size="30">
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
					<input id="txtBOPhysical" name="txtBOPhysical" value="" type="text" size="30">
				</td>

			</tr>

			<tr>
				<td>
					<label>Postal</label>
				</td>
				<td>
					<input id="txtBOPostal" name="txtBOPostal" value="" type="text" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Tel No (s)</label>
				</td>
				<td>
					<input id="txtBOTelephoneNummber" name="txtBOTelephoneNummber" value="" type="text" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Fax No</label>
				</td>
				<td>
					<input id="txtBOFaxNumber" name="txtBOFaxNumber" value="" type="text" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>E-mail</label>
				</td>
				<td>
					<input id="txtBOEmail" name="txtBOEmail" maxlength="15" value="" type="text" size="30">
				</td>
			</tr>



			<tr>
				<td>
					<label>Company Type</label>
				</td>
						
				<td>
					<select style="width:185px" id="txtCompanyType" name="txtCompanyType" >
						<option value="1" >Listed Company</option>
						<option value="2" >Limited Company</option>
						<option value="3" >Partnership</option>
						<option value="4" >Sole Proprietor</option>

					</select>
				</td>
			</tr>

			<tr>
				<td>
					<label>Description of business / Contracting activities</label>
				</td>
				
				<td>
					<select style="width:185px" id="txtStatus" name="txtStatus">
						<option value="1" >Consultancy</option>
						<option value="2" >Contracting</option>
						<option value="3" >Architecture</option>
						<option value="4" >Quantity Surveying</option>
						<option value="5" >Training</option>
						<option value="6" >Professional Body</option>
						<option value="7" >Other (Please specify)</option>

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
				<input id="txtSHPName" name="txtSHPName" type="text" size="30" maxlength="255" value=""/>
				</td>
			</tr>


			<tr>
				<td>
					<label>Position</label>
				</td>
				
				<td>
					<input id="txtSHPPosition" name="txtSHPPosition" maxlength="3" value="" type="text" size="30">
				</td>
			</tr>
			
			<tr>
				<td>
					<label>Passport No. / NRC No.</label>
				</td>
				<td>
					<input id="txtSHPPassportNumber" name="txtSHPPassportNumber" maxlength="45" value="" type="text" size="30">
				</td>
			</tr>
			
			<tr>
				<td>
					<label>Status</label>
				</td>
				<td>
					<select style="width:185px" id="txtSHPStatus" name="txtSHPStatus">
						<option value="1" >Citizen</option>
						<option value="2" >Resident</option>
						<option value="3" >Non-Resident</option>
						
					</select>
				</td>
			</tr>

			<tr>
				<td>
					<label>Shareholding %</label>
				</td>
				<td>
				<input id="txtSHPShareholding" name="txtSHPShareholding" type="text" size="30" maxlength="255" value=""/>
				</td>
	
			<tr>
				<td>
					<label>Qualification</label>
				</td>
				<td>
					<input id="txtSHPQualification" name="txtSHPQualification" type="text" size="30" maxlength="255" value=""/>
				</td>
			</tr>

			<tr>
				<td>
					<label>Details of the firms Bankers</label>
				</td>
				<td>
					<textarea style="width:250px; height: 100px" id="txtSHPDFBanker" name="txtSHPDFBanker" class="element textarea medium"></textarea>
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
					<input type="text" value="" name="txtKPPEngineers" id="txtKPPEngineers" size="30" />
				</td>
			</tr>

			<tr>
				<td>
				</td>
				<td>
					<label>Architects:</label>
				</td>
				<td>
					<input type="text" value="" name="txtKPPArchitects" id="txtKPPArchitects" size="30" />
				</td>
			</tr>
			
			<tr>
				<td>
				</td>
				<td>
					<label>Quantity Surveyors:</label>
				</td>
				<td>
					<input type="text" value="" name="txtKPPQuantitySurveyors" id="txtKPPQuantitySurveyors" size="30" />
				</td>
			</tr>
			
			<tr>
				<td>
				</td>
				<td>
					<label>Building Scientists:</label>
				</td>
				<td>
					<input type="text" value="" name="txtKPPBuildingScientists" id="txtKPPBuildingScientists" size="30" />
				</td>
			</tr>

			<tr>
				<td>
				</td>
				<td>
					<label>Surveyors:</label>
				</td>
				<td>
					<input type="text" value="" name="txtKPPSurveyors" id="txtKPPSurveyors" size="30" />
				</td>
			</tr>

			<tr>
				<td>
				</td>
				<td>
					<label>Accountants:</label>
				</td>
				<td>
					<input type="text" value="" name="txtKPPAccountants" id="txtKPPAccountants" size="30" />
				</td>
			</tr>

			<tr>
				<td>
				</td>
				<td>
					<label>Others (which an applicant should specify)</label>
				</td>
				<td>
					<input type="text" value="" name="txtKPPOther" id="txtKPPOther" size="30" /><input type="text" value="" name="txtKPPOtherValue" id="txtKPPValue" size="30" />
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
					<input type="text" value="" name="txtKPTElectricians" id="txtKPTElectricians" size="30" />
				</td>
			</tr>

			<tr>
				<td>
				</td>
				<td>
					<label>Construction Technologist:</label>
				</td>
				<td>
					<input type="text" value="" name="txtKPTCTechnologist" id="txtKPTCTechnologist" size="30" />
				</td>
			</tr>
			

			<tr>
				<td>
				</td>
				<td>
					<label>Others (which an applicant should specify)</label>
				</td>
				<td>
					<input type="text" value="" name="txtKPTOther" id="txtKPTOther" size="30" /><input type="text" value="" name="txtKPTOtherValue" id="txtKPTValue" size="30" />
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
					<input type="text" value="" name="txtKPSBCarpenters" id="txtKPSBCarpenters" size="30" />
				</td>
			</tr>

			<tr>
				<td>
				</td>
				<td>
					<label>Steel Fixers:</label>
				</td>
				<td>
					<input type="text" value="" name="txtKPSBSteelFixers" id="txtKPSBSteelFixers" size="30" />
				</td>
			</tr>
			
			<tr>
				<td>
				</td>
				<td>
					<label>Plumbers:</label>
				</td>
				<td>
					<input type="text" value="" name="txtKPSBPlumbers" id="txtKPSBPlumbers" size="30" />
				</td>
			</tr>
			
			<tr>
				<td>
				</td>
				<td>
					<label>Brick Layers:</label>
				</td>
				<td>
					<input type="text" value="" name="txtKPSBBrickLayers" id="txtKPSBBrick Layers" size="30" />
				</td>
			</tr>

			<tr>
				<td>
				</td>
				<td>
					<label>Others (which an applicant should specify)</label>
				</td>
				<td>
					<input type="text" value="" name="txtKPSBOther" id="txtKPSBOther" size="30" /><input type="text" value="" name="txtKPSBOtherValue" id="txtKPSBValue" size="30" />
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
						<option value="1" > >K5 Billion and above</option>
						<option value="2" > >2.5 Billion and above</option>
						<option value="3" > >K1.0 Billion and above</option>
						<option value="4" > >K0.5 Billion and above</option>
						<option value="5" > >K0.1 Billion and above</option>
						<option value="6" >  K50 Million and above</option>
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
						<option value="1" > >K5 Billion and above</option>
						<option value="2" > >2.5 Billion and above</option>
						<option value="3" > >K1.0 Billion and above</option>
						<option value="4" > >K0.5 Billion and above</option>
						<option value="5" > >K0.1 Billion and above</option>
						<option value="6" > >K50 Million and above</option>
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
						<option value="1" > >K25 Billion and above</option>
						<option value="2" >  K15 Billion and K25 Billion</option>
						<option value="3" >  K10 Billion and K15 Billion</option>
						<option value="4" >  K2 Billion and K10 Billion</option>
						<option value="5" >  K1 Billion and 2 Billion</option>
					
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
						<option value="1" > >K5.0 Billion and above</option>
						<option value="2" > >K3.0 Billion and above</option>
						<option value="3" > >K1.5 Billion and above</option>
						<option value="4" > >K0.75 Billion and above</option>
						<option value="5" > >K75 Million and above</option>
						<option value="6" >  K20 Million and above</option>
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
						<option value="1" > >K5.0 Billion and above</option>
						<option value="2" > >K3.0 Billion and above</option>
						<option value="3" > >K1.5 Billion and above</option>
						<option value="4" > >K0.75 Billion and above</option>
						<option value="5" > >K75 Million and above</option>
						<option value="6" >  K20 Million and above</option>
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