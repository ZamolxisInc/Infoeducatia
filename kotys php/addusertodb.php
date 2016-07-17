
<?php include 'header.php'; ?>
<?php
$user = $_POST["user"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$pass = $_POST["pass"];

if ($conn->connect_error)
{
	echo 'Eroare in conectarea la baza de date';
} else {

	
			
			$sql = "INSERT INTO users (username, password, name, lname, rank) VALUES ('".$user."', '".md5($pass)."','".$fname."', '".$lname."','3')";
			

			if ($conn->query($sql) === TRUE) { 
			{
				echo 'User registered. ';//recorded to db
				
			}
			} else {
				echo "Couldn't be registered.";
				
			}
			$conn->close();
			
		
			
		

		}
		
?>
