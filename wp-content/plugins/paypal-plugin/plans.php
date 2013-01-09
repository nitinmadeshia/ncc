<?php
function getPayNowButton ($type,$typeName)
{
	
$result = $wpdb->get_row("select * from wp_paypal where userType = '$type'");
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; 
$paypal_id='happy_1354258776_biz@gmail.com'; //////you must create your own sandbox, replace this.///////////
?>

                <form action='<?php echo $paypal_url; ?>' method='post' name='frmPayPal1'><!-- found on top -->
					
                    <input type='hidden' name='business' value='<?php echo $paypal_id;?>'> <!-- found on top -->
                    <input type='hidden' name='cmd' value="_xclick">
					<!-- <input type='hidden' name='image_url' value='http://websyntax.blogspot.com/skin/../images/logo.png'> <!-- logo of your website -->
					<input type="hidden" name="rm" value="2" /> <!--1-get 0-get 2-POST -->
                    <input type='hidden' class="name" name='item_name' value='Registered as <?php echo $name; ?>'>
                    <input type='hidden' class="price" name='amount' value='<?php echo $result->amount;?>'>
					<input type='hidden' name='no_shipping' value='1'>
					<input type="hidden" name="currency_code" value="<?php echo $result->currency; ?>">
					<input type='hidden' name='cancel_return' value='<?php echo $result->successUrl; ?>'>
                    <input type='hidden' name='return' value='<?php echo $result->cancelUrl; ?>'>
					 <input type="hidden" name="notify_url" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/ncc/wp-content/plugins/notify.php'; ?>" />
                    <input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!"><input type="hidden" name="custom" value='<?php echo $email; ?>'><!-- custom field -->
                </form>
                
<?php	
}
?>