<?php

	require_once("functions.php");
	$username=$_POST['_username'];
	$sql=sprintf("SELECT * FROM users WHERE username='%s'",$username);
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