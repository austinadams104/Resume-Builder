<?php 
	include '../includes/header.php';
	$conn = connectToDatabase();
	if(isset($_GET["code"])&&isset($_GET["username"])){
		$sql = "SELECT * FROM `user_accounts` WHERE  `email_code` = " . $_GET["code"] . ";";
		$results = $conn->query($sql);
		if($results->num_rows == 0){
			echo "Invalid link";
    }
	} else{
		echo "Error";
	}
?>
  <form action="changepassword1.php" method="post">
    Username:<br>
    <input type="text" name="username"><br>
    Password:<br>
    <input type="password" name="newPassword"><br>
    Confirm Password:<br>
    <input type="password" name="confirmPassword"><br>
    <input type="submit">
  </form>
<?php 
	include '../includes/footer.php';
?>
