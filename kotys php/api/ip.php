<?php
include './bd/bd.php';
header("Content-Type:application/json");
if ($conn->connect_error)
{
} else {
	$devID = $_GET['t1'];
	if(!empty($devID))

		{

			//select query

			

			

			

			$sql = "SELECT ip FROM devices WHERE id = '".$devID."'";

			$result = $conn->query($sql);



			if ($result->num_rows > 0) 

			{

				// output data of each row

				while($row = $result->fetch_assoc()) {

				echo $row["ip"];

			}

			} else {

				echo "402";

			}

			$conn->close();

			

		

			

		}

		else

			{

	

				echo '403';//NULL QUERY

				$conn->close();

			}



		}

		



?>