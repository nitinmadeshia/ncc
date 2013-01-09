<?php
/*
 Template Name: Classified
 */
 get_header();
?>
<div class="row">
	<div class="span3">
		<?php get_sidebar();
			  dynamic_sidebar('sidebar-1');
		?>
	</div>
	<div class="span9">
		<div id="primary">
			<div id="content" role="main">
				<?php while (have_posts()) {the_post();}?>
					<h1 class="content-heading"><?php the_title(); ?></h1>
				    <hr />
					<div class="content-body"> <?php the_content();?></div>
			</div><!-- #content -->
		</div><!-- #primary -->
	</div>
</div>
<?php get_footer();?>
 
