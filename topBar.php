<div class="row" style="margin:0px !important;padding:0px !important;">

	<div class="col-md-12 text-center" style="margin:0px !important;padding:0px !important;background:-moz-linear-gradient(left, #EF612A, #FFF, #0F5710);background:-webkit-linear-gradient(left, #EF612A, #FFF, #0F5710);color:#000;border-bottom:3px solid #BC3636;">

		<div style="font-size:20px"><a href="/css_mail"><img src='images/appImgs/iiitdm.svg' align='c2enter' width="100" height="100"></a>&nbsp;&nbsp;<b>INDIAN INSTITUTE OF INFORMATION TECHNOLOGY DESIGN AND MANUFACTURING (IIITD&M), KANCHEEPURAM</b></div>

	</div>

</div>

<br/>

<div class="row">

	<div class="col-md-2 col-md-offset-1">
		<?php

			if(isset($_SESSION['oi']))
			{
				echo '<a class="btn btn-raised btn-info btn-sm text-right" onclick="window.location.href=\'changePassword.php\'">Change password</a><br/>';
			}

		?>
	</div>

	<div class="col-md-6 text-center" style="color:#233013 !important;">

		<div style="font-size:20px;"><b>STAFF RECRUITMENT PORTAL</b></div>

	</div>

	<div class="col-md-offset-1 col-md-2">

		<?php

			if(isset($_SESSION['oi']))
			{
				echo '<button class="btn btn-raised btn-danger btn-sm text-right" onclick="window.location.href=\'logout.php\'">Logout</button><br/>';

				
			}

		?>

	</div>


	<?php

		if(isset($_SESSION['oi']))
		{
			echo '<p class="text-center" style="color:red;">All fields are required.Category certificate is not needed for GEN. Upload disability certificate if physically disabled.</p>';
		}

	?>
	

</div>

<br/>



