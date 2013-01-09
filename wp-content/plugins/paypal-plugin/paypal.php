<?php

/*
 Plugin Name: PayPal Plugin
 Plugin URI: http://rcorp.co.in
 Description: Add Snippets to Home
 Version: 1.0
 Author: Ramanan Corporation
 License: GPL
 */

function create_table()
{
	global $wpdb;
	$ptable = $wpdb -> prefix . "paypal";
	$pdtable = $wpdb -> prefix . "paypal_data";
	if ($wpdb -> get_var("SHOW TABLES LIKE '$ptable'") != $ptable)
	{
		$sql = "CREATE TABLE $ptable(
				ID INT( 10 ) NOT NULL AUTO_INCREMENT ,
				paypalUserId VARCHAR( 100 ) NOT NULL ,
				userType VARCHAR(10) NOT NULL,
				amount VARCHAR(10) NOT NULL,				
				currency VARCHER( 10 ) NOT NULL ,
				successUrl VARCHAR(200) NOT NULL,
				cancelUrl VARCHAR(200) NOT NULL,
				PRIMARY KEY ( `ID` )
				);";


		require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}
}

register_activation_hook(__FILE__, 'create_table');

add_action('admin_menu', 'paypal_plugin');


       function currencyCode($curretCurrency='USD')
{
	$currency = array('AUD' => 'Australian Dollars',
					  'CAD' => 'Canadian Dollars',
					  'CHF' => 'Swiss Franc',
					  'CZK' => 'Czech Koruna',
				      'DKK' => 'Danish Krone',
					  'EUR' => 'Euros',
					  'GBP' => 'Pounds Sterling',
					  'HKD' => 'Hong Kong Dollar',
					  'HUF' => 'Hungarian Forint',
					  'ILS' => 'Israeli Shekel',
					  'JPY' => 'Japanese Yen',
					  'MXN' => 'Mexican Peso',
					  'NOK' => 'Norwegian Krone',
					  'NZD' => 'New Zealand Dollar',
					  'PLN' => 'Polish Zloty',
					  'SEK' => 'Swedish Krona',
					  'SGD' => 'Singapore Dollar',
					  'USD' => 'United States Dollars'
					   );
?>					   
	    <select id="selCurrency" name="selCurrency">
	      <?php
	      foreach($currency as $key => $value)
	       {
	      ?>
	          <option value="<?php echo $key; ?>" <?php selected($curretCurrency, $key); ?> ><?php echo $value; ?></option>
	      <?php
	       }
	      ?>
	      </select>
      <?php
}



function paypal_plugin()
{
	add_options_page('PayPal', 'PayPal', 1, 'paypal', 'paypal');
}

function paypal()
{

	global $wpdb;
	if (isset($_REQUEST['submit']))
{	
	$result = $wpdb -> get_col('select userType from wp_paypal');
	if (in_array($_POST['selAction'], $result) == FALSE)
	{
		$data = array('paypalUserId' => $_POST['txtUserId'], 'userType'=>$_POST['selAction'] ,'amount' => $_POST['txtAmount'], 'currency' => $_POST['selCurrency'],'successUrl'=>$_POST['txtRUrl']);
		$wpdb -> insert('wp_paypal', $data);
	}
	else
	{
		$data = array('paypalUserId' => $_POST['txtUserId'], 'amount' => $_POST['txtAmount'], 'currency' => $_POST['selCurrency'],'successUrl'=>$_POST['txtRUrl']);
		$where = array('userType' => $_POST['selAction']);
		$wpdb -> update('wp_paypal', $data, $where);
	}
}
	$rest = $_REQUEST['usertype'];
	$result = $wpdb->get_row("select * from wp_paypal where userType = '".$rest."'");
?>

<form id="formPaypal" action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
	<h1>Paypal Settings</h1>

	<div>
		<table class="widefat">
			<tr>
				<td>Type</td>
				<td>
					<select name="selAction" id="selAction" onchange="document.location.href='options-general.php?page=paypal&usertype='+this.value">
					<option value="">Select user type</option>
					<option value="c">Contractor</option>
					<option value="s">Suplier</option>
					<option value="m">Manufacturer</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Enter paypal user Id </td>
				<td>
				<input type="text" name="txtUserId" id="txtUserId" value="<?php echo $result -> paypalUserId; ?>">
				</td>
			</tr>

			<tr>
				<td>Amount</td>
				<td>
				<input type="text" name="txtAmount" id="txtAmount" value="<?php echo $result -> amount; ?>">
				</td>
			</tr>
			<tr>
				<td>Select Currency</td>
				<td>
					<p>
						<?php currencyCode($result -> currency); ?>
					</p>
				</td>
			</tr>
			<tr>
				<td>Return Page URL</td>
				<td>
				<input type="text" name="txtRUrl" id="txtRUrl" value="<?php echo $result -> successUrl; ?>">
				</td>
			</tr>
		</table>
		<input type="submit" value="Save" name="submit">
	</div>

</form>

<script type="text/javascript">
jQuery("#selAction").val('<?php echo $_GET['usertype']; ?>');</script>

<?php


if(isset($_REQUEST['url_submit']))
{
$data = array('cancelUrl' => $_POST['txtCUrl']);

$wpdb ->query($wpdb->prepare(" update wp_paypal set cancelUrl= '".$_POST['txtCUrl']."'"));
}


$result = $wpdb->get_row("select cancelUrl from wp_paypal limit 1");
?>

<form id="formPaypalAdvance" action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
	<label>Cancel page URL: </label>
	<input type="text" name="txtCUrl" value="<?php echo $result -> cancelUrl; ?>">
	<br />
	<input type="submit" value="save" name="url_submit">
</form>
<?php
}

function paypal_encrypt($hash)
{
	global $MY_KEY_FILE;
	global $MY_CERT_FILE;
	global $PAYPAL_CERT_FILE;
	global $OPENSSL;
//$a=plugins_url("paypal-plugin");
$a="ncc/wp-content/plugins/paypal-plugin";
//$a = $_SERVER['HTTP_HOST'].'/ncc/wp-content/plugins/paypal-plugin';
# private key file to use
$MY_KEY_FILE = $a."/my-prvkey.pem";

# public certificate file to use
$MY_CERT_FILE = $a."/my-pubcert.pem";

# Paypal's public certificate
$PAYPAL_CERT_FILE = $a."/paypalcert.pem";

# path to the openssl binary
$OPENSSL = "/usr/bin/openssl";



	if (!file_exists($MY_KEY_FILE)) {
		echo "ERROR: MY_KEY_FILE $MY_KEY_FILE not found\n";
	}
	if (!file_exists($MY_CERT_FILE)) {
		echo "ERROR: MY_CERT_FILE $MY_CERT_FILE not found\n";
	}
	if (!file_exists($PAYPAL_CERT_FILE)) {
		echo "ERROR: PAYPAL_CERT_FILE $PAYPAL_CERT_FILE not found\n";
	}


	//Assign Build Notation for PayPal Support
	$hash['bn']= 'StellarWebSolutions.PHP_EWP2';

	$data = "";
	foreach ($hash as $key => $value) {
		if ($value != "") {
			//echo "Adding to blob: $key=$value\n";
			$data .= "$key=$value\n";
		}
	}

	$openssl_cmd = "($OPENSSL smime -sign -signer $MY_CERT_FILE -inkey $MY_KEY_FILE " .
						"-outform der -nodetach -binary <<_EOF_\n$data\n_EOF_\n) | " .
						"$OPENSSL smime -encrypt -des3 -binary -outform pem $PAYPAL_CERT_FILE";

	exec($openssl_cmd, $output, $error);

	if (!$error) {
		return implode("\n",$output);
	} else {
		return "ERROR: encryption failed";
	}
}

function getPayNowButton ($type,$typeName)
{		
global $wpdb;
$result = $wpdb->get_row("select * from wp_paypal where userType = '$type'");
/*change here*/

$returnPageUrl = 'http://'.$_SERVER['HTTP_HOST'].'/ncc/wp-admin/admin.php?page='.$result->successUrl;
//$notifyPageUrl = 'http://'.$_SERVER['HTTP_HOST'].'/ncc/wp-content/plugins/paypal_plugin/notify.php';
$form = array('cmd' => '_xclick',
	      'business' => $result->paypalUserId,
	      'cert_id' => 'BNLUCRJG4UHVQ',
	      'rm' => '2',
	      'currency_code' => $result->currency,
	      'no_shipping' => '1',
	      'item_name' => 'Registered as '.$typeName,
	      'amount' => $result->amount,
	      'cancel_return' => $result->cancelUrl,
	      'return' => $returnPageUrl
	     );
	$encrypted = paypal_encrypt($form);


/*change done*/
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr';
?>
<form action="<?php echo $paypal_url; ?>" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="<?php echo $encrypted; ?>">
<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
               
<?php	
}

function returnVerification($tx)
{
	$result;
	$pp_hostname = "www.sandbox.paypal.com";
	$req = 'cmd=_notify-synch';
	$curl_err = '';
	$tx_token = $tx;
	$auth_token = "JI5nxSp3CNuFh55IeBArRhsuS_ve5T3gEdXNPWry_qc_7eB97mmgOtjpHwO";
	$req .= "&tx=$tx_token&at=$auth_token";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://$pp_hostname/cgi-bin/webscr");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: $pp_hostname"));
	$res = curl_exec($ch);
	$curl_err = curl_error($ch);
	curl_close($ch);

	if (!$res)
	{
		'http error' . $curl_err . '<br />';
	}
	else
	{	$lines = explode("\n", $res);
		if (strcmp($lines[0], "SUCCESS") == 0)
		{
			$result = 'verified';
		}
		else if (strcmp($lines[0], "FAIL") == 0)
		{
			$result = 'fail';
		}
	}
return $result;
}
?>
