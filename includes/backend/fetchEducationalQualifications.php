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

		$sqls=sprintf("SELECT * FROM educationalqualifications WHERE userId='%s'",$userId);

		$results=$conn->query($sqls);

		while($row=$results->fetch_array())
		{
			$degrees[]=$row['degree'];
			$branches[]=$row['branch'];
			$univs[]=$row['university'];
			$yoes[]=$row['yoe'];
			$yols[]=$row['yol'];
			$fupacs[]=$row['fullTimeOrPartTime'];
			$st[]=$row['scoreType'];
			$sco[]=$row['score'];
		}


		$object= new educationalQualifications(implode("$%^",$degrees),implode("$%^",$branches),implode("$%^",$univs),implode("$%^",$yoes),implode("$%^",$yols),implode("$%^",$fupacs),implode("$%^",$st),implode("$%^",$sco));

		echo json_encode($object);
	}
?>