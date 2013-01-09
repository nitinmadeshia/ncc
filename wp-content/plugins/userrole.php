<?php
/*$u = new WP_User( 6 );

// Remove role
$u->remove_role( 'cms_110' );

// Add role
$u->add_role( 'cms_111',array(
    'read' => true, // True allows that capability
    'renewal' => true,
    'delete_posts' => false, // Use false to explicitly deny
) );*/
echo 
home_url();
echo site_url();
echo content_url();
echo plugins_url();
echo wp_upload_dir();
?>
<form action="<?php echo  $_SERVER['REQUEST_URI']?>" method="POST">
<input type="submit" value="submit"  id="submit">
</form>