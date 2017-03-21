
<div class="container" id="content">
    <form action="<?php echo base_url(); ?>index.php/welcome/otsing" method="get" accept-charset="UTF-8">
        <p><input type="text" name="keyword">
            <input type="submit" value=<?php echo $this->lang->line('otsi_nupp')?>></p>
    </form>
    
    <?php if(isset($results)){ ?>
        <br/>
        <?php foreach($results as $result){ ?>
            <p><?php echo $result->eesnimi ?></p>
        <?php }
    } ?>
    
    <div class="map1">
        <div id="map" style="width:300px;height:300px;"></div>
		
        <script>
            function myMap() {
                var mapCanvas = document.getElementById("map");
                var myCenter = new google.maps.LatLng(58.381000,26.679878);
                var mapOptions = {center: myCenter, zoom: 14};
                var map = new google.maps.Map(mapCanvas,mapOptions);
                var marker = new google.maps.Marker({
                    position: myCenter,
					map: map,
					title: 'Vajuta et suumida'
                }); 
				
				var image = '/images/parking.png';
				image.width = '20px';
				image.height = "20px";
				var parking = new google.maps.Marker({
					position: {lat: 58.38, lng: 26.679},
					map: map,
					icon: image
				});

                marker.setMap(map);
				google.maps.event.addListener(marker,'click',function() {
					map.setZoom(16);
					map.setCenter(marker.getPosition());
				 });
            }
        </script>
    
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVCm3tIKv7oYxWnIcp83Eyv_D6P8zqpu4&callback=myMap"></script>
    </div>
</div>