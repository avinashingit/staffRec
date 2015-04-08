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

		$presentEmployment=removeUnwanted($_POST['_presentEmployment']);

		$natureOfWork=removeUnwanted($_POST['_natureOfWork']);

		$timeRequired=removeUnwanted($_POST['_timeRequired']);

		//category file upload
		$target_dir = __DIR__."/../../files/";
		$temp=explode(".",$_FILES["_mentionInterest"]["name"]);
		if($_FILES["_mentionInterest"]["name"]!="")
		{
			if(end($temp)!="pdf")
			{
				echo 114;
				exit();
			}
		}
		$target_file = $target_dir . $userId."_interest".".".end($temp);
		$uploadOk = 1;
		// echo $target_dir;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$sop=0;
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    // echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["_mentionInterest"]["tmp_name"], $target_file)) {
		        $sop=1;
		    } else {
		        $sop=0;
		    }
		}

		if(file_exists(__DIR__."/../../files/".$userId."_interest.pdf"))
		{
			$sop=1;
		}
		else
		{
			$sop=0;
		}

		$sql=sprintf("SELECT * FROM otherdetails WHERE userId='%s'", $userId);

		// echo $sql;

		$results=$conn->query($sql);

		if($results->num_rows<=0)
		{
			$sql=sprintf("INSERT INTO otherdetails(userId,presentEmployment,natureOfWork,timeRequiredToJoin,joinWriteup) VALUES('%s','%s','%s','%s','%d')",$userId,$presentEmployment,$natureOfWork,$timeRequired,$sop);
		}
		else
		{
			$sql=sprintf("UPDATE otherdetails SET presentEmployment='%s', natureOfWork='%s',timeRequiredToJoin='%s',joinWriteup='%d' WHERE userId='%s'",$presentEmployment,$natureOfWork,$timeRequired,$sop,$userId);
		}

		// echo $sql;

		if($conn->query($sql))
		{
			echo 1;
		}
		else
		{
			echo -1;
		}

	}

?>