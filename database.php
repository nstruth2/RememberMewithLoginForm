<?php
	$servername = "localhost";
	$username = "";
	$password = "";
	$dbname="school";

$con = new mysqli($servername,$username,$password,$dbname);

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}
?>