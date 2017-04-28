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
	<button><a href="http://interactive-resume-builder.net/IRBObjects/CreateResume.html">Create new Document</a></button><br><br>

	<div id="shared">

	</div>
	<div id="form">
	</div>
	<script>
	var xmlhttp;
	var resume_id;

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

			//shows shared resumes
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				document.getElementById("shared").innerHTML = this.responseText;
			};
			xmlhttp.open('GET', './resumes/getsharedresumes.php', true);
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
	function askShareResume(resumeID){
		document.getElementById("form").innerHTML = '<form action="./resumes/shareresume.php" method="post">' +
		'Type the username of the person you would like to share it with:<br>' +
		'<input type="text" id="username" name="username"><br>' +
		'<input type="hidden" id="resumeID" name="resume_id" value="' + resumeID + '" />' +
		'<input type="submit" value="Share"><br><br>' +
		'</form>';
	}

	</script>
<?php
include './includes/footer.php';
?>
