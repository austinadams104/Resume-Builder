<?php
session_start();
if(!isset($_SESSION['user_id'])){
  $_SESSION['message'] = "You are not logged in";
  header("Location: https://interactive-resume-builder.net/login.php");
}

require '../includes/phpfunctions.php';
require 'createresume.php';

$conn = connectToDatabase();

$json = $_GET['json'];
$resume_name = $_GET['resumename'];

$randomCode = md5($_SESSION["username"] + microtime());


if (json_decode($json) != null) {
     $file = fopen("$randomCode.json", "w");
     fwrite($file, $json);
     fclose($file);
     createDbEntry($_SESSION["username"], $conn, $resume_name, $_SESSION["user_id"], $randomCode);
} else{
  die("Some error occurred");
}

?>
