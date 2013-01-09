<?php
function changerole($table_name,$user_id,$active)
{
	global $wpdb;
	$row=$wpdb->get_row("SELECT * FROM `cms_register` WHERE `user_id`=".$user_id);
	$c_old=$row->contractorsregistration;
	$m_old=$row->manufacturerregistration;
	$s_old=$row->supplierregistration;
	
	$result=$wpdb->query("UPDATE cms_register SET " .$table_name. "=".$active."  where user_id=".$user_id);
	$wpdb->update( $table_name, array('is_active' => '1'), array( 'user_id' => $user_id ) );
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
