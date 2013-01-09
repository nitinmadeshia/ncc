	<?php
	$upload_dir = wp_upload_dir(); 
	$directory= $upload_dir['basedir'];
	$url = home_url();
    $page=$_REQUEST['page'];
	$open_dir=opendir($directory.'/'.$page.'/');

	$i=0;
	while($file=readdir($open_dir))
	{

		$extension=strtolower(substr($file, strpos($file,'.')+1));
		
		if($extension=='pdf')
		
		{
			
			
		?>
           <td ><?php echo'<a href="'.$url.'/wp-content/uploads/'.$page.'/'.$file.'" ">'.$file.'</a>'.'</br>'; ?> </td>
        <?php
		}
		
	}
?>
	
	