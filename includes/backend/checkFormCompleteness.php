<?php

	session_start();

	require_once("functions.php");

	if(!isset($_SESSION['oi']))
	{
		echo 9;
		exit();
	}
	else
	{
		$userId=$_SESSION['oi'];

		$reValue=checkForFormCompleteness($userId);

		if($reValue!="<ol></ol>")
		{
			echo $reValue;
		}
		else
		{
			echo 1;
		}


	}




?>