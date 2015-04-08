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

	<div class="col-md-6 col-md-offset-3">

		<form method="post" class="form-horizontal" id="registerForm">

			<fieldset>

				<div class="form-group">

					<label for="inputName" class="col-lg-3 control-label">Name</label>

		            <div class="col-lg-5">

		                <input class="form-control" id="inputName" placeholder="Full name" type="text" name="registerName">

		            </div>

				</div>

				<br/>

				<div class="form-group">

					<label for="inputEmail" class="col-lg-3 control-label">Email</label>

		            <div class="col-lg-5">

		                <input class="form-control" id="inputEmail" placeholder="Email" type="text" name="registerEmail" onblur="checkIfEmailExists(this);">

		            </div>

		            <div class="col-lg-4">

						<p class="emailMessage"></p>

		            </div>

				</div>

				<br/>

				<!-- <div class="form-group">
				
					<label for="inputPhone" class="col-lg-3 control-label">Phone</label>
				
						            <div class="col-lg-9">
				
						                <input class="form-control" id="inputPhone" placeholder="Phone" type="text" name="registerPhone">
				
						            </div>
				
				</div>
				
				<br/> -->

				<div class="form-group">

					<label for="inputUsername" class="col-lg-3 control-label">Username</label>

		            <div class="col-lg-5">

		                <input class="form-control" id="inputUsername" placeholder="Username" type="text" name="loginUsername" onblur="checkIfUsernameExists(this);">

		            </div>

		            <div class="col-lg-4">

						<p class="usernameMessage"></p>

		            </div>

				</div>

				<br/>

				<div class="form-group">

					<label for="inputPassword" class="col-lg-3 control-label">Password</label>

		            <div class="col-lg-5">

		                <input class="form-control" id="inputPassword" placeholder="Password" type="password" name="inputPassword">

		            </div>

				</div>

				<br/>

				<div class="form-group">

					<label for="inputPasswordAgain" class="col-lg-3 control-label">Password again</label>

		            <div class="col-lg-5">

		                <input class="form-control" id="inputPasswordAgain" placeholder="Password" type="password" name="inputPasswordAgain">

		            </div>

				</div>

				<br/>

				<div class="form-group text-center">

		            <div class="col-lg-10 col-lg-offset-2">

		                <button class="btn btn-material-blue-grey" name="registerSubmit" id="registerButton" onclick="register(event);">Register</button>
		           
		            </div>
		        
		        </div>

			</fieldset>

		</form>

	</div>

</div>


<?php

	include_once("footer.php");
	
?>
