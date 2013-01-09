<?php
/*
 Plugin Name: Career
 Plugin URI: http://www.rcorp.co.in
 Description: Career
 Version: 1.0
 Author: Ramanan Corporation
 License: GPL
 */
add_action('admin_menu', 'career_menu');
function career_menu()
{
	
	add_menu_page( 'NCC', 'Career', 'career', 'career', 'career' );
	add_submenu_page('career','NCC','Add Career',1,'addcareer','addCareer');
	
}	

function addCareer()
{
	echo "add Career";
}

function career()
{
	require_once('list-career.php');
}
