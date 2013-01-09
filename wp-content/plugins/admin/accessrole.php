<?php
function changerole($column_name,$user_id,$state)
{
	global $wpdb;
	$row=$wpdb->get_row("SELECT * FROM `cms_register` WHERE `user_id`=".$user_id);
	$c_old=$row->contractorsregistration;
	$m_old=$row->manufacturerregistration;
	$s_old=$row->supplierregistration;
	$table_name='cms_register';
	$wpdb->update($table_name,array($column_name => $state),array('user_id' =>$user_id));
	//$result=$wpdb->query("UPDATE cms_register SET " .$column_name. "=".$state."  where user_id=".$user_id);
	echo 'state==='.$state;
	$row=$wpdb->get_row("SELECT * FROM `cms_register` WHERE `user_id`=".$user_id);
	//print_r($row);
	$c=$row->contractorsregistration;
	$m=$row->manufacturerregistration;
	$s=$row->supplierregistration;
	
	$u = new WP_User($user_id);
	$u->remove_role('cms_'.$c_old.$m_old.$s_old);
	$u->add_role( 'cms_'.$c.$m.$s,array('read' => true,) );
	$url = admin_url();
	echo "please wait....";
	echo '<script>location ="'.$url.'admin.php?page=managecontractor&user=contractorsregistration"</script>';
}

?>
