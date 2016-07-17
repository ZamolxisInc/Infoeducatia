<?php

include './bd/bd.php';

if ($conn->connect_error)

{

	//

} else {

	

	$uss = $_GET['t1'];

	$psw = $_GET['t2'];

	

	if(!empty($uss))

		{	

			$sql = "SELECT COUNT(*) AS ct FROM users WHERE username = '".$uss."' AND password = '".md5($psw)."'";

			$result = $conn->query($sql);



					while($row = $result->fetch_assoc())

						{

						$n = $row["ct"];

						echo $n;

						}	

				

				$conn->close();		

		}

		else

			{

	

				echo '0';//NULL QUERY

				$conn->close();

			}



		}

		

	

?>