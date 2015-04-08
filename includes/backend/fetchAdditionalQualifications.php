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

		$sql=sprintf("SELECT * FROM additionalqualifications WHERE userId='%s'",$userId);

		// echo $sql;

		$results=$conn->query($sql);

		$row=$results->fetch_array();

		// var_dump($row);

		$object=new additionalQualifications($row['course'],$row['duration'],$row['organization'],$row['govtapproved'],$row['scoreType'],$row['score']);

		echo json_encode($object);
	}








?>