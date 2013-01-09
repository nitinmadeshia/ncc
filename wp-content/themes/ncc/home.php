<?php get_header(); ?>
<!-- content starts-->
		<div class="wrapper">
			<div jsId="imageItemStore" dojoType="dojo.data.ItemFileReadStore" url="<?php bloginfo('template_directory');?>/images.json"></div>
			<div data-dojo-type="dojox/image/SlideShow" id="slideshow1" data-dojo-props="slideshowInterval:3,imageWidth:200,imageHeight:234"> </div>
			<!--<img src="<?php bloginfo('template_directory'); ?>/images/bg.fw.png" alt="background"/>-->
			<!-- left sidebar starts-->
			
			<div class="row">
				<div class="span3">
					<?php get_sidebar(); ?>
					
					<!--<ul class="nav nav-list">
						<li>
							<a href="#">Important Information</a>
						</li>
						<li>
							<a href="#">Publications</a>
						</li>
					</ul>-->
					
					<!--<div class="lsidebar"> Important Information</div>
					<div class="lsidebar"> Publications</div>-->
					
				</div>
				<div class="span6">
					<!-- center part-->
					<div class="center">
						<?php
						$args='category_name=Home';
						query_posts( $args );

						while ( have_posts() ) : the_post();
							echo '<h1 class="content-heading">';
							the_title();
							echo '</h1>';

							echo '<div class="content-body">';
							the_content();
							echo '</div>';

						endwhile;
						wp_reset_query();
						?>
					</div>
	   	        </div>
	   	        <div class="span3">
	   	        <!--login form starts-->
	   	       	    <div class="login_form">
	   	       	    	<div class="triangle"> </div>
	   	       	    	<div class="formstrip">
	   	       	    		<span class="formstrip-text">Registered Members Login</span>
	   	       	    		<img src=" <?php bloginfo('template_directory');?>/images/White Icons/login.png" />
	   	       	    	</div>
	   	       	    	<!-- form starts-->
                        <?php dynamic_sidebar('Login Sidebar');	?>
                        <div class="triangle"> </div>
	   		            <div class="formstrip">
	   		            	<span class="formstrip-text">First Time User Registration</span>
	   		            	<img src=" <?php bloginfo('template_directory');?>/images/White Icons/login.png" alt="registration icon"/>
	   		            </div>
	   		            	
	   	           	</div><!-- login form ends-->
	   	           </div>
	   	       </div>   
	   	  </div>
<?php get_footer(); ?>
