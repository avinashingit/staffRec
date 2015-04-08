<?php

	session_start();

	require_once("functions.php");

	require_once("fpdf.php");

	class pdf extends fpdf
	{
		function header()
		{

			$this->SetFont('Arial');
			$this->Ln(5);
			//$this->Ln();
			//$this->Ln();


			$this->Image('../../images/appImgs/logo.png',10,15,27);



			$head1 = "Indian Institute of Information Technology, Design and Manufacturing (IIITD&M) Kancheepuram";
			$head4 = "Application for Staff Position";

			$this->SetFont('Arial','B',10);



			$this->Cell(30);
			$this->Cell(2*strlen($head1),8,$head1);
			$this->Ln();


			$this->Cell(80);
			$this->Cell(2*strlen($head4),8,$head4);
			$this->Ln();
			$this->Ln();
			$this->Ln();


			/*$this->Cell(70);
			$this->Cell(2*strlen($head4),8,$head3);
			$this->Ln();*/

			$this->SetFont('Arial','B',10);
		}
	}

	if(!isset($_SESSION['oi']))
	{
		echo 9;
	}
	else
	{
		$userId=$_SESSION['oi'];
			if(checkForFormCompleteness($userId)=="<ol></ol>")
			{

				$sql=sprintf("UPDATE users SET submitted='%d' WHERE userId='%d'",1,$userId);

				if(!$conn->query($sql))
				{
					echo 12;
					exit();
				}

				$_SESSION['si']=1;

				$pdf=new PDF();

				$pdf->AddPage();

				$sql=sprintf("SELECT * FROM personalDetails WHERE userid='%s'",$userId);

				$results=$conn->query($sql);

				if(!$results)
				{
					echo 12;
					exit();
				}
				else
				{
					$row=$results->fetch_array();
				}

				if($row['postApplied']==1)
				{
					$post="Office Assistant";
				}
				else if($row['postApplied']==2)
				{
					$post="Junior Assistant";
				}
				else if($row['postApplied']==3)
				{
					$post="Technical superintendent";
				}
				else if($row['postApplied']==4)
				{
					$post="Junior Technician";
				}
				else if($row['postApplied']==5)
				{
					$post="Junior Technical superintendent";
				}
				else if($row['postApplied']==6)
				{
					$post="Technical officer";
				}
				else if($row['postApplied']==7)
				{
					$post="Assistant registrar";
				}
				else if($row['postApplied']==8)
				{
					$post="Deputy registrar";
				}
				else if($row['postApplied']==9)
				{
					$post="Registrar";
				}
				else if($row['postApplied']==10)
				{
					$post="Assistant warden";
				}
				else if($row['postApplied']==11)
				{
					$post="Manager";
				}
				else if($row['postApplied']==12)
				{
					$post="Library Assistant";
				}


				$pdf->SetFont('Arial','B');
				$head = '1. Post Applied :                       ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');
				$pdf->Cell(10,10,$post);

				$photo="../../files/".$row['photo'];

				$pdf->Image($photo,160,57,30);

				$pdf->Ln();

				$pdf->SetFont('Arial','B');
				$head = '2. Name :                               ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');
				$pdf->Cell(10,10,$row['fullName']);
				//$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Arial','B');
				$head = '3. Date of birth :                      ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');
				$pdf->Cell(10,10,$row['dob']);

				$pdf->Ln();
				$pdf->SetFont('Arial','B');
				$head = '4.Nationality :                         ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');
				$pdf->Cell(10,10,$row['nationality']);

				$pdf->Ln();
				$pdf->SetFont('Arial','B');
				$head = '5. SEX :                                ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');
				if($row['sex']==1)
				{
					$gender="Male";
				}
				else
				{
					$gender="Female";
				}
				$pdf->Cell(10,10,$gender);

				$pdf->Ln();
				$pdf->SetFont('Arial','B');
				$head = '6. Category :                           ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');
				if($row['category']==1)
				{
					$category="SC";
				}
				else if($row['category']==2)
				{
					$category="ST";
				}
				else if($row['category']==3)
				{
					$category="OBC";
				}
				else if($row['category']==4)
				{
					$category="GEN";
				}
				$pdf->Cell(10,10,$category);

				$pdf->Ln();
				$pdf->SetFont('Arial','B');
				$head = '7. Person with disability :             ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');
				if($row['disabled']==1)
				{
					$d="YES";
				}
				else if($row['disabled']==2)
				{
					$d="NO";
				}
				$pdf->Cell(10,10,$d);

				$pdf->Ln();
				$pdf->SetFont('Arial','B');
				$head = '8. Current addresss :                   ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');
				$pdf->Cell(10,10,implode(",",explode("$%^",$row['currentAddress'])));

				$pdf->Ln();
				$pdf->SetFont('Arial','B');
				$head = '9. Permanent addresss :                 ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');
				$pdf->Cell(10,10,implode(",",explode("$%^",$row['permanentAddress'])));

				$pdf->Ln();
				$pdf->SetFont('Arial','B');
				$head = '10. Father name or spouse :             ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');
				$pdf->Cell(10,10,$row['parentName']);

				$pdf->Ln();
				$pdf->SetFont('Arial','B');
				$head = '11. Educational qualifications             ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');

				$pdf->Ln();

				$retrieve = sprintf("SELECT * FROM educationalqualifications where userId='%s'",$userId);

				$result =$conn->query($retrieve);;

				$num_rows2 = $result->num_rows;

				while($row = $result->fetch_array())
			  	{
					$sno1[] = $row['sno'];
					if($row['degree']==1)
					{
						$degree[]="Secondary";
					}
					else if($row['degree']==2)
					{
						$degree[]="Higher secondary";
					}
					else if($row['degree']==3)
					{
						$degree[]="Diploma";
					}
					else if($row['degree']==4)
					{
						$degree[]="B.E";
					}
					else if($row['degree']==5)
					{
						$degree[]="B.Com";
					}
					else if($row['degree']==6)
					{
						$degree[]="M.E";
					}
					else if($row['degree']==7)
					{
						$degree[]="M.Com";
					}
					// $degree[] = $row['degree'];
					$branch[]=$row['branch'];
					$insti[] = $row['university'];
					$yoe[] = $row['yoe'];
					$yol[] = $row['yol'];
					if($row['scoreType]']==1)
					{
						$scoreType[]="Percent";
					}
					else if($row['scoreType]']==2)
					{
						$scoreType[]="CG10";
					}
					else if($row['scoreType]']==3)
					{
						$scoreType[]="CG8";
					}
					else if($row['scoreType]']==4)
					{
						$scoreType[]="CG4";
					}
					// $scoreType[] = $row['scoreType'];
					$score[] = $row['score'];
			  	}

				$head = 'No. ';
				$sno_len = 2*strlen($head);
				$pdf->Cell($sno_len,10,$head,1,0);
				$head = '    Degree      ';
				$name_len = 2*strlen($head);
				$pdf->Cell($name_len,10,$head,1,0);
				$head = '       Branch      ';
				$branch_len = 2*strlen($head);
				$pdf->Cell($branch_len,10,$head,1,0);
				$head = '       Institution     ';
				$desig_len = 2*strlen($head);
				$pdf->Cell($desig_len,10,$head,1,0);
				$head = 'Entry ';
				$doj_len = 2*strlen($head);
				$pdf->Cell($doj_len,10,$head,1,0);
				$head = 'Leaving ';
				$dol_len = 2*strlen($head);
				$pdf->Cell($dol_len,10,$head,1,0);
				/*$head = 'Type   ';
				$per_len = 2*strlen($head);
				$pdf->Cell($per_len,10,$head,1,0);*/

				$head = 'Score ';
				$per_len = 2*strlen($head);
				$pdf->Cell($pers_len,10,$head,1,0);



				for($i=0 ; $i<$num_rows2; $i++)
				{
					$pdf->Ln();

					$pdf->Cell($sno_len,10,$sno1[$i],1,0);





					if(strlen($degree[$i]) > ($name_len/2-4))
					{
					$degree[$i] = substr($degree[$i],0,$name_len/2-4).'...';
					}

					$pdf->Cell($name_len,10,$degree[$i],1,0);


					if(strlen($branch[$i]) > ($name_len/2-4))
					{
					$branch[$i] = substr($degree[$i],0,$branch_len/2-4).'...';
					}

					$pdf->Cell($branch_len,10,$branch[$i],1,0);







					if(strlen($insti[$i]) > ($desig_len/2-8))
					{
						$insti[$i] = substr($insti[$i],0,$desig_len/2-8).'...';
					}
					$pdf->Cell($desig_len,10,$insti[$i],1,0);





					$pdf->Cell($doj_len,10,$yoe[$i],1,0);
					$pdf->Cell($dol_len,10,$yol[$i],1,0);
					if(strlen($scoreType[$i]) > ($per_len/2-8))
					{
						$scoreType[$i] = substr($scoreType[$i],0,$per_len/2-8);
					}
					// $pdf->Cell($per_len,10,$scoreType[$i],1,0);
					$pdf->Cell($pers_len,10,$score[$i],1,0);

				}

				$pdf->Ln();
				$pdf->SetFont('Arial','B');
				$head = '12. Additional qualifications             ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');

				$pdf->Ln();

				$retrieve = sprintf("SELECT * FROM additionalqualifications where userId='%s'",$userId);

				$result =$conn->query($retrieve);;

				$num_rows2 = $result->num_rows;
				$row=$result->fetch_array();
				$course=explode("$%^",$row['course']);
				// $degree[] = $row['degree'];
				$duration=explode("$%^",$row['duration']);
				$insti =explode("$%^",$row['organization']);
				$govt = explode("$%^",$row['govtapproved']);
				// $scoreType[] = $row['scoreType'];
				$scores = explode("$%^",$row['score']);

				$head = 'No. ';
				$sno_len = 2*strlen($head);
				$pdf->Cell($sno_len,10,$head,1,0);
				$head = '    Course      ';
				$course_len = 2*strlen($head);
				$pdf->Cell($course_len,10,$head,1,0);
				$head = '       Duration      ';
				$duration_len = 2*strlen($head);
				$pdf->Cell($duration_len,10,$head,1,0);
				$head = '       Organization     ';
				$org_len = 2*strlen($head);
				$pdf->Cell($org_len,10,$head,1,0);
				$head = 'Govt. Approved ';
				$govt_len = 2*strlen($head);
				$pdf->Cell($govt_len,10,$head,1,0);
				$head = 'Score ';
				$per_len = 2*strlen($head);
				$pdf->Cell($per_len,10,$head,1,0);



				for($i=0 ; $i<count($course); $i++)
				{
					$pdf->Ln();

					$pdf->Cell($sno_len,10,$i+1,1,0);





					if(strlen($course[$i]) > ($course_len/2-4))
					{
					$course[$i] = substr($course[$i],0,$course_len/2-4).'...';
					}

					$pdf->Cell($course_len,10,$course[$i],1,0);


					if(strlen($duration[$i]) > ($duration_len/2-4))
					{
					$duration[$i] = substr($duration[$i],0,$duration_len/2-4).'...';
					}

					$pdf->Cell($duration_len,10,$duration[$i],1,0);


					if(strlen($insti[$i]) > ($org_len/2-8))
					{
						$insti[$i] = substr($insti[$i],0,$org_len/2-8).'...';
					}
					$pdf->Cell($org_len,10,$insti[$i],1,0);



					if($govt[$i]==1)
					{
						$govt[$i]="Yes";
					}
					else
					{
						$govt[$i]="No";
					}

					$pdf->Cell($govt_len,10,$govt[$i],1,0);
					if(strlen($scoreType[$i]) > ($per_len/2-8))
					{
						$scoreType[$i] = substr($scoreType[$i],0,$per_len/2-8);
					}
					// $pdf->Cell($per_len,10,$scoreType[$i],1,0);
					$pdf->Cell($per_len,10,$scores[$i],1,0);

				}


				$pdf->Ln();
				$pdf->SetFont('Arial','B');
				$head = '13. Experience            ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');

				$pdf->Ln();

				$retrieve = sprintf("SELECT * FROM experience where userId='%s'",$userId);

				$result =$conn->query($retrieve);;

				$num_rows2 = $result->num_rows;

				while($row = $result->fetch_array())
			  	{
					$sno1[] = $row['sno'];
					$organization[] = $row['organization'];
					$designation[]=$row['designation'];
					$fr[] = $row['fromDate'];
					$to[] = $row['toDate'];
					$top[] = $row['totalpay'];
					$now[] = $row['natureOfWork'];
			  	}

				$head = 'No. ';
				$sno_len = 2*strlen($head);
				$pdf->Cell($sno_len,10,$head,1,0);
				$head = '   Organization   ';
				$org_len = 2*strlen($head);
				$pdf->Cell($org_len,10,$head,1,0);
				$head = '    Designation   ';
				$des_len = 2*strlen($head);
				$pdf->Cell($des_len,10,$head,1,0);
				$head = '   From    ';
				$from_len = 2*strlen($head);
				$pdf->Cell($from_len,10,$head,1,0);
				$head = '    To    ';
				$to_len = 2*strlen($head);
				$pdf->Cell($to_len,10,$head,1,0);
				$head = '      Total pay    ';
				$top_len = 2*strlen($head);
				$pdf->Cell($top_len,10,$head,1,0);
				$head = 'Nature of work ';
				$now_len = 2*strlen($head);
				$pdf->Cell($now_len,10,$head,1,0);

				for($i=0 ; $i<$num_rows2; $i++)
				{
					$pdf->Ln();

					$pdf->Cell($sno_len,10,$sno1[$i],1,0);

					if(strlen($organization[$i]) > ($org_len/2-4))
					{
						$organization[$i] = substr($organization[$i],0,$org_len/2-4).'...';
					}

					$pdf->Cell($org_len,10,$organization[$i],1,0);


					if(strlen($designation[$i]) > ($des_len/2-4))
					{
						$designation[$i] = substr($designation[$i],0,$des_len/2-4).'...';
					}

					$pdf->Cell($des_len,10,$designation[$i],1,0);
					$pdf->Cell($from_len,10,$fr[$i],1,0);

					$pdf->Cell($to_len,10,$to[$i],1,0);
					if(strlen($top[$i]) > ($top_len/2-8))
					{
						$top[$i] = substr($top[$i],0,$top_len/2-8).'...';
					}
					$pdf->Cell($top_len,10,$top[$i],1,0);
					$pdf->Cell($now_len,10,$now[$i],1,0);

				}

				$sql=sprintf("SELECT * FROM otherDetails WHERE userId='%s'",$userId);

				$result=$conn->query($sql);

				$row=$result->fetch_array();

				$pdf->Ln();
				$pdf->SetFont('Arial','B');
				$head = '14. Present employment :                      ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');
				$pdf->Cell(10,10,$row['presentEmployment']);

				$pdf->Ln();
				$pdf->SetFont('Arial','B');
				$head = '15. Nature of work :                          ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');
				$pdf->Cell(10,10,$row['natureOfWork']);

				$pdf->Ln();
				$pdf->SetFont('Arial','B');
				$head = '16. Time reuqired to join :                   ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');
				$pdf->Cell(10,10,$row['timeRequiredToJoin']);


				$pdf->Ln();
				$pdf->SetFont('Arial','B');
				$head = '17. Referee Details                           ';
				$pdf->Cell(2*strlen($head),10,$head,0,0);
				$pdf->SetFont('Arial');

				$pdf->Ln();

				$retrieve = sprintf("SELECT * FROM referredetails where userId='%s'",$userId);

				$result =$conn->query($retrieve);;

				$num_rows2 = $result->num_rows;
				$row=$result->fetch_array();
				$names=explode("$%^",$row['referreeName']);
				// $degree[] = $row['degree'];
				$desgs=explode("$%^",$row['referreeDesignation']);
				$adds =explode("$%^",$row['referreeAddress']);
				$phones = explode("$%^",$row['referreePhone']);
				// $scoreType[] = $row['scoreType'];
				$emails = explode("$%^",$row['referreeEmail']);

				$head = 'No. ';
				$sno_len = 2*strlen($head);
				$pdf->Cell($sno_len,10,$head,1,0);
				$head = '    Name      ';
				$name_len = 2*strlen($head);
				$pdf->Cell($name_len,10,$head,1,0);
				$head = '  Designation  ';
				$desgs_len = 2*strlen($head);
				$pdf->Cell($desgs_len,10,$head,1,0);
				$head = '       Address     ';
				$add_len = 2*strlen($head);
				$pdf->Cell($add_len,10,$head,1,0);
				$head = 'Phone            ';
				$phone_len = 2*strlen($head);
				$pdf->Cell($phone_len,10,$head,1,0);
				$head = 'Email                    ';
				$email_len = 2*strlen($head);
				$pdf->Cell($email_len,10,$head,1,0);



				for($i=0 ; $i<count($names); $i++)
				{
					$pdf->Ln();

					$pdf->Cell($sno_len,10,$i+1,1,0);

					if(strlen($names[$i]) > ($name_len/2-4))
					{
						$names[$i] = substr($names[$i],0,$name_len/2-4).'...';
					}

					$pdf->Cell($name_len,10,$names[$i],1,0);


					if(strlen($desgs[$i]) > ($desgs_len/2-4))
					{
						$desgs[$i] = substr($desgs[$i],0,$desgs_len/2-4).'...';
					}

					$pdf->Cell($desgs_len,10,$desgs[$i],1,0);


					if(strlen($adds[$i]) > ($add_len/2-8))
					{
						$adds[$i] = substr($adds[$i],0,$add_len/2-8).'...';
					}
					$pdf->Cell($add_len,10,$adds[$i],1,0);

					$pdf->Cell($phone_len,10,$phones[$i],1,0);
					$pdf->Cell($email_len,10,$emails[$i],1,0);

				}


				$pdf->Output();
			}
			else
			{
				echo '<script>alert("Your form is not complete");window.location.href="../../declaration.php";</script>';
			}
	}






?>