<?php
/*
 Plugin Name: Manage Member Menu
 Plugin URI: http://www.rcorp.co.in
 Description: To ......
 Version: 1.0
 Author: Ramanan Corporation
 License: GPL
 */
 add_action('admin_menu', 'manageMemberMenu');
add_action('admin_init','session_start'); 
 
function manageMemberMenu()
{
	add_menu_page('Manage Member Menu','Manage Member Menu','managemembermenu','managemembermenu');
		add_submenu_page('managemembermenu','Manage Contractor','Manage Contractor',1,'managecontractor','manageContractor');
		add_submenu_page('managemembermenu','Manage Manufacturer','Manage Manufacturer',1,'managemanufacturer','manageManufacturer');
		add_submenu_page('managemembermenu','Manage Supplier','Manage Supplier',1,'managesupplier','manageSupplier');
		add_submenu_page('managemembermenu','Grade','Grade',1,'grade','grade');
}
function manageContractor()
{
	require_once('manage-contractor.php');
}
function manageManufacturer()
{
	require_once('manage-manufacturer.php');
}
function manageSupplier()
{
	require_once('manage-supplier.php');
}
function grade()
{
	require_once('add-grade.php');
}


?>