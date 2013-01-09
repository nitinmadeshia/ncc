<?php
$result=$wpdb->query("SELECT * FROM `cms_register` WHERE `user_id`=".$user_id);
if($result==0)
{
	$csm_table='cms_register';
	$data=array('user_id'=>$user_id,$table_name=>1);
	$wpdb->insert($csm_table,$data) or die(mysql_error());
	
	$row=$wpdb->get_row("SELECT * FROM `cms_register` WHERE `user_id`=".$user_id);
	//print_r($row);
	$c=$row->contractorsregistration;
	$m=$row->manufacturerregistration;
	$s=$row->supplierregistration;

	$u = new WP_User($user_id);
	$u->remove_role('cms_000');
	$u->add_role( 'cms_'.$c.$m.$s,array(
		'read' => true,
		) );
}
if($result!=0)
{
	$csm_table='cms_register';
	$data=array($table_name=>1);
	$where=array('user_id'=>$user_id);
	$row=$wpdb->get_row("SELECT * FROM `cms_register` WHERE `user_id`=".$user_id);
	$c_old=$row->contractorsregistration;
	$m_old=$row->manufacturerregistration;
	$s_old=$row->supplierregistration;
	$wpdb->update($csm_table,$data,$where) or die(mysql_error());

	$row=$wpdb->get_row("SELECT * FROM `cms_register` WHERE `user_id`=".$user_id);
	//print_r($row);
	$c=$row->contractorsregistration;
	$m=$row->manufacturerregistration;
	$s=$row->supplierregistration;
	
	$u = new WP_User($user_id);
	$u->remove_role('cms_'.$c_old.$m_old.$s_old);
	$u->add_role( 'cms_'.$c.$m.$s,array(
		'read' => true,
		) );
}

?>
