<?php
/*
 Template Name:Cost Report
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
$open_dir=opendir($directory.'/cost-report/');

	//$i=0;
	while($file=readdir($open_dir))
	{

		$extension=strtolower(substr($file, strpos($file,'.')+1));
		
		if($extension=='pdf')
		
		{
			//++$i;
			
		?>
        <p class="MsoNormal" style="text-kashida-space: 50%; line-height:100%" align="justify">
	<span style="font-family: Verdana">
	<?php echo '<a href="'.$url.'/wp-content/uploads/cost-report/'.$file.'"  target="_blank">'.$file.'</a>'.''; ?> </p>
        <?php
		}
		
	}
?>
			</div><!-- #content -->
		</div><!-- #primary -->
	</div>	
</div>
<?php get_footer(); ?></h2></h2>