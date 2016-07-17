<?php include 'header.php'; ?>

<?php
if ($conn->connect_error)
{
	echo 'Eroare in conectarea la baza de date';
} else {

	echo '<br><a href="addUser.php" class="btn btn-info" role="button">Add user</a>';

			
			
			
			$sql = "SELECT * FROM users";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) 
			{
			echo '
	<table class="table table-condensed">
    <thead>
      <tr>
        <th>username</th>
		<th>name</th>
        <th>lname</th>
		<th>Edit</th>
       
	
      </tr>
    </thead>
    <tbody>';
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo '<tr><td>'.$row["username"].'</td><td>'.$row["name"].'</td><td>'.$row["lname"].'</td><td><a href="editUser.php?user='.$row["username"].'">Edit<td></tr>';
				
				
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