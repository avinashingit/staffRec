<?php

	session_start();

	require_once("functions.php");

	if(!isset($_SESSION['oi']))
	{
		echo 9;
	}
	else
	{
		$userId=$_SESSION['oi'];
		$op=$_POST['_op'];
		$np=$_POST['_np'];
		$npa=$_POST['_npa'];

		$sql=sprintf("SELECT * FROM users WHERE userId='%s' AND password='%s'",$userId,hash("sha512",$op."140519951730"));

		$results=$conn->query($sql);

		if($results->num_rows==0)
		{
			echo 180;
		}
		else
		{
			if($np!=$npa)
			{
				echo 181;
			}
			else
			{
				$sql=sprintf("UPDATE users SET password='%s' WHERE userId='%s'",hash("sha512",$np."140519951730"),$userId);

				$results=$conn->query($sql);

				if(!$results)
				{
					echo 12;
				}
				else
				{
					echo 1;
				}
			}
		}
	}






?>