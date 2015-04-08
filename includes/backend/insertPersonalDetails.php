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
		// var_dump($_POST);
		$userId=$_SESSION['oi'];
		$error=0;
		$name=removeUnwanted($_POST['_name']);
		$post=removeUnwanted($_POST['_post']);
		if($post<0 || $post>12)
		{
			echo 999;
			$error=1;
			session_destroy();
			exit();
		}
		$dob=removeUnwanted($_POST['_dob']);
		if(validateDOB($dob)!=1)
		{
			echo 999;
			$error=1;
			session_destroy();
			exit();
		}
		$nationality=removeUnwanted($_POST['_nationality']);
		$gender=removeUnwanted($_POST['_gender']);
		if($gender!=1 && $gender!=2)
		{
			echo 999;
			$error=1;
			session_destroy();
			exit();
		}
		$category=removeUnwanted($_POST['_category']);
		if($category<1 || $category>4)
		{
			echo 999;
			$error=1;
			session_destroy();
			exit();
		}
		$service=removeUnwanted($_POST['_service']);
		if($service<1 || $service>2)
		{
			echo 999;
			$error=1;
			session_destroy();
			exit();
		}
		$pd=removeUnwanted($_POST['_disability']);
		if($pd<1 | $pd>2)
		{
			echo 999;
			$error=1;
			session_destroy();
			exit();
		}
		$caline1=removeUnwanted($_POST['_caline1']);
		$caline2=removeUnwanted($_POST['_caline2']);
		$currentPhone=removeUnwanted($_POST['_currentPhone']);
		if(validatePhone($currentPhone)!=1)
		{
			echo 101;
			exit();
		}
		$currentEmail=removeUnwanted($_POST['_currentEmail']);
		if(validateEmail($currentEmail)!=1)
		{
			echo 102;
			exit();
		}
		$pmasaca=removeUnwanted($_POST['_pmasaca']);
		$paline1=removeUnwanted($_POST['_paline1']);
		$paline2=removeUnwanted($_POST['_paline2']);
		$pphone=removeUnwanted($_POST['_pphone']);
		if(validatePhone($pphone)!=1)
		{
			echo 101;
			exit();
		}
		$pemail=removeUnwanted($_POST['_pemail']);
		if(!$pmasaca)
		{
			if(validateEmail($pemail)!=1)
			{
				echo 102;
				exit();
			}
		}
		
		$fatherName=removeUnwanted($_POST['_fatherName']);

		$currentAddress=$caline1."$%^".$caline2."$%^".$currentPhone."$%^".$currentEmail;
		// echo $pmasaca;
		if($pmasaca)
		{
			$permanentAddress=$currentAddress;
		}
		else
		{
			$permanentAddress=$paline1."$%^".$paline2."$%^".$pphone."$%^".$pemail;
		}

		if($pmasaca)
		{
			$pmasaca=1;
		}
		else
		{
			$pmasaca=0;
		}

		// var_dump($_FILES);
		
		//photo upload
		$target_dir = __DIR__."/../../files/";
		$temp=explode(".",$_FILES["_photo"]["name"]);
		if($_FILES["_photo"]["name"]!="")
		{
			if(end($temp)!='jpg' && end($temp)!='jpeg' && end($temp)!='png')
			{
				echo 103;
				exit();
			}
		}
		
		
		$target_file = $target_dir . $userId."_photo".".".end($temp);
		$photo=$target_file;
		$uploadOk = 1;
		$photo=0;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    // echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["_photo"]["tmp_name"], $target_file)) {
		        $photo=$userId."_photo".".".end($temp);
		        // echo "DONE";
		    } else {
		       	$photo=0;
		       	// echo "S";
		    }
		}

		//category file upload
		$target_dir = __DIR__."/../../files/";
		$temp=explode(".",$_FILES["_categoryCertificate"]["name"]);
		if($_FILES["_categoryCertificate"]["name"]!="")
		{
			if(end($temp)!='pdf')
			{
				echo 104;
				exit();
			}
		}
		
		$target_file = $target_dir . $userId."_categoryCertificate".".".end($temp);
		$categoryCertificate=$target_file;
		$uploadOk = 1;
		$categoryCertificate=0;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    // echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["_categoryCertificate"]["tmp_name"], $target_file)) {
		        $categoryCertificate=$userId."_categoryCertificate".".".end($temp);
		    } else {
		       	$categoryCertificate=0;
		    }
		}

		//disability
		$target_dir = __DIR__."/../../files/";
		$temp=explode(".",$_FILES["_disabilityCertificate"]["name"]);
		if($_FILES["_disabilityCertificate"]["name"]!="")
		{
			if(end($temp)!='pdf')
			{
				echo 105;
				exit();
			}
		}
		
		$target_file = $target_dir . $userId."_disabilityCertificate".".".end($temp);
		$disabilityCertificate=$userId."_disabilityCertificate".".".end($temp);
		$uploadOk = 1;
		// echo $target_dir;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    // echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["_disabilityCertificate"]["tmp_name"], $target_file)) {
		        	$disabilityCertificate=$userId."_disabilityCertificate".".".end($temp);
		    } else {
		        $disabilityCertificate=0;
		    }
		}

		//data validation
		//
		//
		
		$sql=sprintf("SELECT * FROM personaldetails WHERE userId='%s'",$userId);
		// echo $sql;
		$results=$conn->query($sql);

		if(!$results)
		{
			echo 12;
		}
		else
		{
			if($results->num_rows>0)
			{
				$row=$results->fetch_array();
				$sqls=sprintf("UPDATE personaldetails SET postApplied='%s',fullName='%s',dob='%s',nationality='%s', sex='%s', category='%s', exServiceman='%s', disabled='%s', currentAddress='%s', permanentAddress='%s', currSameAsPerm='%s', parentName='%s', photo='%s', categoryCerti='%s', disabilityCerti='%s' WHERE userId='%s'",$post,$name,$dob,$nationality,$gender,$category,$service,$pd,$currentAddress,$permanentAddress,$pmasaca,$fatherName,$photo,$categoryCertificate,$disabilityCertificate,$userId);
			}
			else
			{
				$sqls=sprintf("INSERT INTO personaldetails(userId,postApplied,fullName,dob,nationality,sex,category,exServiceman,disabled,currentAddress,permanentAddress,currSameAsPerm,parentName,photo,categoryCerti,disabilityCerti) VALUES('%s','%d','%s','%s','%s','%d','%d','%d','%d','%s','%s','%d','%s','%s','%s','%s')",$userId,$post,$name,$dob,$nationality,$gender,$category,$service,$pd,$currentAddress,$permanentAddress,$pmasaca,$fatherName,$photo,$categoryCertificate,$disabilityCertificate);
			}
			$query=$conn->query($sqls);
			if($query)
			{
				echo 1;
			}
			else
			{
				echo 12;
			}
		}

	}

?>