<?php

//$updateFreeBooks="UPDATE books SET free=free-1 WHERE bookID = '".$bookID."'";

include './bd/bd.php';

//header("Content-Type:application/json");

if ($conn->connect_error)

{

	//

} else {

	$devID = $_GET['t1'];

	$location = $_GET['t2'];

	

	

	if(!empty($devID))
	{

			

			$sql = "UPDATE devices SET lastlocation='".$location."' WHERE id = '".$devID."'";

			//de adaugat aici INSERT INTO REPORTS that deviID has been changed

			



					if ($conn->query($sql) === TRUE) 
						{

							echo '406';//recorded to db

				

						}

						 else {

								echo "407"; // cannot be recorded to db

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