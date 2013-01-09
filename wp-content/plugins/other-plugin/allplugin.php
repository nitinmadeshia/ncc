<?php
/*
 Plugin Name: all-plugin
 Plugin URI: http://www.rcorp.co.in
 Description: upgrades
 Version: 1.0
 Author: Ramanan Corporation
 License: GPL
 */

add_action('admin_menu', 'applicationStatusMenu');
function applicationStatusMenu()
{
	
	add_menu_page( 'NCC', 'Application Status', 'application_status', 'applicationstatus','applicationStatus' );
//
	add_menu_page('NCC','Renewal','renewal','renewal','renewal');
	add_submenu_page('renewal','NCC','Contractor Renewal','contractor_renewal','contractorrenewal','contractorRenewal');
	add_submenu_page('renewal','NCC','Manufacturer Renewal','manufacturer_renewal','manufacturerrenewal','manufacturerRenewal');
	add_submenu_page('renewal','NCC','Supplier Renewal','supplier_renewal','supplierrenewal','supplierRenewal');
	//
	add_menu_page('NCC','Payment','payment','payment','payment');
	add_submenu_page('payment','NCC','Payment For Supplier','payment_for_supplier','paymentforsupplier','paymentForSupplier');
	add_submenu_page('payment','NCC','Payment For Manufacturer','payment_for_manufacturer','paymentformanufacturer','paymentFormanufacturer');
	add_submenu_page('payment','NCC','Payment For contractor','payment_for_contractor','paymentforcontractor','paymentForContractor');
	add_menu_page( 'NCC', 'Send Attachment', 'send_attachment', 'send_attachment', 'sendAttachment' );
	add_menu_page( 'NCC', 'Upgrades', 'upgrades', 'upgrades', 'upgrades' );
	add_menu_page( 'NCC', 'Notification', 'notification', 'notification', 'notification' );
	//
	add_menu_page( 'NCC', 'Guidelines', 'guidelines', 'guidelines', 'guidelines' );
	add_submenu_page('guidelines','NCC','Add/Delete Guidelines','1','addguidelines','addGuidelines');
	//
	add_menu_page( 'NCC', 'Fee Structure', 'fee_structure', 'fee_structure', 'feeStructure' );
	add_submenu_page('fee_structure','NCC','Add/Delete Fee Structure','1','addfeestructure','addFeeStructure');

}	

function applicationStatus()
{
	require_once('application_status.php');
}
function renewal()
{
	echo "renewal";
}
function contractorRenewal()
{
	require_once('renewal.php'); 
	
}
function manufacturerRenewal()
{
	require_once('renewal.php');
}
function supplierRenewal()
{
		require_once('renewal.php');
}



function sendAttachment()
{
	require_once('attachment.php');
}
function upgrades()
{
	echo "require upgrades forms************************";
}
function payment()
{
	echo "hello";
}
function paymentForSupplier()
{
	echo ' paymentForSupplier';
	getPayNowButton('s','supplier'); 
}
function paymentFormanufacturer()
{
	 echo 'paymentForSupplier';
	getPayNowButton('m','manufacturer'); 
}
function paymentForContractor()
{
	echo 'paymentForContractor';
	getPayNowButton('c','contractor');
}

function notification()
{
	require_once("notification.php");
}


function guidelines()
{
	require_once('uploadfile.php');
}
function addGuidelines()
{
	require_once('guidelineupload.php');
	
}
function feeStructure()
{
	require_once('uploadfile.php');
}
function addFeeStructure()
{
	require_once('fee_structureupload.php');
	
}	

 