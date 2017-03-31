<?php 
	include './includes/header.php';
?>
	<div>
	  <form action="signup1.php" method="post">
		  First Name<br>
		  <input type="text" name="firstname"><br>
		  Last Name<br>
		  <input type="text" name="lastname"><br>
		  Email<br>
		  <input type="email" name="email"><br>
		  Username:<br>
		  <input type="text" name="username"><br>
		  Password:<br>
		  <input type="password" name="newPassword"><br>
		  Confirm Password:<br>
		  <input type="password" name="confirmPassword"><br>
		  <input type="submit">
	  </form>
	</div>
<?php 
include './includes/footer.php';
?>