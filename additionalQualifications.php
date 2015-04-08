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

	<div class="col-md-10 text-center col-md-offset-1">

		<form method="post" id="additionalQualificationsForm">

			<fieldset>

				<table class="table table-bordered table-striped">

					<tr style="font-weight:bold">

						<td>Course</td>

						<td>Duration (YY:MM)</td>

						<td>Organization/Certificate</td>

						<td>Whether Govt. approved</td>

						<td>Score type</td>

						<td>Score</td>

					</tr>

					<tr id="add1" class="addQRow">

						<td><input class="form-control course" type="text" id="add1course"></td>

						<td><input class="form-control duration" type="text" id="add1duration"></td>

						<td><input class="form-control organization" type="text" id="add1Organization"></td>

						<td><select class="form-control govt"  id="add1govt"><option value="1">Yes</option><option value="2">No</option></select></td>

						<td><select class="form-control scoreType" id="add1scoreType"><option value="1">Percentage</option><option value="2">CGPA out of 10</option><option value="3">CGPA out of 8</option><option value="4">CGPA out of 4</option></select></td>

						<td><input class="form-control score" type="number" id="add1score"></td>

						<!-- <td><button class="btn btn-sm btn-danger" onclick="deleteAdditionalQualificationRow('add1',event);">Delete</button></td> -->

					</tr>

				</table>

				<button class="btn btn-info btn-md" onclick="insertNewAdditionalQualification(event,0);">Insert new row</button>

			</fieldset>

		</form>


		<button class="btn btn-primary btn-md" onclick="insertAdditionalQualifications(event,0);">Save</button><button class="btn btn-warning btn-md" onclick="insertAdditionalQualifications(event,1);">Save & Next</button>

	</div>

</div>


<?php

	include_once("footer.php");

?>


<script>
	$(document).ready(function(){
		fetchAdditionalQualifications();
	});
</script>