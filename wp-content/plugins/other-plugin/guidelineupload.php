<?php
$upload_dir = wp_upload_dir(); 
$directory= $upload_dir['basedir'];
if(isset($_REQUEST['name']) && isset($_REQUEST['action']))
	{
		$url = admin_url();
		$filename=$_REQUEST['name'];
	
			if(unlink($directory.'/guidelines/'.$filename))
			
			{
				echo 'Deleteing: Please Wait...';
				echo '<script>location ="'.$url.'admin.php?page=addguidelines"</script>';
			
			}
	}
	else
	{
	?>
	
<table border="2" class="widefat" ><tbody><thead> <tr><th>S.No</th><th>File Name</th><th> Want Delete</th></tr></thead>
 <?php
$open_dir=opendir($directory.'/guidelines/');
$url = home_url();
	$i=0;
	while($file=readdir($open_dir))
	{
		$extension=strtolower(substr($file, strpos($file,'.')+1));
		
		if($extension=='pdf')
		
		{
		++$i;
		?>

           
        <tr><td ><?php echo $i; ?></td>
        <td ><?php echo'<a href="'.$url.'/wp-content/uploads/guidelines/'. $file.'" target="_blank">'.$file.'</a>'; ?> </td>
        <td ><a href="<?php $_SERVER['REQUEST_URI'] ?>?page=addguidelines&action=Delete&name=<?php echo $file; ?>">Delete</a></td></tr>
        <?php
		}
	}
	?>
        </tbody>
	</table>
    
        <input type="submit" value="add guideline file"	/> require dojo
       
    
    <?php	
	}
	
	?>

	