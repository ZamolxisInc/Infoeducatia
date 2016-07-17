
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head> 
<body>
  <div id="map" style="width: 1000px; height: 500px;"></div>

  <script type="text/javascript">
    var locations = [
<?php
include 'header.php';
			
			$sql = "SELECT id,lastlocation,lastseen FROM devices ORDER BY id ASC";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 

			{

				while($row = $result->fetch_assoc()) {

					

					echo '[\'Laptop\', 41.8305172, 24.9106556, 1],';

				}

			}


?>


      ['Laptop', 44.8305172, 24.9106556, 1]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 5,
      center: new google.maps.LatLng(45.63, 22.36),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</body>
</html>