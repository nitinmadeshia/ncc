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
				while ( have_posts() ) : the_post(); ?>
				    <h1 class="content-heading"><?php the_title(); ?></h1>
				    <hr />
					<div class="content-body"> <?php the_content();?></div>
									
					<?php 
				 	global $pages;
				 	$key=get_the_id();
				 	$pages=get_pages(array('sort_column'=>'menu_order', 'sort_order'=>'desc', 'child_of'=>$key));
					foreach($pages as $page)
				 	{?>
				 		<a href="<?php echo $page->guid;?>" class="sub-pages pull-left">
				 		<?php if ( has_post_thumbnail($page->ID) )
				 		{?>
				 			<div class="sub-thumbnail"><?php  echo get_the_post_thumbnail($page->ID,'thumbnail');?></div>
				  <?php } ?>
				 			<div class="sub-link"> <?php echo $page->post_title;?> </div>
					    </a>
			  <?php } ?>
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
	</div>	
</div>
<?php get_footer(); ?>