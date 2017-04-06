<?php

  require '../includes/phpfunctions.php';

  $user = $_POST["username"];
  $pass = $_POST["password"];

  $sqlUserName = "resumebu_wp604";
  $host = "localhost";
  $sqlPassword = "0,Fl455ph~W}";
  $dbName = "resumebu_userdata";

  $conn = new mysqli($host, $sqlUserName, $sqlPassword, $dbName);

	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM user_accounts WHERE PASSWORD='" . md5($pass) . "' AND username='" . sanitize($conn, $user) . "';";
  $results = $conn->query($sql);

  if($results->num_rows <= 0){
      echo "You have not logged in successfully<br>";
  }

  header("Location: http://interactive-resume-builder.net/projects.html");

  $conn->close();
   ?>
