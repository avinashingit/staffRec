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

		$sql=sprintf("SELECT * FROM otherdetails WHERE userId='%s'",$userId);

		$result=$conn->query($sql);

		if($result)
		{
			$row=$result->fetch_array();

			$object=new otherDetails($row['presentEmployment'],$row['natureOfWork'],$row['timeRequiredToJoin'],$row['joinWriteup']);

			print_r( json_encode($object));
		}
		else
		{
			echo 16;
		}		
	}


?>