<?php 
	include '../includes/header2.php';
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
