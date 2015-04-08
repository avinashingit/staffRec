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

	<div class="col-md-10 col-md-offset-1 text-center">

		<form method="post" id="experienceForm">

			<fieldset>

				<div class="text-center col-md-6 col-md-offset-3">

					<div class="form-group">

						<label class="control-label col-lg-5">Number of years of experience</label>

						<div class="col-lg-7">

							<input class="form-control" id="noYE" type="number">

						</div>

					</div>

					<br/>

				</div>

				<table class="table table-bordered table-striped">

					<tr style="font-weight:bold">

						<td>Organization</td>

						<td>Designation</td>

						<td>From</td>

						<td>To</td>

						<td>Scale+Grade pay/Total pay (per month) last drawn</td>

						<td>Nature of work</td>

					</tr>

					<tr id="exp1" class="expRow">

						<td><input class="form-control org" type="text" id="exp1Org"></td>

						<td><input class="form-control des" type="text" id="exp1Des"></td>

						<td><input class="form-control from" type="text" id="exp1From"></td>

						<td><input class="form-control to" type="text" id="exp1To"></td>

						<td><input class="form-control scale" type="text" id="exp1Scale"></td>

						<td><input class="form-control nature" type="text" id="exp1Nature"></td>

						<!-- <td><button class="btn btn-danger btn-sm" onclick="deleteExperienceRow('exp1',event);">Delete</button></td> -->

					</tr>

				</table>

				<button class="btn btn-info btn-md" onclick="insertNewExperienceRow(event,1);">Insert new row</button>

			</fieldset>

		</form>

		<button class="btn btn-primary btn-md" onclick="insertExperience(event,0)">Save</button><button class="btn btn-success btn-md" onclick="insertExperience(event,1);">Save & Next</button>

	</div>

</div>


<?php

	include_once("footer.php");

?>

<script>

$(document).ready(function(){
	fetchExperience();
});


</script>