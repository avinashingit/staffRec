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
		$error=0;
		$degrees=$_POST['_degrees'];
		for($i=0;$i<count($degrees);$i++)
		{
			if($degrees[$i]<0 || $degrees[$i]>5)
			{
				$error=1;
				echo 999;
				session_destroy();
				exit();
			}
		}
		$branches=$_POST['_branches'];
		$institutes=$_POST['_institutes'];
		$yoes=$_POST['_yoes'];
		$yols=$_POST['_yols'];

		for($i=0;$i<count($yoes);$i++)
		{
			if($yoes[$i]!="" && $yols[$i]!="")
			{
				if(!is_numeric($yols[$i])||(!is_numeric($yoes[$i])))
				{
					echo 111;
					exit();
				}
				else
				{
					if($yols[$i]<$yoes[$i])
					{
						echo 106;
						exit();
					}
				}
				
			}
		}
		$fupacs=$_POST['_fupacs'];
		for($i=0;$i<count($fupacs);$i++)
		{
			if($fupacs[$i]!=1 && $fupacs[$i]!=2)
			{
				echo 999;
				$error=1;
				session_destroy();
				exit();
			}
		}
		$scoreTypes=$_POST['_scoreTypes'];
		for($i=0;$i<count($scoreTypes);$i++)
		{
			if($scoreTypes[$i]<1 || $scoreTypes[$i]>4)
			{
				echo 999;
				$error=1;
				session_destroy();
				exit();
			}
		}
		$scores=$_POST['_scores'];

		for($i=0;$i<count($scores);$i++)
		{
			if($scores[$i]!="")
			{
				if(!is_numeric($scores[$i]))
				{
					echo 140;
					exit();
				}
				else
				{

					if($scoreTypes[$i]==1)
					{
						if($scores[$i]<0 || $scores[$i]>100)
						{
							echo 107;
							exit();
						}
					}
					else if($scoreTypes[$i]==2)
					{
						if($scores[$i]<0 || $scores[$i]>10)
						{
							echo 107;
							exit();
						}
					}
					else if($scoreTypes[$i]==3)
					{
						if($scores[$i]<0 || $scores[$i]>8)
						{
							echo 107;
							exit();
						}
					}
					else if($scoreTypes[$i]==4)
					{
						if($scores[$i]<0 || $scores[$i]>4)
						{
							echo 107;
							exit();
						}
					}
				}
			}
		}

		$sql=sprintf("SELECT * FROM educationalqualifications WHERE userId='%s'",$userId);

		$results=$conn->query($sql);

		if(!$results)
		{
			echo 12;
		}
		else
		{
			if($results->num_rows==0)
			{
				for($i=0;$i<count($degrees);$i++)
				{
					$x=$i+1;
					$sql=sprintf("INSERT INTO educationalqualifications(userId,sno,degree,branch,university,yoe,yol,fullTimeOrPartTime,scoreType,score) VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",$userId,$x,$degrees[$i],$branches[$i],$institutes[$i],$yoes[$i],$yols[$i],$fupacs[$i],$scoreTypes[$i],$scores[$i]);
					$results=$conn->query($sql);
					if(!$results)
					{
						echo 9;
						exit();
						break;
					}
				}
				echo 1;
			}
			else
			{
				$sql=sprintf("DELETE FROM educationalqualifications WHERE userId='%s'",$userId);

				$results=$conn->query($sql);

				if(!$results)
				{
					echo 12;
				}
				else
				{
					for($i=0;$i<count($degrees);$i++)
					{
						$x=$i+1;
						$sql=sprintf("INSERT INTO educationalqualifications(userId,sno,degree,branch,university,yoe,yol,fullTimeOrPartTime,scoreType,score) VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",$userId,$x,$degrees[$i],$branches[$i],$institutes[$i],$yoes[$i],$yols[$i],$fupacs[$i],$scoreTypes[$i],$scores[$i]);
						$results=$conn->query($sql);
						if(!$results)
						{
							echo 9;
							exit();
							break;
						}
					}
					echo 1;
				}
			}
		}
	}

?>