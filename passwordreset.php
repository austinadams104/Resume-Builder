<?php

	require './PHPFunctions/phpfunctions.php';

	$message = "Hello,\n\n
							Here is the link to reset your password.\n
							http://www.interactive-resume-builder.net/passwordtesting/changepassword.php\n\n\n
							The IRB team";
	$email = "";

	$conn = connectToDatabase();

  $sql = "SELECT email FROM user_accounts WHERE username = 'nsneddon';";
  $result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	  $email = $row["email"];
    }
	} else {
    echo "No email found";
	}

	if(mail($email, "Forgot Password reset link", $message, "From: admin@interactive-resume-builder.net")){
		echo "Your email has been sent successfully to " . $email . "<br>";
	} else {
		echo "Failed to send message";
	}
?>
