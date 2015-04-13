<?php

	session_start();

	if(isset($_SESSION['oi']))
	{
		echo '<script>window.location.href="personalDetails.php";</script>';
	}

	require_once("header.php");

	include_once("topBar.php");

	include_once('initialTabs.php');
?>


<div class="row">

	<div class="col-md-8 col-md-offset-2 text-center">

		<div class="jumbotron">
		    <p>Welcome to IIITD&M online Staff Recruitment portal<!-- .Kindly go through the <a href="instructions.php">instructions</a> before filling in the forms.</p> -->
		</div>

	</div>

</div>

<br/><br/><br/><br/><br/>
<br/><br/><br/>

<?php


	include_once('footer.php');

?>

