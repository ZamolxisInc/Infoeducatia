<?php

//$updateFreeBooks="UPDATE books SET free=free-1 WHERE bookID = '".$bookID."'";

include './bd/bd.php';

//header("Content-Type:application/json");

if ($conn->connect_error)

{

	//

} else {

	

	$identity = $_GET['t1'];

	if(!empty($identity))

		{

			

			$sql = "UPDATE commands SET done='1' WHERE identity = '".$identity."'";

			//de adaugat aici INSERT INTO REPORTS that deviID has been changed

			



					if ($conn->query($sql) === TRUE) { 

						{

							echo '406';//recorded to db

				

						}

							} else {

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