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
		$course=$_POST['_course'];
		$duration=$_POST['_duration'];
		$organization=$_POST['_organization'];
		$govt=$_POST['_govt'];
		$scoreType=$_POST['_scoreType'];
		$scores=$_POST['_score'];

		for($i=0;$i<count($course);$i++)
		{
			$course[$i]=removeUnwanted($course[$i]);
			$duration[$i]=removeUnwanted($duration[$i]);
			$organization[$i]=removeUnwanted($organization[$i]);
			$govt[$i]=removeUnwanted($govt[$i]);
			$scoreType[$i]=removeUnwanted($scoreType[$i]);
			$score[$i]=removeUnwanted($score[$i]);

			if($durationArray[$i]!="")
			{
				$durationSplit=explode(":",$duration[$i]);
				if(count($durationSplit)!=2)
				{
					echo 112;
					exit();
				}
				else if($durationSplit[0]<0 || $durationSplit[0]>99 || $durationSplit[1]<0 || $durationSplit[1]>12)
				{
					echo 112;
					exit();
				}
			}

			if($govt[$i]!=1 && $govt[$i]!=2)
			{
				echo 999;
				session_destroy();
				exit();
			}

			if($scoreType[$i]<1 || $scoreType[$i]>4)
			{
				echo 999;
				$error=1;
				session_destroy();
				exit();
			}
			if($scores[$i]!="")
			{
				if($scoreType[$i]==1)
				{
					if($scores[$i]<0 || $scores[$i]>100)
					{
						echo 107;
						exit();
					}
				}
				else if($scoreType[$i]==2)
				{
					if($scores[$i]<0 || $scores[$i]>10)
					{
						echo 107;
						exit();
					}
				}
				else if($scoreType[$i]==3)
				{
					if($scores[$i]<0 || $scores[$i]>8)
					{
						echo 107;
						exit();
					}
				}
				else if($scoreType[$i]==4)
				{
					if($scores[$i]<0 || $scores[$i]>4)
					{
						echo 107;
						exit();
					}
				}
			}
		}

		$courseImp=implode("$%^",$course);
		$orgImp=implode("$%^",$organization);
		$durationImp=implode("$%^",$duration);
		$govtImp=implode("$%^",$govt);
		$scoreTypeImp=implode("$%^",$scoreType);
		$scoresImp=implode("$%^",$scores);

		$sql=sprintf("SELECT * FROM additionalqualifications WHERE userId='%s'",$userId);
		// echo $sql;
		$results=$conn->query($sql);

		if($results->num_rows==0)
		{
			$sqls=sprintf("INSERT INTO additionalqualifications(userId,course,duration,organization,govtapproved,scoreType,score) VALUES ('%s','%s','%s','%s','%s','%s','%s')",$userId,$courseImp,$durationImp,$orgImp,$govtImp,$scoreTypeImp,$scoresImp);
		}
		else
		{	
			$sqls=sprintf("UPDATE additionalqualifications SET course='%s', duration='%s', organization='%s', govtapproved='%s', scoreType='%s', score='%s' WHERE userId='%s'",$courseImp,$durationImp,$orgImp,$govtImp,$scoreTypeImp,$scoresImp,$userId);
		}

		// echo $sqls;

		if(!$conn->query($sqls))
		{
			echo -1;
		}
		else
		{
			echo 1;
		}



	}

?>