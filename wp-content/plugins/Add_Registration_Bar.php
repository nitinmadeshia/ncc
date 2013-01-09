<?php
/*
 Plugin Name: Add Registration Bar
 Plugin URI: http://www.rcorp.co.in
 Description: Add Registration Sidebar
 Version: 1.0
 Author: Ramanan Corporation
 License: GPL
 */
 
add_action('admin_menu', 'add_registration_menu');
function add_registration_menu()
{
	
	add_menu_page( 'NCC', 'Registration', 'register_as', 'register_as', 'register_user' );	
	add_submenu_page( 'register_as', 'As Contractor', 'As Contractor','as_contractor' , 'Register_as_Contractor', 'register_as_contractor' );
	add_submenu_page( 'register_as', 'As Supplier', 'As Supplier', 'as_supplier', 'Register_as_Supplier', 'register_as_supplier' );
	add_submenu_page( 'register_as', 'As Manufacturer', 'As Manufacturer', 'as-manufacturer', 'Register_as_Manufacturer', 'register_as_manufacturer' );
	add_submenu_page( 'register_as', 'Manufacturer Profile', 'Manufacturer Profile', 'manufacturerprofile', 'manufacturerprofile', 'manufacturerProfile' );
	add_submenu_page( 'register_as', 'Supplier Profile', 'Supplier Profile', 'supplierprofile', 'supplierprofile', 'supplierProfile' );
	add_submenu_page( 'register_as', 'contractorprofile', 'contractorprofile', 'contractorprofile', 'contractorprofile', 'contractorprofile' );
	add_menu_page('NCC','Joint Venture','joint_venture','jointventure','jointVenture');	
	
//	remove_submenu_page('register_as','register_as');
}	

function register_user()
{
	?>
    
    <a href="<?php $_SERVER['REQUEST_URI'] ?>?page=Register_as_Contractor"> register_as_contractor </a></br>
    <a href="<?php $_SERVER['REQUEST_URI'] ?>?page=Register_as_Manufacturer"> register_as_manufacturer </a></br>
    <a href="<?php $_SERVER['REQUEST_URI'] ?>?page=Register_as_Supplier"> register_as_supplier</a>
    <?php // require_once('userrole.php');
	
}

function register_as_contractor()
{
	require_once ('dojoXPS/registrer-as-contractor.php');
}

function register_as_supplier()
{
	require_once ('dojoXPS/forms/registration/registrer-as-supplier.php');
}

function register_as_manufacturer()
{
	require_once ('dojoXPS/forms/registration/registrer-as-manufacture.php');
}

function payment_registration()
{
	require_once('profile/profile.php');
}
function contractorProfile()
{
	require_once('profile/profile.php');

}
function supplierProfile()
{
	require_once('profile/profile.php');
//	echo "jjii";
}
function manufacturerProfile()
{
	require_once('profile/profile.php');
}

function jointVenture()
{
		require_once ('dojoXPS/forms/registration/joint-venture.php');
}
 