<?php 
include '/includes/header2.php';
?>
            <h1>HOME PAGE</h1>
            <ul>
                <h3>Start making your professional resume today!!!</h3>
                <p>- Sign up and make a profile</p>
                <p>- Pick a template that fits your style</p>
                <p>- Enter you information guided by IRB</p>
                <p>- Save or Print your new resume!</p>

               <!-- <form action="profile.html">
                    <li type="submit">Go To Profile</li>
                </form>-->
            </ul>
		<form action="sphider/search.php" method="get">
			<input type="text" name="query" id="query" size="40" value="" action="include/js_suggest/suggest.php" columns="2" autocomplete="off" delay="1500">
			<input type="submit" value="Search">
			<input type="hidden" name="search" value="1">
		</form>
<?php 
include '/includes/footer.php';
?>
