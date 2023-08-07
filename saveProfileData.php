<?php
	include 'database.php';
	error_reporting(E_ALL);
    ini_set('display_errors', 1);
	$profilePageName=trim($_POST['profilePageName']);
	$aboutMeText=trim($_POST['aboutMeText']);
$SQLStatement = $con->prepare("INSERT INTO `aboutMeTextPages`( `profilePageName`, `aboutMeText`) VALUES (?,?)");
$SQLStatement->bind_param("ss", $profilePageName, $aboutMeText);

$rc = $SQLStatement->execute();

    if (true===$rc) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
      //connection closed.

?>