<?php

	require_once("functions.php");

	$name=removeUnwanted($_POST['_name']);
	$username=removeUnwanted($_POST['_username']);
	$email=removeUnwanted($_POST['_email']);
	$password=removeUnwanted($_POST['_password']);
	$passwordAgain=removeUnwanted($_POST['_passwordAgain']);

	if($password!=$passwordAgain)
	{
		echo 16;
		exit();
	}

	else if($name=="" || $username=="" || $email=="" || $password=="")
	{
		echo 19;
		exit();
	}

	else
	{
		$sql=sprintf("SELECT * FROM users WHERE username='%s' OR emailId='%s'",$username,$email);

		$users=$conn->query($sql);

		if($users->num_rows>0)
		{
			$row=$users->fetch_array();
			if($row['emailId']==$email)
			{
				echo 21; //email already exists
			}
			else
			{
				echo 20; //username exists
			}
		}
		else
		{
			$password=hash("sha512",$password."140519951730");
			$sql=sprintf("INSERT INTO users (name,emailId,phoneNumber,username,password,confirmed,submitted,token) VALUES('%s','%s','%s','%s','%s','%d','%d','%s')",$name,$email,$email,$username,$password,0,0,hash("sha512",$username."1405".$email."1730"));
			// echo $sql;
			if($conn->query($sql))
			{
				$message="Hi, ".$name."<br/>";

				$message.="Your registration for IIITD&M Staff recruitment portal is successfull. Please click on the following link to confirm your identity<br/><br/>";

				$message.="http://172.16.1.251/staffRec/confirm.php?token=".hash("sha512",$username."1405".$email."1730");

				if(sendMail($email,$message))
				{
					echo 1;
				}
				else
				{
					echo -1;
				}
			}
			else
			{
				echo 9;
			}
		}

	}

?>