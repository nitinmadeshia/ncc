    <?php $upload_dir = wp_upload_dir(); ?>
<?php $directory= $upload_dir['basedir'];?>
    <?php
	//to delete the File 
	if(isset($_REQUEST['name']) && isset($_REQUEST['action']))
	{
		$url = admin_url();
		$filename=$_REQUEST['name'];
	
			if(unlink($directory.'/add-career/'.$filename))
			
			{
				echo 'Deleteing: Please Wait...';
				echo '<script>location ="'.$url.'admin.php?page=addcareer"</script>';
			
			}
	}
	else
	{
	?>

<!--Show all the file which uploads into the folder -->
<table border="2" class="widefat" ><tbody><thead> <tr><th>S.No</th><th>File Name</th><th> Want Delete</th></tr></thead>
 <?php
$open_dir=opendir($directory.'/add-career/');
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
        <td ><?php echo'<a href="'.$url.'/wp-content/uploads/add-career/'. $file.'" target="_blank">'.$file.'</a>'; ?> </td>
        <td ><a href="<?php $_SERVER['REQUEST_URI'] ?>?page=addcareer&action=Delete&name=<?php echo $file; ?>">Delete</a></td></tr>
        <?php
		}
	}?>
        </tbody>
	</table>
    
    <?php	
	}
	
	?>
