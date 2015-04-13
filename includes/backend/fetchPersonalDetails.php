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

		$sql=sprintf("SELECT * FROM personaldetails WHERE userId='%s'",$userId);

		$results=$conn->query($sql);

		$row=$results->fetch_array();

		$photo=0;

		if(file_exists(__DIR__."/../../files/".$userId."_photo.jpg"))
		{
			$photo=1;
		}
		else
		{
			$photo=0;
		}

		$categoryCertificate=0;

		if(file_exists(__DIR__."/../../files/".$userId."_categoryCertificate.pdf"))
		{
			$categoryCertificate=1;
		}
		else
		{
			$categoryCertificate=0;
		}

		$disabilityCertificate=0;

		if(file_exists(__DIR__."/../../files/".$userId."_disabilityCertificate.pdf"))
		{
			$disabilityCertificate=1;
		}
		else
		{
			$disabilityCertificate=0;
		}

		$object=new personalDetails($row['postApplied'],$row['fullName'],$row['dob'],$row['nationality'],$row['sex'],$row['category'],$row['exServiceman'],$row['disabled'],$row['currentAddress'],$row['permanentAddress'],$row[12],$row[13],$photo,$categoryCertificate,$disabilityCertificate);

		echo json_encode($object);
	}



?>