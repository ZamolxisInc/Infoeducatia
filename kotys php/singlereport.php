<?php include 'header.php'; ?>

<?php
$id = $_GET["repID"];
if ($conn->connect_error)
{
	echo 'Eroare in conectarea la baza de date';
} else {

	
			
			
			
			$sql = "SELECT reports.id, reports.info, reports.date, reports.time, 
reports.repID, singlereports.repId, singlereports.Info1, 
singlereports.Info2, singlereports.Info3
FROM singlereports 
INNER JOIN reports 
ON singlereports.repId = reports.repID
WHERE singlereports.repId = '".$id."'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) 
			{
			echo '
	<table class="table table-condensed">
    <thead>
      <tr>
	  <th>deviceID</th>
        <th>infoOrg</th>
        <th>date</th>
		<th>time</th>
		<th>reportId</th>
		<th>Info1</th>
		<th>Info2</th>
		<th>Info3</th>
        
		
	
      </tr>
    </thead>
    <tbody>';
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$doneNew = "No";
					if($row["done"] == "1")
					{
						$doneNew = "Yes";
					}
					echo '<tr><td>'.$row["id"].'</td><td>'.$row["info"].'</td><td>'.$row["date"].'</td><td>'.$row["time"].'</td><td>'.$row["repID"].'</td><td>'.$row["Info1"].'</td><td>'.$row["Info2"].'</td><td>'.$row["Info3"].'</td></tr>';
				
				
				}
			echo ' </tbody>
  </table>';
			}
			else {
				echo "<h2>No additional data</h2>";
			}
			$conn->close();
			
		
			
		

		}
		
?>