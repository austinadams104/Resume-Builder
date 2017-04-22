<?php
session_start();
if(!isset($_SESSION['user_id'])){
  $_SESSION['message'] = "You are not logged in";
  header("Location: http://interactive-resume-builder.net/login.php");
}
  require '../includes/phpfunctions.php';

  $conn = connectToDatabase();

  $randomCode = md5($_SESSION['username'] + microtime());
  $resume_name = "test"; //this is something that will somehow need to be passed in


  $sql = "INSERT INTO resumes(resume_name, file_path) VALUES ('" . $resume_name . "', '" . $randomCode . ".js');";
	echo $sql . "<br>";

  $resume_id = 0;
  if ($conn->query($sql) === TRUE) {
    $resume_id = $conn->insert_id;
  } else {
    die("Error: " . $conn->error);
  }

  $sql = "INSERT INTO permissions(user_id, permission, resume_id) VALUES (" . $_SESSION[user_id] . ", 1, " . $resume_id . ");";
  //We'll have to decide what permissions we should use
  if ($conn->query($sql) === FALSE) {
    die("Error: " . $conn->error);
  } else{
    echo "Record successfully inserted<br>Test it out<br>";
  }
 ?>
