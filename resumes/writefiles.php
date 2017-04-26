<?php
session_start();
if(!isset($_SESSION['user_id'])){
  $_SESSION['message'] = "You are not logged in";
  header("Location: https://interactive-resume-builder.net/login.php");
}

require '../includes/phpfunctions.php';
require 'createresume.php';

$conn = connectToDatabase();

$json = $_POST['json'];
$resume_name = $_POST['resumename'];


if (json_decode($json) != null) {
     $file = fopen("$resume_name.json", "w");
     fwrite($file, $json);
     fclose($file);
} else{
  die("Some error occurred");
}

?>
