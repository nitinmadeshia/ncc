<?php
/*
 Plugin Name: Application_status
 Plugin URI: http://www.rcorp.co.in
 Description: Application_status
 Version: 1.0
 Author: Ramanan Corporation
 License: GPL
 */
add_action('admin_menu', 'applicationStatusMenu');
function applicationStatusMenu()
{
	
	add_menu_page( 'NCC', 'Application Status', 'application_status', 'applicationstatus','applicationStatus' );
	
}	

function applicationStatus()
{
	echo "Application_status";
}
