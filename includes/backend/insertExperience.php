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
		$organization=$_POST['_organization'];
		$designation=$_POST['_designation'];
		$from=$_POST['_fromDate'];
		$to=$_POST['_toDate'];
		$scale=$_POST['_totalpay'];
		$nature=$_POST['_natureOfWork'];

		for($i=0;$i<count($organization);$i++)
		{
			$organization[$i]=removeUnwanted($organization[$i]);
			$designation[$i]=removeUnwanted($designation[$i]);
			$from[$i]=removeUnwanted($from[$i]);
			$to[$i]=removeUnwanted($to[$i]);
			$scale[$i]=removeUnwanted($scale[$i]);
			$nature[$i]=removeUnwanted($nature[$i]);

			if(validateDOB($from[$i])!=1 || validateDOB($to[$i])!=1)
			{
				echo 113;
				exit();
			}
		}

		$sql=sprintf("UPDATE personaldetails SET noYE='%d' WHERE userId='%s'",$_POST['_noYE'],$userId);

		$results=$conn->query($sql);

		if(!$results)
		{
			echo 9;
			exit();
		}

		$sql=sprintf("SELECT * FROM experience WHERE userId='%s'",$userId);

		$results=$conn->query($sql);
		if(!$results)
		{
			echo 12;
		}
		else
		{
			if($results->num_rows<=0)
			{
				for($i=0;$i<count($organization);$i++)
				{
					$x=$i+1;
					$sql=sprintf("INSERT INTO experience(userId,sno,organization,designation,fromDate,toDate,totalpay,natureOfWork) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s')",$userId,$x,$organization[$i],$designation[$i],$from[$i],$to[$i],$scale[$i],$nature[$i]);
					echo $sql;
					$conn->query($sql);
				}
			}
			else
			{
				$sql=sprintf("DELETE FROM experience WHERE userId='%s'",$userId);

				$results=$conn->query($sql);

				if(!$results)
				{
					echo 12;
				}
				else
				{
					for($i=0;$i<count($organization);$i++)
					{
						$x=$i+1;
						$sql=sprintf("INSERT INTO experience(userId,sno,organization,designation,fromDate,toDate,totalpay,natureOfWork) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s')",$userId,$x,$organization[$i],$designation[$i],$from[$i],$to[$i],$scale[$i],$nature[$i]);
						echo $sql;
						$conn->query($sql);
					}
				}
			}
		}

		
	}





?>