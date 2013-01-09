<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ncc-demo
 * @subpackage ncc
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<div class="row">
	<div class="span3">
		<?php get_sidebar(); ?>
	</div>
	<div class="span9">
		<div id="primary">
			<div id="content" role="main">
				<?php 
				if(is_user_logged_in()) {
				while ( have_posts() ) : the_post(); ?>
				    <h1 class="content-heading"><?php the_title(); ?></h1>
				    <hr />
					<div class="content-body"> <?php the_content();?></div>
					
				<?php endwhile; // end of the loop. 
				}
				else {
					echo "You don't have sufficient permissions to see this page.";
				}?>

			</div><!-- #content -->
		</div><!-- #primary -->
	</div>	
</div>
<?php get_footer(); ?>