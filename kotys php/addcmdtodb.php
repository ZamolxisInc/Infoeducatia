
<?php include 'header.php'; ?>
<?php
$id = $_POST["id"];
$cmd = $_POST["t1"];
$msg = $_POST["t2"];

if ($conn->connect_error)
{
	echo 'Eroare in conectarea la baza de date';
} else {

	
			
			$sql = "INSERT INTO commands (id, cmd, username, done) VALUES ('".$id."','".$cmd.$msg."','websitePanel','0')";
			

			if ($conn->query($sql) === TRUE) { 
			{
				echo 'Comanda a fost inregistrata. ';//recorded to db
				
			}
			} else {
				echo "Comanda nu s-a putut inregistra.";
				
			}
			$conn->close();
			
		
			
		

		}
		
?>
