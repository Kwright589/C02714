<?php 
$servername = "localhost";
$password = "website";
$dbasename = "labwork";

// create connection 
$mysqli = new mysqli($servername, $username, $password, $dbasename);

// check connection 
if ($mysqli->connect_errno) {
	pritnf("Connect failed: %s\n", $mysqli ->connect_error);
	exit ();
}




?>
