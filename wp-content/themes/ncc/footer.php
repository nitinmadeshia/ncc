	<footer>
		<div class="row">
		<div class="foot_sidebar span12"> 
			<?php dynamic_sidebar('sidebar-3'); ?>
		</div></div>
		<!--<div class="span3 foot_sidebar"><?php dynamic_sidebar('sidebar-4'); ?></div>-->
		<div class="row">
			<div class="span12">
	   	    	<img src="<?php bloginfo('template_directory');?>/images/footer.fw.png" />
	   	   </div>
	   </div>
	   <div class="row">
	   		<div class="span12">
	   	    	<div class="navbar navbar-inverse">
	   			<div class="navbar-inner">
	   				<ul class="nav">
	   				<?php
                    $menu_name = 'top-nav';
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
				 		<li>
				 			<a href="<?php echo $k->url;?>"> <?php echo $k->title;?> </a>
				 		</li>
                    <?php } ?>
	   			 	</ul>
	   				<img class="footer_logo" src="<?php bloginfo('template_directory');?>/images/Flogo.fw.png" alt="footer" />
	   		 	</div>
	   	    	</div>
          </div> 
       </div>
	     </footer>
	     <?php wp_footer(); ?>   
	     </div>  <!-- container ends-->
	 </body>
</html>