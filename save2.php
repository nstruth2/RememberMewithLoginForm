<?php
	include 'database.php';
	error_reporting(E_ALL);
    ini_set('display_errors', 1);
	$name=trim($_POST['name']);
	$email=trim($_POST['email']);
$SQLStatement = $con->prepare("INSERT INTO `crud`( `name`, `email`) VALUES (?,?)");
$SQLStatement->bind_param("ss", $name, $email);

$rc = $SQLStatement->execute();

    if (true===$rc) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
      //connection closed.

?>