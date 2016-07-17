
<?php include 'header.php'; ?>
<?php
$devID = $_POST["id"];
$name = $_POST["name"];
$active = $_POST["active"];
$type = $_POST["type"];

if ($conn->connect_error)
{
	echo 'Eroare in conectarea la baza de date';
} else {

	
			
			$sql = "INSERT INTO devices (id, name, active, type) VALUES ('".$devID."', '".$name."','".$active."', '".$type."')";
			

			if ($conn->query($sql) === TRUE) { 
			{
				echo 'Device registered. ';//recorded to db
				
			}
			} else {
				echo "Couldn't be registered.";
				
			}
			$conn->close();
			
		
			
		

		}
		
?>
