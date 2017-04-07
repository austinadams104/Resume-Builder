<?php
	include('../includes/header.php');
	require('../includes/phpfunctions.php');
?>

<?php

  function changePassword($user, $pword, $conn){
    $sql = "UPDATE user_accounts SET password='" . md5($pword) .
      "' WHERE username = '" . sanitize($conn, $user) . "';";
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully<br>";
		$sql = "UPDATE user_accounts SET email_code='0' WHERE username = '" . sanitize($conn, $user) . "';";
				if($conn->query($sql) === FALSE){
					echo "ERROR: " . $conn->error;
				}
	} else {
	    echo "Error updating record: " . $conn->error;
	}
}

  function isUser($user, $conn){
    $sql = "SELECT user_id FROM user_accounts WHERE username='" . sanitize($conn, $user) . "';";
    $results = $conn->query($sql);
	$row = $results->fetch_assoc();
    if($results->num_rows == 0){
    	return false;
    	} else{
    	return true;
    }
  }

  $password = $_POST["newPassword"];
  $confirm = $_POST["confirmPassword"];
  $username = $_POST["username"];

  $conn = connectToDatabase();

  if(isUser($username, $conn)){
    if($password === $confirm){
      changePassword($username, $password, $conn);
      echo "Password was reset";
    }
    else{
      echo "Passwords did not match";
    }
  }
  else{
    echo "Wrong username";
  }

  $conn->close();
?>

<?php
	include('../includes/footer.php');
?>
