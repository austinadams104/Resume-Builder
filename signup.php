<?php
  function isUser($user, $conn){
    $sql = "SELECT user_id FROM user_accounts WHERE username='" . $user . "';";
    $results = $conn->query($sql);
    if($results->num_rows == 0){
      return false;
      } else{
      return true;
    }
  }
  function emailExists($email, $conn){
    $sql = "SELECT user_id FROM user_accounts WHERE email='" . $email . "';";
    $results = $conn->query($sql);
    if($results->num_rows == 0){
      return false;
      } else{
      return true;
    }
  }

  $sqlUserName = "resumebu_wp604";
  $host = "localhost";
  $sqlPassword = "0,Fl455ph~W}";
  $dbName = "resumebu_userdata";
  $username = $_POST["username"];
  $password = $_POST["newPassword"];
  $confirmPassword = $_POST["confirmPassword"];
  $firstName = $_POST["firstname"];
  $lastName = $_POST["lastname"];
  $email = $_POST["email"];
  $error = "";

  if($password != $confirmPassword){
	   exit("Passwords don't match");
  }
  else if(strlen($password) < 6){
    exit("Password is too short");
  }
  else if(!preg_match("#[0-9]+#", $password)){
    exit("Password must contain a number");
  }
  else if(!preg_match("#[a-z]+#", $password) || !preg_match("#[A-Z]+#", $password)){
    exit("Password must conain a mix of upper and lowercase letters");
  }

  $conn = new mysqli($host, $sqlUserName, $sqlPassword, $dbName);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if(isUser($username, $conn)){
	   exit("Username already exists");
  } else if(emailExists($email, $conn)){
	   exit("Email already exists");
  }

  $sql = "INSERT INTO user_accounts( username, PASSWORD , first_name, last_name,
    email ) VALUES ('" . $username . "',  '" . md5($password) . "',  '" . $firstName
     . "',  '" . $lastName . "', '" . $email . "');";

  if($conn->query($sql)){
    header("Location: http://interactive-resume-builder.net/projects.html");
  }else{
    echo "Error: " . $conn->error . "<br>";
  }

  $conn->close();
 ?>
