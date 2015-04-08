<?php

	session_start();

	if(!isset($_SESSION['oi']))
	{
		echo '<script>window.location.href="index.php";</script>';
	}

	require_once("header.php");

	include_once("topBar.php");

	// include_once('formTabs.php');

?>

<a href="index.php"><button class="btn btn-warning">Back</button></a>

<div class="row">

	<div class="col-md-4 col-md-offset-4 text-center">

		<form class="form-horizontal" id="changePasswordForm">

			<fieldset>

				<div class="form-group">

					<label class="control-label col-md-5">Old password</label>

					<div class="col-lg-7">

						<input type="password" id="oldPassword" class="form-control">

					</div>

				</div>

				<div class="form-group">

					<label class="control-label col-md-5">New password</label>

					<div class="col-lg-7">

						<input type="password" id="newPassword" class="form-control">

					</div>

				</div>

				<div class="form-group">

					<label class="control-label col-md-5">New password again</label>

					<div class="col-lg-7">

						<input type="password" id="newPasswordAgain" class="form-control">

					</div>

				</div>

			</fieldset>

		</form>

		<button class="text-center btn btn-primary btn-md" onclick="changePassword(event);">Change password</button>

	</div>

</div>