<?php
include 'config.php';
$username = $_POST["username"];
$q = $connection->prepare("SELECT aboutMeText FROM `aboutmetextpages` WHERE username=?");
$q->bindValue(1, $username, PDO::PARAM_INT);
$q->execute();
$aboutMeText = $q->fetchColumn();
echo $aboutMeText;
?>