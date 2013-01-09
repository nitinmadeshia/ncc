<?php 
/**
 * @package Hello_Dolly
 * @version 1.6
 */
/*
Plugin Name:remove cap
Plugin URI: http://wordpress.org/extend/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Matt Mullenweg
Version: 1.6
Author URI: http://ma.tt/
*/
// add_role('Administrator'); 
/*remove_role('subscriber');
remove_role('editor');
remove_role('author');
remove_role('contributor');//remove_role('cms_111');
//remove_role('cms_001');
add_action( 'admin_init', 'clean_unwanted_caps' );
function clean_unwanted_caps(){
    $delete_caps = array('edit_replies', 'publish_replies', 'publish_topics');
    global $wp_roles;
    foreach ($delete_caps as $cap) {
        foreach (array_keys($wp_roles->roles) as $role) {
            $wp_roles->remove_cap($role, $cap);
        }
    }
}*/
?>