<?php include 'header.php'; ?>

<br>

<h1>Search by date (dd-mm-yyyy)</h1>

<form action="allreportsbydate.php" method="get">

<div class="form-group">

  <input type="text" class="form-control" id="t1" name="t1">

</div>

<input type="submit" value="Search">

</form>



<h1>All reports</h1>

<?php

if ($conn->connect_error)

{

	echo 'Eroare in conectarea la baza de date';

} else {



	

			

			

			

			$sql = "SELECT * FROM reports ORDER BY repID DESC";

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

		

?>