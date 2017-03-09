<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
	<title>Otsing</title>
	<?php 
    if(isset($title)){
    echo "<title>" . $title . "</title>";
    } else {
    	echo "<title>Tiitli muutuja tühi</title>";
	}
    ?>
	<!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"  type="text/css" />
	 Siia saab lisada bootstrap theme ka näiteks-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/navbar-theme2.css"  type="text/css" />  
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css"  type="text/css" />
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	
</head>
<body>


<h1>Siia peaks tegema sportlaste otsingu</h1>
<div class="map1">
	<div id="map" style="width:300px;height:300px;"></div>
			<script>
			function myMap() {
				var mapCanvas = document.getElementById("map");
				var myCenter = new google.maps.LatLng(58.381000,26.679878); 
				var mapOptions = {center: myCenter, zoom: 18};
				var map = new google.maps.Map(mapCanvas,mapOptions);
				var marker = new google.maps.Marker({
					position: myCenter,
					animation: google.maps.Animation.BOUNCE
				});
				marker.setMap(map);
			}
			</script> 
			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVCm3tIKv7oYxWnIcp83Eyv_D6P8zqpu4&callback=myMap"></script>
</div>

</body>
</html>