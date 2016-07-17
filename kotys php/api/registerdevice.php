<?php

include './bd/bd.php';

if ($conn->connect_error)

{

	//

} else {

	

	$id = $_GET['t1'];

	$name = $_GET['t2'];

	$active = $_GET['t3'];

	$ip = $_GET['t4'];

	$lastseen = $_GET['t5'];

	$type = $_GET['t6'];

	$username = $_GET['t7'];

	

	if(!empty($id))

		{	

			$sql = "INSERT INTO devices (id,name,active,ip,lastseen,type,username) VALUES ('".$id."','".$name."','".$active."','".$ip."','".$lastseen."','".$type."','".$username."')";

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