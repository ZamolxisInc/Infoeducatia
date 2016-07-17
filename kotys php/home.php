<?php include 'header.php'; ?>
<?php
$username = $_POST["user"];
$password = $_POST["pwd"];
if ($conn->connect_error)
{
	echo 'Eroare in conectarea la baza de date';
} else {

	
			
			
			
			$sql = "SELECT * FROM users WHERE username = '".$username."' AND password = '".md5($password)."'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) 
			{
				
			echo 'Welcome, '.$username.'</h1>
			 <ul class="pagination">
  <li><a href="/machines/">Home</a></li>
  <li><a href="alldev.php">Devices</a></li>
  <li><a href="">Users</a></li>
 
</ul>
			
			';
				
				
			}
			else {
				echo "<h2>Wrong username or password.</h2>";
			}
			$conn->close();
			
		
			
		

		}
		
?>