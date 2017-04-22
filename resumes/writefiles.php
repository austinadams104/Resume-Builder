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

$sql = "SELECT * FROM resumes where resume_name = $resumename";

$results = $conn->query($sql);

if($results->num_rows <= 0){
    createDbEntry($_SESSION['username'], $conn, $resume_name, $_SESSION['user_id']);
}
else if($results->num_rows == 1){
    
}


if (json_decode($json) != null) {
     $file = fopen("testfile.txt", "w");
     fwrite($file, $json);
     fclose($file);
} else{
  die("Some error occurred");
}

?>
