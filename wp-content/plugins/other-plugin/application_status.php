<?php
global $wpdb;
$user_id=get_current_user_id();
//for contractor

echo "page ncc 8 2/6";
$result=$wpdb->get_row("SELECT application_no FROM contractorsregistration WHERE `user_id`=".$user_id);
if($result->application_no)
{
	echo '<a href="#">Contractor application Id:'.$result->application_no.'</a>';
}
//for manufacturer
$result1=$wpdb->get_row("SELECT application_no FROM manufacturerregistration WHERE `user_id`=".$user_id);
if($result->application_no)
{
	echo '</br><a href="#">Manufacturer application Id:'.$result1->application_no.'</a>';
}
//for supplier
$result3=$wpdb->get_row("SELECT * FROM supplierregistration WHERE `user_id`=".$user_id);
if($result3->application_no)
{
	echo '</br><a href="#">supplier application Id:'.$result3->application_no.'</a>';
}
$result4=$wpdb->get_row("SELECT * FROM jointventure WHERE `user_id`=".$user_id);
if($result4->application_no)
{
	echo '</br><a href="#">jointventure application Id:'.$result3->application_no.'</a>';
}
else
{
echo "joint venturedb not complete ";
}
?>