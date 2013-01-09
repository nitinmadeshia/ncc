<?php
/*
 Plugin Name: Departments of School
 Plugin URI: http://www.rcorp.co.in
 Description: To ......
 Version: 1.0
 Author: Ramanan Corporation
 License: GPL
 */
 add_action('admin_menu', 'dos');
function dos()
{
	add_menu_page( 'DOS','Department Of School',1,'departmentofschool','departmentOfSchool');
	add_submenu_page('departmentofschool','Manage_Course_Prospectus','Manage Course Prospectus','1','managecourseprospectus','manageCourseProspectus');
	add_submenu_page('departmentofschool','Manage_Fees','Manage Fees','1','manage-fees','manageFeesDos');
	add_submenu_page('departmentofschool','Reports','Reports',1,'reports','reports');
	add_submenu_page('departmentofschool','Notification','Notification','1','dosnotification','dosnotification');
	add_submenu_page('departmentofschool','List_Of_Student','List Of Student',1,'listofstudent','listOfStudent');
	
}	
function departmentOfSchool()
{
 echo 'hello';
}
function manageCourseProspectus()
{
	require_once('manage-course-prospectus.php');
}
function manageFeesDos()
{
	require_once('manage-fees.php');
}

function reports()
{
	echo 'reports';
}
function dosnotification()
{
	echo "notification";
}
function listOfStudent()
{
	require_once('list-of-student.php');
	
	
}

