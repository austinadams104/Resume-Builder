<?php
  require './includes/phpfunctions.php';

  function isUser($user, $conn){
    $sql = "SELECT user_id FROM user_accounts WHERE username='" . sanitize($conn, $user) . "';";
    $results = $conn->query($sql);
    if($results->num_rows == 0){
      return false;
      } else{
      return true;
    }
  }
  function emailExists($email, $conn){
    $sql = "SELECT user_id FROM user_accounts WHERE email='" . sanitize($conn,  $email) . "';";
    $results = $conn->query($sql);
    if($results->num_rows == 0){
      return false;
      } else{
      return true;
    }
  }

  $conn = connectToDatabase();

  $username = $_POST["username"];
  $password = $_POST["newPassword"];
  $confirmPassword = $_POST["confirmPassword"];
  $firstName = $_POST["firstname"];
  $lastName = $_POST["lastname"];
  $email = $_POST["email"];

  if($password != $confirmPassword){
	   exit("Passwords don't match");
  }

  if(isUser($username, $conn)){
	   exit("Username already exists");
  } else if(emailExists($email, $conn)){
	   exit("Email already exists");
  }

  $sql = "INSERT INTO user_accounts( username, PASSWORD , first_name, last_name,
    email ) VALUES ('" . sanitize($conn, $username) . "',  '" . md5($password) . "',  '" . sanitize($conn, $firstName)
     . "',  '" . sanitize($conn, $lastName) . "', '" . sanitize($conn, $email) . "');";

  if($conn->query($sql)){
    header("Location: http://interactive-resume-builder.net/projects.php");
  }else{
    echo "Error: " . $conn->error . "<br>";
  }

  $conn->close();
 ?>
