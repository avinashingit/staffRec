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

		$sql=sprintf("SELECT experience.*, personaldetails.noYE FROM personaldetails INNER JOIN experience ON personaldetails.userId=experience.userId WHERE personaldetails.userId='%s'",$userId);

		// echo $sql;

		$results=$conn->query($sql);

		while($row=$results->fetch_array())
		{
			$orgs[]=$row['organization'];
			$desgs[]=$row['designation'];
			$froms[]=$row['fromDate'];
			$tos[]=$row['toDate'];
			$total[]=$row['totalpay'];
			$nature[]=$row['natureOfWork'];
			$noYE=$row['noYE'];


		}

		$object=new experience(implode("$%^",$orgs),implode("$%^",$desgs),implode("$%^",$froms),implode("$%^",$tos),implode("$%^",$total),implode("$%^",$nature),$noYE);

		echo json_encode($object);
	}




?>