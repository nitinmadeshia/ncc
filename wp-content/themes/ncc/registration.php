<?php
/*
 Template Name: Registration
*/
require_once(ABSPATH . WPINC . '/registration.php');
global $current_user, $wpdb;
get_currentuserinfo();
global $wpdb;
$tablename='wp_student';
$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$gender = $_REQUEST['gender'];
$dob = $_REQUEST['dob'];
$email = $_REQUEST['email'];
$confirm = $_REQUEST['confirm'];
$course = $_REQUEST['course'];
//$company = $_POST['e-mail'];
$save= array('first_name'=>$firstname, 'last_name'=> $lastname, 'gender'=>$gender, 'date_of_birth'=>$dob,'e-mail'=> $email, 'course'=>$course);
$wpdb->insert($tablename,$save);
 if($_POST['submit']){ 
	$firstname = $wpdb->escape($_REQUEST['firstname']);  
        if(empty($firstname)) {  
            echo "User name should not be empty.";  
            exit();  
        }  
		
		$lastname = $wpdb->escape($_REQUEST['lastname']);  
        if(empty($lastname)) {  
            echo "lastname should not be empty.";  
            exit();  
        }
		    
		$user_id = wp_create_user($firstname, $lastname);

    	if (!$user_id || is_wp_error($user_id)) {
    		 echo "Username already exists. Please try another one.";  
		}
		$userinfo = array(
       'ID' => $user_id,
       'first_name' => $firstname,
       'last_name' => $lastname,
    	);

    // Update the WordPress User object with first and last name.
    wp_update_user($userinfo);

    // Add the company as user metadata
    //update_usermeta($user_id, 'company', $company);
}

if (is_user_logged_in()) : ?>

  <p>You're already logged in and have no need to create a user profile.</p>

<?php else : while (have_posts()) : the_post(); ?>

<div id="page-<?php the_ID(); ?>">
    <h2><?php the_title(); ?></h2>

    <div class="content">
        <?php the_content() ?>
    </div>

    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
        <div class="firstname">
            <label for="firstname">First name:</label>
            <input name="firstname"
            	   type="text"
                   id="firstname"
                   value="<?php echo esc_attr($firstname) ?>">
        </div>
        <div class="lastname">
            <label for="lastname">Last name:</label>
            <input name="lastname"
            	   type="text"
                   id="lastname"
                   value="<?php echo esc_attr($lastname) ?>">
         </div>
         <div class="gender">
         	<label for="gender"> Gender:</label>
         	<input name="gender"
         		   type="radio"
         		   id="gender"
				   value="Male" checked>Male
			<input name="gender"
         		   type="radio"
         		   id="gender"
				   value="Female">Female	   
         </div>
         <div class="dob">
         	<label for="dob">Date Of Birth:</label>
         	<input name="dob"
         		   type="date"
         		   id="dob">
         </div>
         <div class="email">
         	<label for="email">E-mail: </label>
         	E-mail<input name="email"
         		   type="text"
         		   id="email">
         	 Confirm E-mail<input name="confirm"
         		   type="text"
         		   id="confirm">
         </div>
         <div class="course">
         	<label for="course">Desired Course</label>
         	<select name="course">
         		<option value="1"> course1</option>
         		<option value="2"> course2</option>
         	</select>
         </div>
         <input type="submit" value="Submit" name="submit" />
         
        <!-- <div class="company">
            <label for="company">Company:</label>
            <input name="compa ny"
                   id="company"
                   value="<?php echo esc_attr($company) ?>">
        </div>-->
    </form>
</div>

<?php endwhile; endif; ?>