<?php
//echo "hhhh";
global $wpdb;
$user_id=get_current_user_id();
if(isset($_REQUEST['page']))
$page=$_REQUEST['page'];
//echo $a;
$contractorprofile='contractorprofile';
$manufacturerprofile='manufacturerprofile';
$supplierprofile='supplierprofile';
$userpayment='User_Payment';
if($contractorprofile==$page)
{
	$result=$wpdb->get_row("SELECT * FROM contractorsregistration WHERE `user_id`=".$user_id." && `is_delete`=0");
	/*echo '<pre>';
	print_r($result);
	echo '</pre>';
	echo $result->user_id;*/
	?>
	<table border="2" class="widefat" >
<tbody> 
<thead><tr><th>user_id</th><td><?php echo $result->user_id; ?></td></tr>
<tr><th>main_category</th><td><?php echo $result->main_category; ?></td></tr>
<tr><th>company_name</th><td><?php echo $result->company_name; ?></td></tr>
<tr><th>trading_name</th><td><?php echo $result->trading_name;?></td></tr>
<tr><th>telephone_no</th><td><?php echo $result->telephone_no_registered; ?></td></tr>
</tr><tr><th>fax_no</th><td><?php echo $result->fax_no_registered; ?></td></tr>
<tr><th>email_id</th><td><?php echo $result->email_id_registered; ?></td></tr>
</thead></tbody></table>
<?php }
if($manufacturerprofile==$page)
{
	$result=$wpdb->get_row("SELECT * FROM manufacturerregistration WHERE `user_id`=".$user_id);
	// echo '<pre>';
	// print_r($result);
	// echo '</pre>';
	// echo $result->user_id;
	?>
	<table border="2" class="widefat" >
<tbody> 
<thead><tr><th>user_id</th><td><?php echo $result->user_id; ?></td></tr>
<tr><th>company_name</th><td><?php echo $result->company_name; ?></td></tr>
<tr><th>trading_name</th><td><?php echo $result->trading_name;?></td></tr>
<tr><th>telephone_no</th><td><?php echo $result->telephone_no; ?></td></tr>
</tr><tr><th>fax_no</th><td><?php echo $result->fax_no; ?></td></tr>
<tr><th>email_id</th><td><?php echo $result->email; ?></td></tr>
</thead></tbody></table>
<?php 
}
if($supplierprofile==$page)
{
	$result=$wpdb->get_row("SELECT * FROM supplierregistration WHERE `user_id`=".$user_id);
	/*echo '<pre>';
	print_r($result);
	echo '</pre>';
	echo $result->user_id;*/
	?>
		<table border="2" class="widefat" >
<tbody> 
<thead><tr><th>user_id</th><td><?php echo $result->user_id; ?></td></tr>
<tr><th>company_name</th><td><?php echo $result->company_name; ?></td></tr>
<tr><th>trading_name</th><td><?php echo $result->trading_name;?></td></tr>
<tr><th>telephone_no</th><td><?php echo $result->telephone_no; ?></td></tr>
</tr><tr><th>fax_no</th><td><?php echo $result->fax_no; ?></td></tr>
<tr><th>email_id</th><td><?php echo $result->email; ?></td></tr>
</thead></tbody></table>

<?php
}
if($userpayment==$page)
{
	getPayNowButton('s','contractor'); 
}

?>