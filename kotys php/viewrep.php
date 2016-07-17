<?php include 'header.php'; ?>



<?php

$id = $_GET["id"];

echo '<h1>All reports for device: '.$id.'</h1>';

if ($conn->connect_error)

{

	echo 'Eroare in conectarea la baza de date';

} else {



	

			
			

			

			

			$sql = "SELECT * FROM reports WHERE id = '".$id."' ORDER BY repID DESC";

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

		<th>More</th>

        

		

	

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

					echo '<tr><td>'.$row["id"].'</td><td>'.$row["info"].'</td><td>'.$row["date"].'</td><td>'.$row["time"].'</td><td><a href="singlereport.php?repID='.$row["repID"].'">More</a></td></tr>';

				

				

				}

			echo ' </tbody>

  </table>';

			}

			else {

				echo "<h2>No reports</h2>";

			}

			$conn->close();

			

		

			

		



		}

		

?>