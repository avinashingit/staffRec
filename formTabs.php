<?php
	// session_start();
	if($_SESSION['si']==1)
	{
		echo '<script>window.location.href="submitted.php";</script>';
	}

	?>

<div class="row">

	<div class="col-md-12 text-center">

		<div class="text-center">

		  <ul class="nav nav-tabs nav-justified">

		    <li class="btn btn-sm btn-success btn-raised" id="pd"><a href="personalDetails.php">Personal Details</a></li>

		    <li class="btn btn-sm btn-success btn-raised" id="eq"><a href="educationalQualifications.php">Educational Qualifications</a></li>

		    <li class="btn btn-sm btn-success btn-raised" id="aq"><a href="additionalQualifications.php">Additional Qualifications</a></li>

		    <li class="btn btn-sm btn-success btn-raised" id="ex"><a href="experience.php">Experience</a></li>

		    <li class="btn btn-sm btn-success btn-raised" id="od"><a href="otherDetails.php">Other Details</a></li>

		    <li class="btn btn-sm btn-success btn-raised" id="rd"><a href="referreeDetails.php">Referree details</a></li>

		    <li class="btn btn-sm btn-success btn-raised" id="de"><a href="declaration.php">Declaration</a></li>

		  </ul>
		  
		</div>

	</div>

</div>

<br/>

<br/>

<script>


var pageURL=window.location.href;

if(pageURL.indexOf("personalDetails")>-1)
{
	$('#pd').removeClass('btn-success').addClass('btn-default');
}
else if(pageURL.indexOf("educationalQualifications")>-1)
{
	$('#eq').removeClass('btn-success').addClass('btn-default');
}
else if(pageURL.indexOf("additionalQualifications")>-1)
{
	$('#aq').removeClass('btn-success').addClass('btn-default');
}
else if(pageURL.indexOf("experience")>-1)
{
	$('#ex').removeClass('btn-success').addClass('btn-default');
}
else if(pageURL.indexOf("otherDetails")>-1)
{
	$('#od').removeClass('btn-success').addClass('btn-default');
}
else if(pageURL.indexOf("referreeDetails")>-1)
{
	$('#rd').removeClass('btn-success').addClass('btn-default');
}
else if(pageURL.indexOf("declaration")>-1)
{
	$('#de').removeClass('btn-success').addClass('btn-default');
}


</script>
