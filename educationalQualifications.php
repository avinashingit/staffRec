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

	<div class="col-md-12 text-center">

		<form method="post" id="educationalQualificationsForm">

			<fieldset>

				<table class="table table-bordered table-striped">

					<tr style="font-weight:bold">

						<td>Degree</td>

						<td>Branch</td>

						<td>Institute/Board</td>

						<td>Year of entry</td>

						<td>Year of leaving</td>

						<td>Full time/ part time correspondence</td>

						<td>Score type</td>

						<td>Score</td>

					</tr>

					<tr id="edu1" class="eduRow">

						<td><select class="form-control degree">
							<option value="0">Select</option>
							<option value="1">Secondary</option>
							<option value="2">Higher secondary</option>
							<option value="3">Diploma</option>
							<option value="4">B.Tech/B.E</option>
							<option value="5">B.Sc/B.Com/B.A/BLIS</option>
							<option value="6">M.E/M.Tech</option>
							<option value="7">M.Com/M.Sc/M.A/MLIS</option>
						</select></td>

						<td><input class="form-control branch"></td>

						<td><input class="form-control institute"></td>

						<td><input class="form-control yoe" type="number"></td>

						<td><input class="form-control yol" type="number"></td>

						<td><select class="form-control fupac">
							<option value="1">Full time</option>
							<option value="2">Part time</option>
						</select></td>

						<td><select class="form-control scoreType">
							<option value="1">Percentage</option>
							<option value="2">CGPA out of 10</option>
							<option value="3">CGPA out of 8</option>
							<option value="4">CGPA out of 4</option>
						</select></td>

						<td><input class="form-control score" type="number"></td>

					</tr>

				</table>

			</fieldset>

			<button class="btn btn-md btn-info" onclick='insertNewEducationalRow(event,1);'>Insert new row</button>

		</form>

		

		<button class="btn btn-md btn-primary" onclick='insertEducationalQualifications(event,0);'>Save</button><button class="btn btn-md btn-warning" onclick='insertEducationalQualifications(event,1);'>Save & Next</button>

	</div>

</div>


<?php

	include_once("footer.php");

?>

<script>

	$(document).ready(function(){
		fetchEducationalQualifications();
	});

</script>