<?php
require_once('memberdetails.php');
require_once('renewalrequest.php');
require_once('upgrade-request.php');
require_once('new-request.php');
require_once('rejectlist.php');


?>

<?php
if (!isset($_REQUEST['action']) && !isset($_REQUEST['user'])):
?>
<ul class="ncc-table">
	<li><a href="<?php $_SERVER['REQUEST_URI'] ?>?page=managecontractor&user=contractorsregistration&action=newrequest">New Contractor Request</li>
	<li><a href="<?php $_SERVER['REQUEST_URI'] ?>?page=managecontractor&user=contractorsregistration&action=rejectlist">Reject Contractor List</li>
	<li><a href="<?php $_SERVER['REQUEST_URI'] ?>?page=managecontractor&user=contractorsregistration" >List of Contractors</li>
	
	<li><a href="#">Category of contractors</li>
	<li><a href="<?php $_SERVER['REQUEST_URI'] ?>?page=managecontractor&action=renewalrequest">Renewal Request</li>
	<li><a href="#">Reports</li>
	<li><a href="<?php $_SERVER['REQUEST_URI'] ?>?page=managecontractor&action=upgraderequest">Upgrade Request</li>
</ul>
<?php
endif;
?>