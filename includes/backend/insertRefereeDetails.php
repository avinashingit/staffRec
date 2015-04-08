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

		$r1name=removeUnwanted($_POST['_r1name']);

		$r2name=removeUnwanted($_POST['_r2name']);

		$r3name=removeUnwanted($_POST['_r3name']);

		$r1designation=removeUnwanted($_POST['_r1designation']);

		$r2designation=removeUnwanted($_POST['_r2designation']);

		$r3designation=removeUnwanted($_POST['_r3designation']);

		$r1email=removeUnwanted($_POST['_r1email']);

		$r2email=removeUnwanted($_POST['_r2email']);

		$r3email=removeUnwanted($_POST['_r3email']);

		$r1address=removeUnwanted($_POST['_r1address']);

		$r2address=removeUnwanted($_POST['_r2address']);

		$r3address=removeUnwanted($_POST['_r3address']);

		$r1phone=removeUnwanted($_POST['_r1phone']);

		$r2phone=removeUnwanted($_POST['_r2phone']);

		$r3phone=removeUnwanted($_POST['_r3phone']);

		$rname=$r1name."$%^".$r2name."$%^".$r3name;

		$rdesignation=$r1designation."$%^".$r2designation."$%^".$r3designation;

		$remail=$r1email."$%^".$r2email."$%^".$r3email;

		$raddress=$r1address."$%^".$r2address."$%^".$r3address;

		$rphone=$r1phone."$%^".$r2phone."$%^".$r3phone;

		if(validateEmail($r1email)!=1 || validateEmail($r2email)!=1 || validateEmail($r3email)!=1)
		{
			echo 115;
			exit();
		}

		if(validatePhone($r1phone)!=1 || validatePhone($r2phone)!=1 || validatePhone($r3phone)!=1)
		{
			echo 116;
			exit();
		}


		$sql=sprintf("SELECT * FROM referredetails WHERE userId='%s'",$userId);

		// echo $sql;

		$results=$conn->query($sql);

		if($results->num_rows<=0)
		{
			$sql=sprintf("INSERT INTO referredetails(userId,referreeName,referreeDesignation,referreeAddress,referreeEmail,referreePhone) VALUES ('%s','%s','%s','%s','%s','%s')",$userId,$rname,$rdesignation,$raddress,$remail,$rphone);

			// echo $sql;
		}
		else
		{
			$sql=sprintf("UPDATE referredetails SET referreeName='%s',referreeDesignation='%s',referreeAddress='%s',referreePhone='%s',referreeEmail='%s' WHERE userId='%s'",$rname,$rdesignation,$raddress,$rphone,$remail,$userId);

			echo $sql;

			// echo $sql;
		}

		$results=$conn->query($sql);

		if($results)
		{
			echo 1;
		}
		else
		{
			echo -1;
		}

		

	}



?>