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
	<li><a href="<?php $_SERVER['REQUEST_URI'] ?>?page=managemanufacturer&user=manufacturerregistration&action=newrequest">New Manufacturer Request</li>
	<li><a href="<?php $_SERVER['REQUEST_URI'] ?>?page=managemanufacturer&user=manufacturerregistration&action=rejectlist">Reject Manufacturer List</li>
	<li><a href="<?php $_SERVER['REQUEST_URI'] ?>?page=managemanufacturer&user=manufacturerregistration">list of Manufacturer</li>
	</ul>
<?php
endif;
?>
