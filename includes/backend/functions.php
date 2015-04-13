<?php

	require_once("connect.php");

	require_once("classes.php");

	require_once("../phpmailer/PHPMailerAutoload.php");

	error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

	function createDatabase($db_name)
	{
		$sql="CREATE DATABASE ".$db_name;

		global $conn;

		$query=$conn->query($sql);

		if(!$query)
		{
			return -1;
		}
		else
		{
			return 1;
		}
	}

	function removeUnwanted($string)
	{
		$string=trim($string);
		$string=stripcslashes($string);
		
		if (get_magic_quotes_gpc()) 
		{
	  		$string = stripslashes($string);
		}
		$string = mysql_real_escape_string($string);
		$string=addslashes($string);
		return $string;
	}

	function validatePhone($phone)
	{
		return 1;
	}

	function validateEmail($email)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
		     return 1;
		}
		else
		{
			return 0;
		}
	}
	function validateDOB($dob)
	{
		//dd/mm/yyyy
		$date=explode("/",$dob);
		if(count($date)!=3)
		{
			return -1;
		}
		else
		{
			if($date[1]<=0 || $date[1]>12)
			{
				return -1;
			}
			else
			{
				if($date[2]>date("Y"))
				{
					return -1;
				}
				else
				{
					if($date[2]%4==0)
					{
						$daysArray=[31,29,31,30,31, 30,31,31,30,31, 30,31];
						if($date[0]>=0&&$date[0]<=$daysArray[$date[1]-1])
						{
							return 1;
						}
						else
						{
							return -1;
						}
					}
					else
					{
						$daysArray=[31,28,31,30,31, 30,31,31,30,31, 30,31];
						if($date[0]>=0&&$date[0]<=$daysArray[$date[1]-1])
						{
							return 1;
						}
						else
						{
							return -1;
						}
					}
					

				}
			}
		}
	}

	function checkForFormCompleteness($userId)
	{
		$conn=new mysqli(SERVER,USERNAME,PASSWORD,DB_NAME);

		$sql=sprintf("SELECT * FROM personaldetails WHERE userId='%s'",$userId);

		$results=$conn->query($sql);

		$row=$results->fetch_array();

		$errorString="<ol>";

		if($row['postApplied']==0)
		{
			$errorString.="<li>Post applied is not selected in personal details.</li><br/>";
		}
		if($row['fullName']=="")
		{
			$errorString.="<li>Name is note entered in personal details.</li><br/>";
		}
		if($row['dob']=="")
		{
			$errorString.="<li>Date of birth is not entered in personal details.</li><br/>";
		}
		if($row['nationality']=="")
		{
			$errorString.="<li>Nationality is not entered in personal details.</li><br/>";
		}
		if($row['sex']=="")
		{
			$errorString.="<li>Sex is not entered in personal details.</li><br/>";
		}
		if($row['category']=="")
		{
			$errorString.="<li>Category is not entered in personal details.</li><br/>";
		}
		if($row['exServiceman']=="")
		{
			$errorString.="<li>ExServiceman is not entered in personal details.</li><br/>";
		}
		$cA=explode("$%^",$row['currentAddress']);

		if($cA[0]==""&&$cA[1]=="")
		{
			$errorString.="<li>Current address in personal details cannot be empty.</li><br/>";
		}
		if($cA[2]=="" || $cA[3]=="")
		{
			$errorString.="<li>Current phone or current email cannot be empty in personal details.</li><br/>";
		}

		$pA=explode("$%^",$row['permanentAddress']);

		if($pA[0]==""&&$pA[1]=="")
		{
			$errorString.="<li>Permanent address in personal details cannot be empty.</li><br/>";
		}
		if($pA[2]=="" || $pA[3]=="")
		{
			$errorString.="<li>Permanent phone or permanent email cannot be empty in personal details.</li><br/>";
		}

		if($row['parentName']=="")
		{
			$errorString.="<li>Father/Spouse name cannot be empty in personal details.</li><br/>";
		}

		if(!file_exists(__DIR__."/../../files/".$userId."_photo.jpg"))
		{
			$errorString.="<li>Photo has not been uploaded.</li><br/>";
		}

		

		/*if(!file_exists(__DIR__."/../../files/".$userId."_disabilityCertificate.pdf"))
		{
			$errorString.="<li>Disability certificate has not been uploaded.</li><br/>";
		}*/

		if($row['category']==1||$row['category']==2||$row['category']==3)
		{
			if(!file_exists(__DIR__."/../../files/".$userId."_categoryCertificate.pdf"))
			{
				$errorString.="<li>Category certificate has not been uploaded.</li><br/>";
			}
		}

		$sql=sprintf("SELECT * FROM educationalqualifications WHERE userId='%s'",$userId);

		$results=$conn->query($sql);

		while($row=$results->fetch_array())
		{
			if($row['degree']==0)
			{
				$errorString.="<li>Degree is not selected for one of the educational qualifications.</li><br/>";
			}

			if($row['branch']=="")
			{
				$errorString.="<li>Branch is not entered for one of the educational qualifications.</li><br/>";
			}

			if($row['university']=="")
			{
				$errorString.="<li>Institute is not entered for one of the educational qualifications.</li><br/>";
			}

			if($row['yoe']==0)
			{
				$errorString.="<li>Year of entry is not entered for one of the educational qualifications.</li><br/>";
			}

			if($row['yol']==0)
			{
				$errorString.="<li>Year of leaving is not entered for one of the educational qualifications.</li><br/>";
			}

			if($row['score']=="")
			{
				$errorString.="<li>Score is not entered for one of the educational qualifications.</li><br/>";
			}

		}

		$sql=sprintf("SELECT * FROM additionalqualifications WHERE userId='%s'",$userId);

		$results=$conn->query($sql);

		$row=$results->fetch_array();

		$course=explode("$%^",$row['course']);
		$duration=explode("$%^",$row['duration']);
		$organization=explode("$%^",$row['organization']);
		$govt=explode("$%^",$row['govtapproved']);
		$scoreTypes=explode("$%^",$row['scoreType']);
		$scores=explode("$%^",$row['score']);

		for($i=0;$i<count($course);$i++)
		{
			if($course[$i]=="")
			{
				$errorString.="<li>Course is not entered for one of the additional qualifications.</li><br/>";
			}

			if($organization[$i]=="")
			{
				$errorString.="<li>Organization is not entered for one of the additional qualifications.</li><br/>";
			}

			if($duration[$i]=="")
			{
				$errorString.="<li>Duration is not entered for one of the additional qualifications.</li><br/>";
			}

			if($scores[$i]=="")
			{
				$errorString.="<li>Score is not entered for one of the additional qualifications.</li><br/>";
			}
		}

		$sql=sprintf("SELECT * FROM experience WHERE userId='%s'",$userId);

		$results=$conn->query($sql);

		if(!$results)
		{
			echo 9;
		}
		else
		{
			while($row=$results->fetch_array())
			{
				if($row['organization']=="")
				{
					$errorString.="<li>Organization is not entered for one of the experiences.</li><br/>";
				}

				if($row['designation']=="")
				{
					$errorString.="<li>Designation is not entered for one of the experiences.</li><br/>";
				}

				if($row['fromDate']=="")
				{
					$errorString.="<li>From date is not entered for one of the experiences.</li><br/>";
				}

				if($row['toDate']=="")
				{
					$errorString.="<li>To date is not entered for one of the experiences.</li><br/>";
				}

				if($row['totalpay']=="")
				{
					$errorString.="<li>Total pay is not entered for one of the experiences.</li><br/>";
				}

				if($row['natureOfWork']=="")
				{
					$errorString.="<li>nature of Work is not entered for one of the experiences.</li><br/>";
				}
			}
		}

		$sql=sprintf("SELECT * FROM otherDetails WHERE userId='%s'",$userId);

		$results=$conn->query($sql);

		if(!$results)
		{
			echo 9;
			exit();
		}
		else
		{
			$row=$results->fetch_array();

			if($row['presentEmployment']=="")
			{
				$errorString.="<li>Present employment is not entered in other details.</li><br/>";
			}

			if($row['natureOfWork']=="")
			{
				$errorString.="<li>Nature of work is not entered in other details.</li><br/>";	
			}

			if($row['timeRequiredToJoin']=="")
			{
				$errorString.="<li>Time required to join is not entered in other details.</li><br/>";
			}

			if($row['joinWriteup']==0)
			{
				$errorString.="<li>Please attach the join writeup in other details.</li><br/>";
			}
		}

		$sql=sprintf("SELECT * FROM referredetails WHERE userId='%s'",$userId);

		$results=$conn->query($sql);

		if(!$results)
		{
			echo 9;
		}
		else
		{
			$row=$results->fetch_array();

			$names=explode("$%^",$row['referreeName']);
			$designations=explode("$%^",$row['referreeDesignation']);
			$address=explode("$%^",$row['referreeAddress']);
			$phones=explode("$%^",$row['referreePhone']);
			$emails=explode("$%^",$row['referreeEmail']);

			for($i=1;$i<=count($names);$i++)
			{
				if($names[$i-1]=="")
				{
					$errorString.="<li>Name of referee ".$i." is not entered in referee details.</li><br/>";
				}

				if($designations[$i-1]=="")
				{
					$errorString.="<li>Designation of referee ".$i." is not entered in referee details.</li><br/>";
				}

				if($address[$i-1]=="")
				{
					$errorString.="<li>Address of referee ".$i." is not entered in referee details.</li><br/>";
				}

				if($phones[$i-1]=="")
				{
					$errorString.="<li>Phone of referee ".$i." is not entered in referee details.</li><br/>";
				}

				if($emails[$i-1]=="")
				{
					$errorString.="<li>Email of referee ".$i." is not entered in referee details.</li><br/>";
				}
			}
		}

		$errorString.="</ol>";

		return $errorString;
	}

	function sendMail($to,$message)
	{
		$mail=new PHPMailer();

		$mail->isSMTP();

		$mail->SMTPDebug=2;

		$mail->Host='smtp.gmail.com';

		$mail->Port=587;

		$mail->SMTPSecure='tls';

		$mail->SMTPAuth=true;

		$mail->Username="facultyrec.iiitdm@gmail.com";

		$mail->Password="easytoguess";

		$mail->setFrom('webmaster.iiitdm@gmail.com','Webmaster IIITD&M');

		$mail->addAddress($to);

		$mail->Subject="Registration confirmation for staff recruitment";

		$mail->isHTML(true);

		$mail->Body=$message;

		if(!$mail->send())
		{
			return 0;
		}
		else
		{
			return 1;
		}

	}










?>