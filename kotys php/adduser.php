<?php include 'header.php';  ?>

<h1>Register new user</h1>
<form role="form" action="addusertodb.php" method="post">
 <div class="form-group" width="30">
    <label for="user">Username:</label>
    <input type="user" class="form-control" id="user" name="user">
  </div>
  <div class="form-group" width="30">
    <label for="user">FirstName</label>
    <input type="user" class="form-control" id="user" name="fname">
  </div>
    <div class="form-group" width="30">
    <label for="user">lastName</label>
    <input type="user" class="form-control" id="user" name="lname">
  </div>
    <div class="form-group" width="30">
    <label for="user">password</label>
    <input type="password" class="form-control" id="user" name="pass">
  </div>
  <div class="form-group">
     

  
  </div>
  <button type="submit" class="btn btn-default">Add user</button>
</form>
