<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("Location: http://interactive-resume-builder.net/login.php");
	}
	include './includes/header2.php';
?>
	<h1>Your resumes will show up here</h1>
	<div>
		<p>You will be able to see your documents presented very nicely for you here</p>
	</div>
	<button>Create new Document</button>
<?php
include './includes/footer.php';
?>