<?php error_reporting(0); ?>

<?php

$servername = "localhost";

$username = "zamolxis_api";

$password = "zamolxis2012";

$dbname = "zamolxis_kotys";



// Create connection

$conn = new mysqli($servername, $username, $password,$dbname);



// Check connection

if ($conn->connect_error) {

	

	$date = date('m/d/Y h:i:s a', time());

	$theerr = $conn->connect_error;

	$logData =  $_SERVER['REMOTE_ADDR']."~". $date ."~  ". $theerr;

	$document=$_SERVER['DOCUMENT_ROOT'];

	$fp=fopen("log.txt","ab");

	fwrite($fp,$logData);

	fclose($fp);

	echo '666';

} 

?>