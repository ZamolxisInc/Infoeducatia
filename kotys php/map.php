
<?php
include 'header.php';
$tt[100] = "s";
$i = 1;
if ($conn->connect_error)

{

	echo 'Eroare in conectarea la baza de date';

} else {

			
			$sql = "SELECT id,lastlocation,lastseen,name FROM devices WHERE lastlocation IS NOT NULL ORDER BY id ASC";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 

			{

				while($row = $result->fetch_assoc()) {

					

					//echo '[\''.$row["id"].' - '.$row["name"].' - '.$row["lastseen"].'\', '.$row["lastlocation"].', 1],';
					$tt[$i] = '[\''.$row["id"].' - '.$row["name"].' - '.$row["lastseen"].'\', '.$row["lastlocation"].', 1],';

					$i++;

				}

			}

			else {

				echo "<h2>Fara rezultate</h2>";
			}
			$conn->close();
	}	
?>
<html> 
<head> 
 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head> 
<body>
  <div id="map" style="width: 700px; height: 500px;"></div>

  <script type="text/javascript">
    var locations = [
	<?php 
	for($i=1;$i<=count($tt);$i++)
	{
		echo $tt[$i];
	}
	?>
     // <?php echo $tt[1]; ?>
	 // <?php echo $tt[2]; ?>
	 // <?php echo $tt[3]; ?>
     
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