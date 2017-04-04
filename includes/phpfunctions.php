<?php
  function sanitize($conn, $query){
    return mysqli_real_escape_string($conn, $query);
  }

  function connectToDatabase(){
    $sqlUserName = "resumebu_wp604";
    $host = "localhost";
    $sqlPassword = "0,Fl455ph~W}";
    $dbName = "resumebu_userdata";
    $conn = new mysqli($host, $sqlUserName, $sqlPassword, $dbName);

    if ($conn->connect_error) {
      die("Error: Connection failed: " . $conn->connect_error);
    }
    return $conn;
  }

 ?>
