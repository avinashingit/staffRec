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

		$sql=sprintf("SELECT * FROM referredetails WHERE userId='%s'",$userId);

		$results=$conn->query($sql);

		$row=$results->fetch_array();

		$object=new refereeDetails($row[1],$row[2],$row[3],$row[4],$row[5]);

		echo json_encode($object);
	}








?>