<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("Location: http://interactive-resume-builder.net/login.php");
	}
	include './includes/header2.php';
?>
        <form action="sphider/search.php" method="get">
			  <input type="text" name="query" id="query" size="40" value="" action="include/js_suggest/suggest.php" columns="2" autocomplete="off" delay="1500">
		  	<input type="submit" value="Search">
		  	<input type="hidden" name="search" value="1">
	  	  </form>
        <br>
        <div>
          <h3> Pick a Catagory </h3>
          <select id= "tipCatagories">
            <option value="" disabled selected hidden>Please Choose...</option>
            <option value = "rules">Unbreakable Rules</option>
            <option value = "mistakes">Five major Mistakes to Avoid</option>
            <option value = "skills">Skills/Qualities Employers Look For</option>
            <option value = "attributes">Influence of Attribues</option>
            <option value = "formats">Resume Formats</option>
            <option value = "resumeContent">What goes on a Resume?</option>
            <option value = "success">Success Statements</option>
            <option value = "other">Other Helpful Tips</option>
          </select>
        </div>
      <br />
        <div id="results"></div>
        <br />
        <div id="resultsInfo"></div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>
          $("#tipCatagories").change(function(){
            $("#resultsInfo").load("tipsInfo.html #" + $('#tipCatagories').val());
          });

          $("#tipCatagories").change(function() {
            var id = $(this).children(":selected").attr("id");
            // if id matches category, print out that categories tips
          });
        </script>
<?php
	include './includes/footer.php';
?>
