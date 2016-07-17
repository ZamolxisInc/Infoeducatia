<?php include 'header.php'; ?>

<?php
//$updateFreeBooks="UPDATE books SET free=free-1 WHERE bookID = '".$bookID."'";
include '/bd.php';
//header("Content-Type:application/json");
if ($conn->connect_error)
{
	//
} else {
	$devID = $_GET['t1'];
	$active = $_GET['t2'];
	if(!empty($devID) && !empty($active))
		{
			$newActive = "1";
			if($active == "1")
			{
				$newActive="0";
			}
			$sql = "UPDATE devices SET active='".$newActive."' WHERE id = '".$devID."'";
			//de adaugat aici INSERT INTO REPORTS that deviID has been changed
			

					if ($conn->query($sql) === TRUE) { 
						{
							echo 'Updated';//recorded to db
				
						}
							} else {
								echo "Unsuccesfull"; // cannot be recorded to db
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