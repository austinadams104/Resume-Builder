<?php
	session_start();
	include './includes/header.php';
	if(isset($_SESSION['message'])){
		echo $_SESSION['message'];
	}
?>
	<form action="login1.php" method="post">
	  Username:<br>
	  <input type="text" name="username"><br>
	  Password:<br>
	  <input type="password" name="password"><br>
	  <input type="submit" value="Login">
	</form>
	<br>
	<form action="signup.php">
		<input type="submit" value="Sign Up"/>
	</form>
	<form action="http://www.interactive-resume-builder.net/passwordtesting/forgotpassword.php">
		<input type="submit" value="Forgot Password"/>
	</form>
<?php
	include './includes/footer.php';
?>
