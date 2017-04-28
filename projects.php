<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
		$_SESSION['message'] = "You are not logged in";
		header("Location: http://interactive-resume-builder.net/login.php");
	}
	include './includes/header2.php';
?>
	<h1>Your resumes will show up here</h1>
	<div>
		<p>You will be able to see your documents presented very nicely for you here</p>
	</div>
	<br>
	<div id="resumes">
	</div>
	<button><a href="http://interactive-resume-builder.net/IRBObjects/CreateResume.html">Create new Document</a></button>
	<script>
	var xmlhttp;
	function refresh(){
	 xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
							document.getElementById("resumes").innerHTML = this.responseText;
							console.log(this.responseText);
							console.log("This went through");
					}else{
							//console.log("you suck");
					}
			};
			xmlhttp.open('GET', './resumes/getresumes.php', true);
			xmlhttp.send();
	}
	refresh();
	function removeResume(resumeID){
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
						//document.getElementById("resumes").innerHTML = this.responseText;
						console.log(this.responseText);
						console.log("This went through");
				}else{
				}
		};
		xmlhttp.open('GET', './resumes/removeresume.php?id=' + resumeID, true);
		xmlhttp.send();
		refresh();
	}
	</script>
<?php
include './includes/footer.php';
?>
