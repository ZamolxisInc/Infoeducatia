<?php

include './bd/bd.php';

if ($conn->connect_error)

{

	//

} else {

	

	$id = $_GET['t1'];

	$info = $_GET['t2'];

	$date = $_GET['t3'];

	$time = $_GET['t4'];

	

	

	if(!empty($id))

		{	

			$sql = "INSERT INTO reports (id,info,date,time) VALUES ('".$id."','".$info."','".$date."','".$time."')";

			if ($conn->query($sql) === TRUE) { 

			{

				echo '406';//recorded to db

				

			}

			} else {

				echo "407";

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