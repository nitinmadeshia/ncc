<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package ncc
 * @subpackage ncc
 * @since Twenty Eleven 1.0
 */

//$options = twentyeleven_get_theme_options();
//$current_layout = $options['theme_layout'];

if ( 'content' != $current_layout ) :
?>
		<div id="secondary" class="widget-area" role="complementary">
			<ul class="nav nav-list">
				<?php
				 $menu_name = 'left-nav';
                 $args = array(
                 'order'                  => 'ASC',
                 'orderby'                => 'menu_order',
                 'post_type'              => 'nav_menu_item',
                 'post_status'            => 'publish',
                 'output'                 => ARRAY_A,
                 'output_key'             => 'menu_order',
                 'nopaging'               => true,
                 'update_post_term_cache' => false );
                 $items = wp_get_nav_menu_items( $menu_name, $args );
				 
				 foreach($items as $k)
				 {?>
				 	<li class="nav-header left-nav">
				 	<?php
				 	 if ( has_post_thumbnail($k->object_id) )
					 {?>
					 <div class="img-thumbnail"><?php echo get_the_post_thumbnail($k->object_id,'thumbnail');?></div>
					 	
			   <?php } 
					  //echo get_the_post_thumbnail($k->ID,'thumbnail'); ?>
				 		<a class="list-item" href="<?php echo $k->url;?>"> <?php echo $k->title;?> </a> 
				 		<ul class="left-list" type="none">
				 			<?php
					        global $pages;
				            $pages=get_pages(array('sort_column'=>'menu_order', 'sort_order'=>'desc', 'child_of'=>$k->object_id));
				            foreach($pages as $page)
						    {?>
						    <a class="list-hover-link" href="<?php echo $page->guid;?>">
								<li class="list-on-hover">
								 	<?php echo $page->post_title;?> 
								</li>
							</a>
							
				    <?php   } ?>
				 		</ul>
				 	</li>	
		 <?php } ?>			
            </ul>
            <div>
         
          <?php   // Ads Place output
			//if(function_exists('drawAdsPlace')) drawAdsPlace(array('id' => 3), true);
			// Single Ad output
			//if(function_exists('drawAd')) drawAd(array('id' => 3), true);
			// Ads Block output
			//if(function_exists('drawAdsBlock')) drawAdsBlock(array('id' => 2));
		   	
		   ?>    
		   </div>         
			<?php //if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<!--<aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h3 class="widget-title"><?php _e( 'Meta', 'twentyeleven' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>-->

			<?php //endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
<?php endif; ?>