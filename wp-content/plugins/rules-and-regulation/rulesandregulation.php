<?php
/*
 Plugin Name: Rules and Regulation
 Plugin URI: http://rcorp.co.in
 Description: Add Snippets to Home
 Version: 1.0
 Author: Ramanan Corporation
 License: GPL
 */
add_action('admin_menu', 'Rules_And_Regulation');

function Rules_And_Regulation()
{
	add_menu_page('Rules And Regulation', 'Rules And Regulation', 'rulesandregulation', 'rulesandregulation');
		add_submenu_page( 'rulesandregulation', 'Manage Category', 'Manage Category', 1 ,'managecategory', 'managecategory' );
		add_submenu_page( 'rulesandregulation', 'Manage Grade', 'Manage Grade', 1, 'managegrade', 'managegrade' );
		add_submenu_page( 'rulesandregulation', 'Manage Fees', 'Manage Fees', 1, 'managefees', 'managefees' );
		add_submenu_page( 'rulesandregulation', 'Report', 'Report', 1, 'report', 'report' );
}

function rulesandregulation()
{
	require_once('rar.php');
}

function managecategory()
{
	require_once('managecategory.php');
}

function managegrade()
{
	require_once('managegrade.php');
}
function managefees()
{
	require_once('managefees.php');
}

function report()
{
	require_once('report.php');
}

?>