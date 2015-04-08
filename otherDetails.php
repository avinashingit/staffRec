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

		<form method="post" class="form-horizontal" id="otherDetailsForm">

			<fieldset>

				<div class="form-group">

					<label for="presentEmployment" class="text-right col-lg-5">Present employment</label>

					<div class="col-lg-7">

						<input class="form-control" type="text" name="presentEmployment" id="presentEmployment">

					</div>

				</div>

				<div class="form-group">

					<label for="natureOfWork" class="text-right col-lg-5">Nature of work</label>

					<div class="col-lg-7">

						<input class="form-control" type="text" name="natureOfWork" id="natureOfWork">

					</div>

				</div>

				<div class="form-group">

					<label for="timeRequired" class="text-right col-lg-5">Time required to join, if offered the post</label>

					<div class="col-lg-7">

						<input class="form-control" type="text" name="timeRequired" id="timeRequired">

					</div>

				</div>

				<div class="form-group">

					<label for="presentEmployment" class="text-right col-lg-5">Mention why do you want to join IIITDM?</label>

					<div class="col-lg-7">

						<input class="form-control" type="file" name="fileSOP" id="fileSOP">

						<p class="hidden" id="uploadedSOP">You already uploaded. Uploading again will rewrite the previous one.</p>

					</div>

				</div>

			</fieldset>

		</form>

		<br/>

		<button class="btn btn-primary btn-md" onclick="insertOtherDetails(event,0);">Save</button><button class="btn btn-warning btn-md" onclick="insertOtherDetails(event,1);">Save & Next</button>

	</div>

</div>


<?php

	include_once("footer.php");

?>

<script>

$(document).ready(function(){
	fetchOtherDetails();
});


</script>