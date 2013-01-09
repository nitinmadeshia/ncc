<?php
global $wpdb;
$user_id=get_current_user_id();
$page=$_REQUEST['page'];
$supplierrenewal='supplierrenewal';
$contractorrenewal='contractorrenewal';
$manufacturerrenewal='manufacturerrenewal';
if($contractorrenewal==$page)
{
?>
<a href="#">Contractor id <?php echo $user_id; ?> </a>Dojo Require
<?php
}
if($manufacturerrenewal==$page)
{	
?>
<a href="#">Manufacturer id <?php echo $user_id; ?></a>Dojo Require
<?php
}
if($supplierrenewal==$page)
{
	?>
	<a href="#">supplier id <?php echo $user_id; ?></a>Dojo Require
    <?php
}
?>