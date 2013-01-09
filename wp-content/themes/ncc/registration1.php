<?php
/*
 Template Name:registeration1
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
<?php dynamic_sidebar('Register Sidebar'); ?>
			</div><!-- #content -->
		</div><!-- #primary -->
	</div>	
</div>
<?php get_footer(); ?></h2></h2>