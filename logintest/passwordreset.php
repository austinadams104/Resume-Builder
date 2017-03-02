<?php
	$message = "Hello,\n\nHere is the link to reset your password.\nhttp://www.interactive-resume-builder.net/passwordtesting/changepassword.html\n\n\nThe IRB team";
	$email = "";
$sqlUserName = "resumebu_wp604";
  $host = "localhost";
  $sqlPassword = "0,Fl455ph~W}";
  $dbName = "resumebu_userdata";

  $conn = new mysqli($host, $sqlUserName, $sqlPassword, $dbName);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT email FROM user_accounts WHERE username = 'testuser';";
  $result = $conn->query($sql);

	
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	  $email = $row["email"]; 
    }
} else {
    echo "No email found";
}

mail($email, "Forgot Password reset link", $message, "From: admin@interactive-resume-builder.net");  
	echo "Your email has been sent successfully to " . $email . "<br>";
?>
