<?php
session_start();
include 'config.php';
$username = $_SESSION["username"];
$stmt = $con->prepare('SELECT aboutMeText FROM aboutmetextpages WHERE username = ?');
$stmt->execute([$username]);
$data = $stmt->fetch();
echo  echo '<pre>'; print_r($data); echo '</pre>';
?>