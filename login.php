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

	<div class="col-md-4 col-md-offset-4">

		<form method="post"class="form-horizontal" id="loginForm">

			<fieldset>

				<div class="form-group">

					<label for="inputUsername" class="col-lg-3 control-label">Username</label>

		            <div class="col-lg-9">

		                <input class="form-control" id="inputUsername" placeholder="Username" type="text" name="loginUsername">

		            </div>

				</div>

				<br/>

				<div class="form-group">

					<label for="inputPassword" class="col-lg-3 control-label">Password</label>

		            <div class="col-lg-9">

		                <input class="form-control" id="inputPassword" placeholder="Password" type="password" name="loginPassword">

		            </div>

				</div>

				<br/>

				<div class="form-group text-center">

		            <div class="col-lg-10 col-lg-offset-2">

		                <button class="btn btn-material-brown" onclick="login(event);" name="loginSubmit">Login</button>
		           
		            </div>
		        
		        </div>

			</fieldset>

		</form>

	</div>

</div>

<br/><br/><br/><br/><br/>


<?php

	include_once("footer.php");

?>
