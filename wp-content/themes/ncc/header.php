<!DOCTYPE html>
<html>
	<head>
		<title> <?php wp_title(''); ?> </title>
		<!--<link rel="stylesheet/less" type="text/css" href="bootstrap/less/bootstrap.less" />
		<script type="text/javascript" src="bootstrap/less/less-1.3.1.min.js"> </script>-->
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/nccstrap/less/nccstrap.css"/>
		<link rel="stylesheet" type="text/css" href="<?php $url = plugins_url(); echo $url."/dojo/dojox/image/resources/SlideShow.css"; ?>"/>
		<link rel="stylesheet" type="text/css" href="<?php $url = plugins_url(); echo $url."/dojo/dijit/themes/claro/claro.css"; ?>"/>
		<script src="<?php $url = plugins_url(); echo $url."/dojo/dojo/dojo.js";?>"></script>
		<script>
			require([
				"dijit/registry",
				"dojo/parser",
				"dijit/form/TextBox",
				"dijit/form/Button",
				"dojox/image/SlideShow",
				"dojo/data/ItemFileReadStore",
				"dojo/domReady!"
				],
				function(dijit,parser,TextBox,Button,SlideShow,ItemFileReadStore)
			{
				parser.parse();
				
				dijit.byId('slideshow1').setDataStore(imageItemStore,
				{ 
					query: {}, count:20 },
					{
						imageThumbAttr: "thumb",
						imageLargeAttr: "large"
					}
				);
			});
		</script>
		<!--[if lt IE 9]>
            <script src="<?php bloginfo('template_directory');?>/script/html5shiv.js"></script>
            <![endif]-->
            <?php wp_head();?>
	</head>
	<body class="claro">
		<div class="container" <?php if ( is_user_logged_in() ) {
                                     echo 'style="margin-top:29px"';
                                } ?>>
        <header>
		<nav class="navbar nav-head">
		<!--navbar-inner starts-->
		<div class="navbar-inner"> 
			<img class="ncc_logo" src="<?php bloginfo('template_directory'); ?>/images/logo.fw.png" alt="logo"/>
	       	<!--<a class="brand" href="#"> </a>-->
	       	<ul class="nav pull-right">
	       		<!--<li>
	       			<img src="<?php bloginfo('template_directory'); ?>/images/logo.fw.png" alt="logo"/>
	       		</li>-->
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
				 	
					<?php
					/*
					global $pages;
				 $pages=get_pages(array('sort_column'=>'menu_order', 'sort_order'=>'desc', 'child_of'=>$k->object_id));
				 foreach($pages as $page)
						{
							echo '<li><a href='.'"<?php echo $page->ID;?>">'. $page->post_title.'</a></li>';
						}
				 }
				 
						
				?>		*/		
                
                } ?>
             </ul>
         </div> 
	     <!--navbar-inner ends-->
		 </nav>
		 </header>       