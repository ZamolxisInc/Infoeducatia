<?php include 'header.php'; ?>

<?php
if ($conn->connect_error)
{
	echo 'Eroare in conectarea la baza de date';
} else {

	
	$date = $_GET['t1'];
	if(!empty($date))
		{
			
			
			
			$sql = "SELECT * FROM reports WHERE date = '".$date."' ORDER BY time DESC";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) 
			{
			echo '
	<table class="table table-condensed">
    <thead>
      <tr>
        <th>id</th>
		<th>info</th>
        <th>date</th>
		<th>time</th>
        <th>more</th>
	
      </tr>
    </thead>
    <tbody>';
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo '<tr><td>'.$row["id"].'</td><td>'.$row["info"].'</td><td>'.$row["date"].'</td><td>'.$row["time"].'</td><td><a href="singlereport.php?repID='.$row["repID"].'">More</td></tr>';
				
				
				}
			echo ' </tbody>
  </table>';
			}
			else {
				echo "<h2>Fara rezultate</h2>";
			}
			$conn->close();
			
		}
			
		

		}
		
?>