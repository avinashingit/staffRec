<?php

require_once("functions.php");
// var_dump($_POST);
$username=removeUnwanted($_POST['_username']);
$password=removeUnwanted($_POST['_password']);

if($username=="" || $password=="")
{
	echo 19;
}
else
{
	$sql=sprintf("SELECT * FROM users WHERE username='%s' AND password='%s'",$username,hash("sha512",$password."140519951730"));


	$users=$conn->query($sql);

	if($users->num_rows<=0)
	{
		echo 23;
	}
	else
	{
		$row=$users->fetch_array();
		// var_dump($row);
		if($row['confirmed']==0)
		{
			echo 24;
		}
		else
		{
			session_start();
			$_SESSION['oi']=$row['userId'];
			$_SESSION['si']=$row['submitted'];
			echo 1;
		}

	}
}









?>