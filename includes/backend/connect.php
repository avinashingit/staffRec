<?php
	
	require_once("constants.php");

	$conn=new mysqli(SERVER,USERNAME,PASSWORD,DB_NAME);  //SERVER, USERNAME, PASSWORD are defined in constants.php


	//to check for successful connection
	if($conn->connect_error)
	{
		die ("Failed to conenct to the database  ".$conn->connect_error);
	}
?>