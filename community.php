<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("Location: http://interactive-resume-builder.net/login.php");
	}
	include './includes/header2.php';
?>
	<h1 style="text-align:center;">Community Page</h1>
<?php
	include './includes/footer.php';
?>
