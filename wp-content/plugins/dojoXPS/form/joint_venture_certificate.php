<?php
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
				<td>First Party NCC Registration Number</td>
				<td>
					<input id="txtFPNCCRegistrationNumber" name="txtFPNCCRegistrationNumber" type="text" size="30" maxlength="255" value=""/>
				</td>
			</tr>

			<tr>
				<td>Second Party NCC Registration Number</td>
				<td>
					<input id="txtSPNCCRegistrationNumber" name="txtSPNCCRegistrationNumber" type="text" size="30" maxlength="255" value=""/>
				</td>
			</tr>

			<tr>
				<td>Third Party NCC Registration Number</td>
				<td>
					<input id="txtTPNCCRegistrationNumber" name="txtTPNCCRegistrationNumber" type="text" size="30" maxlength="255" value=""/>
				</td>
			</tr>

			<tr>
				<td>
					<label>
						Main Category of JV
					</label>
				</td>
				<td>
					<select style="width:185px" id="txtMainCategoryJV" name="txtMainCategoryJV">
						
						<option value="1" >B</option>
						<option value="2" >C</option>
						<option value="3" >R</option>
						<option value="4" >M</option>
						<option value="5" >E</option>
						<option value="6" >SA-ST</option>

					</select>
				</td>
			</tr>
			<tr>
				<td>
				<label>
					Classification of Grade of JV
				</label></td>
				<td>
				<select style="width:185px" id="txtClassificationGradeJV" name="txtClassificationGradeJV">
					
					<option value="1" >1</option>
					<option value="2" >2</option>
					<option value="3" >3</option>
					<option value="4" >4</option>
					<option value="5" >5</option>
					<option value="6" >6</option>

				</select></td>
			</tr>

			<tr>
				<td>Name of Joint Venture</td>
				<td>		
					<input id="txtNOJointVenture" name="txtNOJointVenture" type="text" size="30" maxlength="255" value=""/>
				</td>
			</tr>
			<tr>
				<td>Date of Application</td>
				<td>		
					<input id="txtDOApplication" name="txtDOApplication" type="text" size="30" maxlength="255" value=""/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="hidden" value="<?php echo $step+1 ?>" name="step" />
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
			<th>Company Details </th>
			<th></th>
		</thead>
		<tbody>
			<tr>
				<td>
					<label style="font-weight: bold;">First Party</label>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<label >Company Name</label>
				</td>
				<td>
					<input id="txtFPCompanyName" name="txtFPCompanyName" type="text" disabled="true" size="30" maxlength="255" value=""/>
				</td>
			</tr>

			<tr>
				<td>
					<label>Trading Name</label>
				</td>
				<td>
					<input id="txtFPTradingName" name="txtFPTradingName" type="text" disabled="true" size="30" maxlength="255" value=""/>
				</td>
			</tr>

			<tr>
				<td>
					<label>PACRA Registration No</label>
				</td>
				<td>
					<input id="txtFPPRegistrationNo" name="txtFPPRegistrationNo" type="text" disabled="true" size="30" maxlength="255" value=""/>
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
					<input id="txtFPPhysical" name="txtFPPhysical" value="" type="text" disabled="true" size="30">
				</td>

			</tr>

			<tr>
				<td>
					<label>Postal</label>
				</td>
				<td>
					<input id="txtFPPostal" name="txtFPPostal" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Tel No (s)</label>
				</td>
				<td>
					<input id="txtFPTelephoneNummber" name="txtFPTelephoneNummber" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Fax No</label>
				</td>
				<td>
					<input id="txtFPFaxNumber" name="txtFPFaxNumber" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>E-mail</label>
				</td>
				<td>
					<input id="txtFPEmail" name="txtFPEmail" maxlength="15" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>NCC Grade</label>
				</td>
				<td>
					<input id="txtFPNCCGrade" name="txtFPNCCGrade" maxlength="15" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Category</label>
				</td>
				<td>
					<input id="txtFPCategory" name="txtFPCategory" maxlength="15" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label style="font-weight: bold;">Director/Owner/Partner</label>
				</td>
				<td></td>
			</tr>

			<tr>
				<td>
					<label>Name</label>
				</td>
				<td>
					<input id="txtFPName" name="txtFPName" value="" type="text" size="30">
				</td>

			</tr>

			<tr>
				<td>
					<label>Cell Number</label>
				</td>
				<td>
					<input id="txtFPCellNumber" name="txtFPCellNumber" value="" type="text"  size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Highest Annual Turnover</label>
				</td>
				<td>
					<input id="txtFPHATurnover" name="txtFPHATurnover" value="" type="text"  size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label style="font-weight: bold;">Second Party</label>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<label >Company Name</label>
				</td>
				<td>
					<input id="txtSPCompanyName" name="txtSPCompanyName" type="text" disabled="true" size="30" maxlength="255" value=""/>
				</td>
			</tr>

			<tr>
				<td>
					<label>Trading Name</label>
				</td>
				<td>
					<input id="txtSPTradingName" name="txtSPTradingName" type="text" disabled="true" size="30" maxlength="255" value=""/>
				</td>
			</tr>

			<tr>
				<td>
					<label>PACRA Registration No</label>
				</td>
				<td>
					<input id="txtSPPRegistrationNo" name="txtSPPRegistrationNo" type="text" disabled="true" size="30" maxlength="255" value=""/>
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
					<input id="txtSPPhysical" name="txtSPPhysical" value="" type="text" disabled="true" size="30">
				</td>

			</tr>

			<tr>
				<td>
					<label>Postal</label>
				</td>
				<td>
					<input id="txtSPPostal" name="txtSPPostal" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Tel No (s)</label>
				</td>
				<td>
					<input id="txtSPTelephoneNummber" name="txtSPTelephoneNummber" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Fax No</label>
				</td>
				<td>
					<input id="txtSPFaxNumber" name="txtSPFaxNumber" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>E-mail</label>
				</td>
				<td>
					<input id="txtSPEmail" name="txtSPEmail" maxlength="15" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>NCC Grade</label>
				</td>
				<td>
					<input id="txtSPNCCGrade" name="txtSPNCCGrade" maxlength="15" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Category</label>
				</td>
				<td>
					<input id="txtSPCategory" name="txtSPCategory" maxlength="15" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label style="font-weight: bold;">Director/Owner/Partner</label>
				</td>
				<td></td>
			</tr>

			<tr>
				<td>
					<label>Name</label>
				</td>
				<td>
					<input id="txtSPName" name="txtSPName" value="" type="text"  size="30">
				</td>

			</tr>

			<tr>
				<td>
					<label>Cell Number</label>
				</td>
				<td>
					<input id="txtSPCellNumber" name="txtSPCellNumber" value="" type="text"  size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Highest Annual Turnover</label>
				</td>
				<td>
					<input id="txtSPHATurnover" name="txtSPHATurnover" value="" type="text"  size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label style="font-weight: bold;">Third Party</label>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<label >Company Name</label>
				</td>
				<td>
					<input id="txtTPCompanyName" name="txtTPCompanyName" type="text" disabled="true" size="30" maxlength="255" value=""/>
				</td>
			</tr>

			<tr>
				<td>
					<label>Trading Name</label>
				</td>
				<td>
					<input id="txtTPTradingName" name="txtTPTradingName" type="text" disabled="true" size="30" maxlength="255" value=""/>
				</td>
			</tr>

			<tr>
				<td>
					<label>PACRA Registration No</label>
				</td>
				<td>
					<input id="txtTPPRegistrationNo" name="txtTPPRegistrationNo" type="text" disabled="true" size="30" maxlength="255" value=""/>
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
					<input id="txtTPPhysical" name="txtTPPhysical" value="" type="text" disabled="true" size="30">
				</td>

			</tr>

			<tr>
				<td>
					<label>Postal</label>
				</td>
				<td>
					<input id="txtTPPostal" name="txtTPPostal" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Tel No (s)</label>
				</td>
				<td>
					<input id="txtTPTelephoneNummber" name="txtTPTelephoneNummber" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Fax No</label>
				</td>
				<td>
					<input id="txtTPFaxNumber" name="txtTPFaxNumber" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>E-mail</label>
				</td>
				<td>
					<input id="txtTPEmail" name="txtTPEmail" maxlength="15" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>NCC Grade</label>
				</td>
				<td>
					<input id="txtTPNCCGrade" name="txtTPNCCGrade" maxlength="15" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Category</label>
				</td>
				<td>
					<input id="txtTPCategory" name="txtTPCategory" maxlength="15" value="" type="text" disabled="true" size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label style="font-weight: bold;">Director/Owner/Partner</label>
				</td>
				<td></td>
			</tr>

			<tr>
				<td>
					<label>Name</label>
				</td>
				<td>
					<input id="txtTPName" name="txtTPName" value="" type="text"  size="30">
				</td>

			</tr>

			<tr>
				<td>
					<label>Cell Number</label>
				</td>
				<td>
					<input id="txtTPCellNumber" name="txtTPCellNumber" value="" type="text"  size="30">
				</td>
			</tr>

			<tr>
				<td>
					<label>Highest Annual Turnover</label>
				</td>
				<td>
					<input id="txtTPHATurnover" name="txtTPHATurnover" value="" type="text"  size="30">
				</td>
			</tr>

			
			<tr>
				<td>
					<input type="hidden" value="<?php echo $step+1 ?>" name="step" />
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
}
?>