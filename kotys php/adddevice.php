<?php include 'header.php';  ?>

<h1>Register new device</h1>
<form role="form" action="adddevicetodb.php" method="post">
 <div class="form-group" width="30">
    <label for="user">DeviceID:</label>
    <input type="user" class="form-control" id="user" name="id">
  </div>
  <div class="form-group" width="30">
    <label for="user">Device name:</label>
    <input type="user" class="form-control" id="user" name="name">
  </div>
  
   <label for="sel1">Active:</label>
      <select class="form-control" id="sel1" name="active">
        <option value="1">Yes</option>
        <option value="0">No</option>
    
      </select>
  
  <br>
    <label for="sel1">Type:</label>
      <select class="form-control" id="sel1" name="type">
        <option value="Android">Android</option>
        <option value="PC">PC</option>
    
      </select>
     
<br>
  <br>
  </div>
  <button type="submit" class="btn btn-default">Add device</button>
</form>
