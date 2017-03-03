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

  if($password != $confirmPassword){
	   exit("Passwords don't match");
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
    echo "Your new account has been created successfully<br>";
  }else{
    echo "Error: " . $conn->error . "<br>";
  }

  $conn->close();
 ?>
