<?php 
/*
 Template Name: Contact1
 */
 ?>
 
 <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
 	<div class="name">
            <label for="name">Name:</label>
            <input name="contact_name"
            	   type="text"
                   id="name"
                   value="<?php echo esc_attr($contact_name) ?>">
     </div>
     <div class="e-mail">
            <label for="e-mail">E-mail:</label>
            <input name="contact_e-mail"
            	   type="text"
                   id="e-mail"
                   value="<?php echo esc_attr($email) ?>">
     </div>
     <div class="message">
            <label for="message">Message:</label>
            <textarea name="contact_message"
            	      id="message"
                      value="<?php echo esc_attr($message) ?>"></textarea>
     </div>
     <div class="submit">
            <input name="contact_submit"
            	   type="submit"
                   id="submit"
                   value="Submit">
     </div>
     <div class="edit">
            <input name="contact_edit"
            	   type="submit""
                   id="edit"
                   value="Edit">
     </div>
     
 </form>
<?php

	global $wpdb;
	$contact_name=$_REQUEST['contact_name'];
	$email=$_REQUEST['contact_e-mail'];
	$message=$_REQUEST['contact_message'];
	$contact_tablename='wp_contact';
	$save=array('name'=>$contact_name, 'email'=>$email, 'message'=>$message);
	$wpdb->insert($contact_tablename, $save);

?>

<table>
	
	<tr>
		
			
		</thead>
	</tr>
</table>