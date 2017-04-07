<?php
session_start();
if(isset($_SESSION['user_id'])){
  header("Location: http://interactive-resume-builder.net/projects.php");
}
include './includes/header.php';
?>
<div class="container">
    			<br>
			<h1>HOME PAGE</h1>
				<h3>Start making your professional resume today!!!</h3>
				<p>- Sign up and make a profile</p>
				<p>- Pick a template that fits your style</p>
				<p>- Enter you information guided by IRB</p>
				<p>- Save or Print your new resume!</p>
</div>
<?php

include './includes/footer.php';
?>
