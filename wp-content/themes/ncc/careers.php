<?php
/*
 Template Name:Career
 */
 
?>
<?php get_header(); ?>

<div class="row">
	<div class="span3">
		<?php get_sidebar(); ?>
	</div>
	<div class="span9">
		<div id="primary">
			<div id="content" role="main">
				<?php 
				while ( have_posts() ) : the_post(); ?>
				    <h1 class="content-heading"><?php the_title(); ?></h1>
				    <hr />
					<div class="content-body"> <?php the_content();?></div>
									
				<?php endwhile; // end of the loop. ?>
<?php $upload_dir = wp_upload_dir(); ?>
<?php $directory= $upload_dir['basedir'];
$url = home_url();
$open_dir=opendir($directory.'/add-career/');

	$i=0;
	while($file=readdir($open_dir))
	{

		$extension=strtolower(substr($file, strpos($file,'.')+1));
		
		if($extension=='pdf')
		
		{
			++$i;
			
		?>

           
        <tr><td ><?php echo $i; ?></td>
        <td ><?php echo'<a href="'.$url.'/wp-content/uploads/add-career/'.$file.'"  target="_blank">'.$file.'</a>'.'</br>'; ?> </td>
        <?php
		}
		
	}
?>
			</div><!-- #content -->
		</div><!-- #primary -->
	</div>	
</div>
<?php get_footer(); ?></h2></h2>