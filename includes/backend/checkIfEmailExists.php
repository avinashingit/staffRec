<?php


	require_once("functions.php");
		$email=$_POST['_email'];
		if(filter_var($email, FILTER_VALIDATE_EMAIL)===false)
		{
			echo 9892;
			exit();
		}
		$sql=sprintf("SELECT * FROM users WHERE emailId='%s'",$email);
		$result=$conn->query($sql);
		if(!$result)
		{
			echo 9;
		}
		else
		{
			if($result->num_rows==0)
			{
				echo 1;
			}
			else
			{
				echo -1;
			}
		}
		
	




?>