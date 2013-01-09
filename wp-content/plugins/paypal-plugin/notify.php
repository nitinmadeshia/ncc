<?php
function returnVerification()
{
	$result;
	$pp_hostname = "www.sandbox.paypal.com";
	$req = 'cmd=_notify-synch';
	$curl_err = '';
	$tx_token = $_GET['tx'];
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