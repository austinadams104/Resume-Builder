<?php
	include '../PHPFunctions/phpfunctions.php';

	$email = $_POST["email_address"];

	$message = "";
	$username = "";
	$conn = connectToDatabase();

  $sql = "SELECT username, email, email_code FROM user_accounts WHERE email = '" . $email . "';";
  $result = $conn->query($sql);
	if ($result->num_rows == 1) {
    // output data of each row
		$row = $result->fetch_assoc();
		$username = $row["username"];
		$randomNumber = md5($username + microtime());
		$sql = "UPDATE user_accounts SET email_code = " . $randomNumber . " WHERE username = '" . $username . "';";
		if ($conn->query($sql) === TRUE) {
 		   echo "Record updated successfully";
		} else {
   		 echo "Error updating record: " . $conn->error;
		}
		$message = "Hello,\n\nHere is the link to reset your password.\nhttp://www.interactive-resume-builder.net/passwordtesting/changepassword.php?username=" . $username . "&code=" . $randomNumber . "\n\n\nThe IRB team";
		if(mail($email, "Forgot Password reset link", $message, "From: admin@interactive-resume-builder.net")){
			echo "Your email has been sent successfully to " . $email . "<br>";
		} else {
			echo "Failed to send message";
		}
	} else if ($result->num_rows == 0){
    echo "No email found";
	}	else {
		echo "DATABASE error. More than one of the same emails found.";
	}
?>
