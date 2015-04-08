<?php

	require_once("includes/backend/connect.php");

	function removeUnwanted($string)
	{
		$string=trim($string);
		$string=stripcslashes($string);
		
		if (get_magic_quotes_gpc()) 
		{
	  		$string = stripslashes($string);
		}
		$string = mysql_real_escape_string($string);
		$string=addslashes($string);
		return $string;
	}

	if(!isset($_GET['token']))
	{
		echo '<script>window.location.href="index.php";</script>';
	}
	else
	{
		$token=removeUnwanted($_GET['token']);

		$sql=sprintf("SELECT * FROM users WHERE token='%s' and confirmed='%d'",$token,0);

		$results=$conn->query($sql);

		if($results->num_rows==0)
		{
			echo '<script>alert("You have either already confirmed or token is invalid.");</script>';
		}
		else
		{
			$sql=sprintf("UPDATE users SET confirmed='%d' WHERE token='%s'",1,$token);

			$results=$conn->query($sql);

			if($results)
			{
				echo "<script>alert('Confirmed. You can login now.');window.location.href='login.php';</script>;";
			}
		}
	}





?>