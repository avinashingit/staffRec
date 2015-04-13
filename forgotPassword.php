<?php

	session_start();

	function removeUnwanted($string)
	{
		$string=trim($string);
		$string=stripcslashes($string);
		
		if (get_magic_quotes_gpc()) 
		{
	  		$string = stripslashes($string);
		}
		$string = mysql_real_escape_string($string);
		$string=addslashes($string);
		return $string;
	}

	if(isset($_SESSION['oi']))
	{
		echo '<script>window.location.href="personalDetails.php";</script>';
	}

	require_once("header.php");

	include_once("topBar.php");

	include_once('initialTabs.php');
?>
<?php

	if(!isset($_GET['token']))
	{
		echo '<div class="row">

			<div class="col-md-4 col-md-offset-4 text-center">

				<form id="FPForm">

					<div class="form-group">

						<label class="control-label col-md-3">Your email</label>

						<div class="col-md-9">

							<input id="emailFP" class="form-control" type="text">

						</div>

					</div>

					<br/><br/>

					<div class="form-group">

						<label class="control-label col-md-3">Your username</label>

						<div class="col-md-9">

							<input id="usernameFP" class="form-control" type="text">

						</div>

					</div>

					<br/>

					<button class="btn btn-danger btn-md" onclick="sendLink(event)">Send link</button>

				</form>

			</div>

		</div>';
	}
	else
	{
		$token=removeUnwanted($_GET['token']);	
	}
?>



