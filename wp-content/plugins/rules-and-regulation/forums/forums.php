<?php
/*
 Plugin Name: Forums
 Plugin URI: http://www.rcorp.co.in
 Description: Forums
 Version: 1.0
 Author: Ramanan Corporation
 License: GPL
 */
add_action('admin_menu', 'forums_menu');
function forums_menu()
{
	
	add_menu_page( 'NCC', 'Forums', 'forums', 'forums', 'forums' );
	
}	

function forums()
{
	echo "Forums";
}
