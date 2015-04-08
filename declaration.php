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

	<div class="col-md-8 col-md-offset-2 text-center" style="text-align:justify">

		<div style="font-size:18px;">I hereby declare that the information given above is true and correct to the best of my knowledge and belief and I fully understand that if it is found at a later date that any information given in the application is incorrect/false or if I do not satisfy the eligibility criteria, my candidature/appointment is liable to be cancelled/terminated.</div>

		<br/><br/>

		<div class="col-md-6 col-md-offset-3 text-left">

			<p id="errors"></p>

		</div>

		<div class="text-center">


			<button class="btn btn-success btn-md" onclick="checkFormCompleteness(event);">Check for form completeness</button>

			<button class="btn btn-danger btn-md" onclick="window.location.href='includes/backend/submit.php'">Submit</button>


		</div>

	</div>

</div>


<?php

	include_once("footer.php");

?>