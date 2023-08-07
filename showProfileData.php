<?php
session_start();
include 'config.php';
$username = $_POST["username"];
$q= $connection->prepare("SELECT aboutMeText FROM aboutmetextpages WHERE username=?");
$q->execute([$username]);
$aboutMeText = $q->fetchColumn();
echo $aboutMeText;

echo '<pre>Session: ';
var_dump($_SESSION);
echo '</pre>';
exit();
?>