<?php
$url = "/ncc/wp-admin/admin.php?page=".$_REQUEST['page']."&user=".$_REQUEST['user']."&appno=".$_REQUEST['appno']."&userid=".$_REQUEST['userid'];
?>


<input type="button" class="button" value="Approved" name="button" onClick="document.location='<?php echo $url;?>&action=approve'"></td>

<input type="button" class="button" value="Reject" name="button" onClick="document.location='<?php echo $url;?>&action=reject'"></td>
