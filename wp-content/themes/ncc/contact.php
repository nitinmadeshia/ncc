<?php
/*
 Template Name:Contact
 */
 
?>
<html>

	<head>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script>
var infowindow = new google.maps.InfoWindow();
var myLatLng = new google.maps.LatLng(-15.394943, 28.276628);
			function initialize() {
			map = new google.maps.Map(document.getElementById('map'), {
			zoom: 12,
			center: myLatLng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
			});

		  	var beachMarker = new google.maps.Marker({
		    position: myLatLng,
		    map: map,
		    title:"Hello World!",
		    });
}
		</script>
		<?php get_header(); ?>
	</head>

	<body onload="initialize()">
	<div class="row">
		<div class="span3">
		<?php get_sidebar(); ?>
		</div>
		<div class="span9">
			<div id="primary">
				<div id="content" role="main">
			<?php 
				while ( have_posts() ) {the_post();} ?>
				    <h1 class="content-heading"><?php the_title(); ?></h1>
				    <hr />
					<div class="content-body contact_content"> <?php the_content();?></div>
					<div class="pull-right" id="map" style="width: 50%; height: 50%;"></div>
				</div>	
			</div>
		</div>
	</div>
	</body>
		<?php get_footer(); ?>
	

</html>
