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

		    <li class="btn btn-sm btn-success btn-raised" id="pd" onclick="window.location.href='personalDetails.php'"><a href="personalDetails.php">Personal Details</a></li>

		    <li class="btn btn-sm btn-success btn-raised" id="eq" onclick="window.location.href='educationalQualifications.php'"><a href="educationalQualifications.php">Educational Qualifications</a></li>

		    <li class="btn btn-sm btn-success btn-raised" id="aq" onclick="window.location.href='additionalQualifications.php'"><a href="additionalQualifications.php">Additional Qualifications</a></li>

		    <li class="btn btn-sm btn-success btn-raised" id="ex" onclick="window.location.href='experience.php'"><a href="experience.php">Experience</a></li>

		    <li class="btn btn-sm btn-success btn-raised" id="od" onclick="window.location.href='otherDetails.php'"><a href="otherDetails.php">Other Details</a></li>

		    <li class="btn btn-sm btn-success btn-raised" id="rd" onclick="window.location.href='referreeDetails.php'"><a href="referreeDetails.php">Referree details</a></li>

		    <li class="btn btn-sm btn-success btn-raised" id="de" onclick="window.location.href='declaration.php'"><a href="declaration.php">Declaration</a></li>

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
