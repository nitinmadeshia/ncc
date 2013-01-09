<?php
function get_form_by_step($step=1)
{

if ($step==1) {
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
					<label>Business Type </label>
				</td>
				
				<td>
					<input id="txtBusinessType" name="txtBusinessType" type="text" size="30" maxlength="255" disabled="true" value="Manufacturer"/>
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
					<input type="hidden" value="<?php echo $step+1 ?>" name="step" />
				</td>
				<td>
				
				<input type="submit" value="Next" name="section" /></td>
			</tr>
		</tbody>
	</table>
</form>
<?php	
}

if ($step==2) {
?>
<form name="Technical Employees" id="technicalEmployees" method="post" action="<?php echo $_REQUEST['REQUEST_URI']; ?>">
	<table class="widefat">
		<thead>
			<th>Technical Employees </th>
			<th></th>
			<th></th>
		</thead>
		<tbody>
			<tr>
				<td>
					<label >Name of Employee </label>
				</td>
				<td>
					<input type="text" value="" name="txtNOEmployee" id="txtNOEmployee" size="30" />
				</td>
			</tr>

			<tr>
				<td>
					<label>Position</label>
				</td>
				<td>
					<input type="text" value="" name="txtTEPosition" id="txtTEPosition" size="30" />
				</td>
			</tr>
			
			<tr>
				<td>
					<label>Profession/Skill </label>
				</td>
				<td>
					<input type="text" value="" name="txtProfession" id="txtProfession" size="30" />
				</td>
			</tr>
			
			<tr>
				<td>
					<label>Social Security Number</label>
				</td>
				<td>
					<input type="text" value="" name="txtSSNumber" id="txtSSNumber" size="30" />
				</td>
			</tr>

			<tr>
				<td>
					<label>Add New Row</label>
				</td>
				<td>
					<input type="submit" value="Add New Row" name="addNewRow" />
				</td>
			</tr>

			<tr>
				<td>
					<input type="hidden" value="<?php echo $step+1 ?>" name="step" />
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

if ($step==3) 
{
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
					<label>Name of Material and/or Equipment Manufactured </label> 
				</td>

				<td>
					<input type="text" value="" name="txtNOMaterial" id="txtNOMaterial" size="30" />
				</td>

				<td>
					
				</td>
			</tr>

			<tr>
				<td>
					<label>Add New Row</label> 
				</td>

				<td>
					<input type="submit" value="Add New Row " name="addNewRow" />
				</td>

				<td>
					
				</td>
			</tr>

			<tr>
				<td>
					<input type="hidden" value="<?php echo $step+1 ?>" name="step" />
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
<form name="Compliance Data" id="complianceData" method="post" action="<?php echo $_REQUEST['REQUEST_URI']; ?>">
	<table class="widefat">
		<thead>
			<th>Compliance Data</th>
			<th></th>
			<th></th>
		</thead>
		<tbody>
			<tr>
				<td>
					<label>Name of Standard</label> 
				</td>

				<td>
					<input type="text" value="" name="txtNOStandard" id="txtNOStandard" size="30" />
				</td>

				<td>
					
				</td>
			</tr>

			<tr>
				<td>
					<label>Add New Row</label> 
				</td>

				<td>
					<input type="submit" value="Add New Row " name="addNewRow" />
				</td>

				<td>
					
				</td>
			</tr>

			<tr>
				<td>
					<input type="hidden" value="<?php echo $step+1 ?>" name="step" />
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