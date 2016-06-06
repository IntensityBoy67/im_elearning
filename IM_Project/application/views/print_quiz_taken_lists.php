<?php


	class PDF extends FPDF{

	public $course_title, $course_open;
	
	function Header() {
  
			//Logo

			 //Arial bold 15
			$this->SetFont('Arial','B',15);
			//Move to the right
			$this->Cell(80);
			//Title
			$this->Cell(30,45,'Quiz Taken Lists of '.$this->course_title,0,0,'C');

			
			//Line break
			$this->Ln(20);
			$this->SetFont('Arial','B',8);
			
			
				
				$date_opened= strtotime($this->course_open);
				 
				$date_opened=  date("M d, Y", $date_opened);

			$this->Cell(30,15,'Course Opened: '.$date_opened,0,0,'C');

				$this->Ln(20);

	} 

		// Load data
		 

		// Simple table	enrollees
		function BasicTable($data)
		{
			
		
								
		$stud_model = new UserModel();
		
		$this->SetFont('Arial','', 6);

		
		   //$this->Cell(40,7,"Lecutre Title",1, 0,'C');
		   
		   $this->Cell(50,7,"Quiz Name",1, 0,'C');
		   $this->Cell(50,7,"Date Taken", 1, 0,'C');
		   $this->Cell(20,7,"Your Points", 1, 0,'C');
		   $this->Cell(20,7,"Total Points", 1, 0,'C');
		   $this->Cell(20,7,"Passing Points", 1, 0,'C');
		   $this->Cell(20,7,"Remark", 1, 0,'C');

			 $this->Ln();
			 
			
			 

		$this->SetFont('Arial','', 7);

		for($i= 0; isset($data[$i]); $i++) //* Display Rows of the Table
			{
				
				$lec_info= $stud_model->getLecInfo($data[$i]['lec_video_id']);
				
				$php_date= strtotime($data[$i]['quiz_taken_date']);
				$quiz_taken_date= date("M d, Y", $php_date);
				
				if($data[$i]['quiz_max_scores'] >= 1)
					$pass_score=  ($data[$i]['quiz_pass_percent']/100)*$data[$i]['quiz_max_scores'];
				else 
					$pass_score = 0;
				
				
				if($data[$i]['quiz_max_scores'] >= 1){
						
					if(round($data[$i]['quiz_tot_score']/$data[$i]['quiz_max_scores'] * 100) >= $data[$i]['quiz_pass_percent'])
			
						$remark = "Passed";
					
					else

						$remark = "Failed";
				}else 
						$remark = "Failed";


					
				//$this->Cell(50,6,$lec_info['lec_title'],1, 0,'C');
				$this->Cell(50,7,$data[$i]['quiz_name'],1, 0,'C');
				$this->Cell(50,7,$quiz_taken_date,1, 0,'C');
				$this->Cell(20,7,$data[$i]['quiz_tot_score'],1, 0,'C');
				$this->Cell(20,7,$data[$i]['quiz_max_scores'],1, 0,'C');
				$this->Cell(20,7,$pass_score ,1, 0,'C');
				$this->Cell(20,7,$remark ,1, 0,'C');
				
				$this->Ln();
			} 
			
			  	//* Display Columns of the Table
				 
				
				 
			 
			
			
		}

		// Page footer
		function Footer()
		{
			// Position at 1.5 cm from bottom
			$this->SetY(-15);
			// Arial italic 8
			$this->SetFont('Arial','I',8);
			// Page number
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}

		// Better table
		function ImprovedTable($header, $data)
		{
			// Column widths
			$w = array(40, 35, 40, 45);
			// Header
			for($i=0;$i<count($header);$i++)
				$this->Cell($w[$i],7,$header[$i],1,0,'C');
			$this->Ln();
			// Data
			foreach($data as $row)
			{
				$this->Cell($w[0],6,$row[0],'LR');
				$this->Cell($w[1],6,$row[1],'LR');
				$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
				$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
				$this->Ln();
			}
			// Closing line
			$this->Cell(array_sum($w),0,'','T');
		}

		// Colored table
		function FancyTable($header, $data)
		{
			// Colors, line width and bold font
			$this->SetFillColor(255,0,0);
			$this->SetTextColor(255);
			$this->SetDrawColor(128,0,0);
			$this->SetLineWidth(.3);
			$this->SetFont('','B');
			// Header
			$w = array(40, 35, 40, 45);
			for($i=0;$i<count($header);$i++)
				$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
			$this->Ln();
			// Color and font restoration
			$this->SetFillColor(224,235,255);
			$this->SetTextColor(0);
			$this->SetFont('');

			$fill = false;
			foreach($data as $row)
			{
				$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
				$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
				$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
				$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
				$this->Ln();
				$fill = !$fill;
			}
			// Closing line
			$this->Cell(array_sum($w),0,'','T');
		}
	}

		$pdf = new PDF();
		$pdf->course_title= $course_info['CourseName'];
		$pdf->course_open= $course_info['Date_release'];

				$pdf->AddPage();

		
 		
		//* $pdf->Cell(0,0,':  '. date("M d Y"));

		
	//*	$pdf->AliasNbPages();

//*$pdf->Image('http://chart.googleapis.com/chart?cht=p3&chd=t:60,40&chs=250x100&chl=Hello|World',60,30,90,0,'PNG');
 
 
 			$i= 0;
			$enrollee_infos = array();
			
			
	
		$pdf->Image('logo/logo_side.png',10,10, 50);
			
		$pdf->Image('logo/logo_bg.png',0,15,-100);
		
		
		$pdf->BasicTable($quiz_taken_lists);

		$pdf->SetFont('Arial','', 7);

		$pdf->Cell(0,10,'Date Printed:  '. date("M d Y"));


		$pdf->Output();


?>