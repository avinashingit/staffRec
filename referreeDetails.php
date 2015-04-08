<?php
	
	session_start();

	if(!isset($_SESSION['oi']))
	{
		echo '<script>window.location.href="index.php";</script>';
	}

	require_once("header.php");

	include_once("topBar.php");

	include_once('formTabs.php');

?>

<div class="row">

	<div class="col-md-6 col-md-offset-3 text-center">

		<form method="post"class="form-horizontal" id="refereeDetailsForm">

			<fieldset>

				<h4 class="text-center">Referee 1</h4>

				<br/>

				<div class="form-group">

					<label for="referee1Name" class="col-lg-3 text-right">Name</label>

					<div class="col-lg-9">

						<input class="form-control col-md=6" name="referee1name" type="text" id="referee1name">

					</div>

				</div>

				<div class="form-group">

					<label for="referee1Designation" class="col-lg-3 text-right">Designation</label>

					<div class="col-lg-9">

						<input class="form-control" name="referee1Designation" type="text" id="referee1Designation">

					</div>

				</div>

				<div class="form-group">

					<label for="referee1Address" class="col-lg-3 text-right">Address</label>

					<div class="col-lg-9">

						<input class="form-control" name="referee1Address" type="text" id="referee1Address">

					</div>

				</div>

				<div class="form-group">

					<label for="referee1Email" class="col-lg-3 text-right">Email</label>

					<div class="col-lg-9">

						<input class="form-control" name="referee1Email" type="text" id="referee1Email">

					</div>

				</div>

				<div class="form-group">

					<label for="referee1Phone" class="col-lg-3 text-right">Phone</label>

					<div class="col-lg-9">

						<input class="form-control" name="referee1Phone" type="text" id="referee1Phone">

					</div>

				</div>

				<br/>

				<h4 class="text-center">Referee 2</h4>

				<br/>

				<div class="form-group">

					<label for="referee1Name" class="col-lg-3 text-right">Name</label>

					<div class="col-lg-9">

						<input class="form-control" name="referee2name" type="text" id="referee2name">

					</div>

				</div>

				<div class="form-group">

					<label for="referee1Designation" class="col-lg-3 text-right">Designation</label>

					<div class="col-lg-9">

						<input class="form-control" name="referee2Designation" type="text" id="referee2Designation">

					</div>

				</div>

				<div class="form-group">

					<label for="referee1Address" class="col-lg-3 text-right">Address</label>

					<div class="col-lg-9">

						<input class="form-control" name="referee2Address" type="text" id="referee2Address">

					</div>

				</div>

				<div class="form-group">

					<label for="referee1Email" class="col-lg-3 text-right">Email</label>

					<div class="col-lg-9">

						<input class="form-control" name="referee2Email" type="text" id="referee2Email">

					</div>

				</div>

				<div class="form-group">

					<label for="referee1Phone" class="col-lg-3 text-right">Phone</label>

					<div class="col-lg-9">

						<input class="form-control" name="referee2Phone" type="text" id="referee2Phone">

					</div>

				</div>

				<br/>

				<h4 class="text-center">Referee 3</h4>

				<div class="form-group">

					<label for="referee1Name" class="col-lg-3 text-right">Name</label>

					<div class="col-lg-9">

						<input class="form-control" name="referee3name" type="text" id="referee3name">

					</div>

				</div>

				<div class="form-group">

					<label for="referee1Designation" class="col-lg-3 text-right">Designation</label>

					<div class="col-lg-9">

						<input class="form-control" name="referee3Designation" type="text" id="referee3Designation">

					</div>

				</div>

				<div class="form-group">

					<label for="referee1Address" class="col-lg-3 text-right">Address</label>

					<div class="col-lg-9">

						<input class="form-control" name="referee3Address" type="text" id="referee3Address">

					</div>

				</div>

				<div class="form-group">

					<label for="referee1Email" class="col-lg-3 text-right">Email</label>

					<div class="col-lg-9">

						<input class="form-control" name="referee3Email" type="text" id="referee3Email">

					</div>

				</div>

				<div class="form-group">

					<label for="referee1Phone" class="col-lg-3 text-right">Phone</label>

					<div class="col-lg-9">

						<input class="form-control" name="referee43hone" type="text" id="referee3Phone">

					</div>

				</div>


			</fieldset>

		</form>

		<button class="btn btn-md btn-primary" onclick='insertRefereeDetails(event,0);'>Save</button><button class="btn btn-md btn-warning" onclick='insertRefereeDetails(event,1);'>Save & Next</button>

	</div>

</div>

<?php

	include_once("footer.php");

?>

<script>

$(document).ready(function(){
	fetchRefereeDetails();
});

</script>