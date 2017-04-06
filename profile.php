<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("Location: http://interactive-resume-builder.net/login.php");
	}
	include './includes/header2.php';
	include './includes/phpfunctions.php';
?>
    <h1>Hello <?php echo $_SESSION['first_name']; ?></h1><br>
    <h3><B>Please edit your user information below:</B></h3>
    <form method="POST" action="index.php">
	<br>
	<button><a href="./passwordtesting/changepassword.php">Change password</a></button>
    </form>
	<br>
<?php
	include './includes/footer.php';
?>
