<?php

	session_start();

	if(!isset($_SESSION['oi']))
	{
		echo '<script>window.location.href="index.php";</script>';
	}

	require_once("header.php");

	include_once("topBar.php");

?>

<br/><br/><br/>

<div class="row">

	<div class="col-md-12 text-center">

		<h4>You have already submitted your application. Please click <a href="includes/backend/submit.php">here</a> to download it.</h4>

	</div>

</div>