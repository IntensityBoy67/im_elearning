 
<div style="height: 50px;"></div>
<div class="container">


        <section class="wrapper">
            <div class="row">
                <div clas="col-md-12">
			
			<style>
			.label { 
			display: block; width: 100px; 
			}
 
			 </style>
					
<h2><b>Student Evaluation<b></h2> <br>
	<div class="table-responsive">
        <table class=" table table-responsive">
                        <thead style="background-color:#0080BC;">
						
							
  <tr>
                       
                        <th style="color:#fff;">Course ID</th>
                        <th style="color:#fff;">Course Name</th>
                        <th style="color:#fff;">Quizzes Taken</th>
						<th style="color:#fff;">Total Quiz Points</th>								
                        <th style="color:#fff;">No. of Quiz Passed</th>	
                        <th style="color:#fff;">Remarks</th>
                        <th style="color:#fff;">Action</th>

											

                        </thead>
                        <tbody>
                            
	<?php 
	
	$this->load->model("UserModel");
		$p= new UserModel();
		
								$count_course_quizes = 0; 
								$count_stud_quiz_taken = 0; 
								$stud_passing = 0;
								$sum_stud_scores = 0; 
								$sum_course_scores = 0; 
 
								
 		
	foreach($eval_lists as $row_eval){
				
				$course_quizzes = $p->count_quiz_by_course($row_eval['course_id']);
				 				
				$stud_quiztaken= $p->count_quiz_taken($this->session->userdata("username"), $row_eval['course_id']);
				
				$stud_total_scores = $p->get_totscore_bystud($this->session->userdata("username"), $row_eval['course_id'])['tot_score'];
				
				$course_quiz_passed = $p->count_quiz_course_passed($this->session->userdata("username"), $row_eval['course_id'])['count_passed'];
				
				$course_total_scores = $p->get_totscore_bycourse($row_eval['course_id'])['course_max_scores'];
				
				
				
					if($course_total_scores != 0)
	 			$stud_percentage= number_format(($stud_total_scores/$course_total_scores)* 100, 2);
			
			else 
				$stud_percentage = 0;
			
			
 	?>
	
                                <tr>
                                <td><?php echo $row_eval['course_id']; ?>
								<td><?php $course_info= $p->getCourseInfo($row_eval['course_id']); 
								
								echo $row_eval['CourseName'];
							
								
								?>
								
								<td>
								<?php 
								
								echo $stud_quiztaken. "/".$course_quizzes; 
								
								$count_course_quizes+= $course_quizzes; 
								$count_stud_quiz_taken += $stud_quiztaken; 
								
								$sum_stud_scores += $stud_total_scores; 
								$sum_course_scores += $course_total_scores; 
								
 
								
								?>
								
								<td><?php 
								
							if($stud_total_scores != 0)	
							
								echo $stud_total_scores."/".$course_total_scores; 
							
							else echo 0;	

								
								if($course_total_scores!= 0)
								 echo " <span> (".number_format(($stud_total_scores/$course_total_scores)* 100, 2 )."%)</span>";
							else
								 echo " (0.00%)";
							
							if($course_total_scores != 0)
								$stud_percentage = number_format(($stud_total_scores/$course_total_scores)* 100, 2 );
								
							
								?> 
								
								<td>
								
										<?php 
										
										echo $course_quiz_passed; 
										
										?> 
										
								<td> 
								
								
								 
								
								<?php 
								
								
	if($stud_quiztaken >=1 && $stud_percentage != 0) 
	{
		
		if($stud_percentage >= 90 && $stud_percentage <= 100)
			echo "<span class = 'label label-success label-primary'>Outstanding</span>";	
		
		else if($stud_percentage >= 75 && $stud_percentage <= 89)
			echo "<span class = 'label label-primary' >Excellent</span>";	
				
		else if($stud_percentage >= 50 && $stud_percentage <= 74)
			echo "<span class = 'label label-info' >Good</span>";	
		
				
		else if($stud_percentage >= 35 && $stud_percentage <= 50)
			echo "<span class = 'label label-warning' >Poor</span>";	
				
		else if($stud_percentage >= 0 && $stud_percentage <= 34)
			echo "<span class = 'label label-danger' '>Very Poor</span>";	
	}else 
		
		echo "<p class = 'text text-danger'>N/A</p>";
								
									?>
								
		<td><a class = 'btn btn-primary' href= "<?php echo 'ViewCourseStats?course_id='.$row_eval['course_id'];?>">View</a>

								
                                    
                                </tr>	
	<?php } ?>
	
                                  
						</tbody>
						
						</table>
					</div>	
						<br><br>
						
						<h4>Accumulated Points: <?php echo $sum_stud_scores; ?>  Maximum Points of All Quiz Taken: <?php echo $sum_course_scores; ?> </h4>
						<h4>Overall Performance Progress: <?php if($count_stud_quiz_taken == 0) echo  0; else echo number_format(($count_course_quizes/$count_stud_quiz_taken) * 10, 2); ?>
						
						<h4>Overall Performance Percentage: <?php if($sum_course_scores == 0) echo  0; else echo  number_format(($sum_stud_scores /$sum_course_scores ) * 100)."%"; ?>
						
						<h4>Overall Passing Rate: <?php if($count_stud_quiz_taken == 0) echo  0;  else echo  number_format(($stud_passing /$count_stud_quiz_taken) * 100, 2)."%"; ?>
							
						<!--<h4>Performance Performance Index: <?php echo  number_format(($count_course_quizes/$count_stud_quiz_taken) * 10, 2); ?> -->

						
						<br><br>
						
						<h4>Corresponding Remarks Based on Average Percentage: </h4>
<br>
<table class= 'table table-striped'>
<tr><td> 90-100%: <td><span class = 'remark_class'><p class = 'label label-success label-primary'>Outstanding</p></h4>
<tr><td> 75-89%: <td><span class = 'remark_class'><p class = 'label label-primary'>Excellent</p></h4>
<tr><td> 50-74%: <td><span class = 'remark_class'><p class = 'label label-info'>Good</h4>
<tr><td>35-50%: <td><span class = 'remark_class'><p class = 'label label-warning'>Poor</h4>
<tr><td> 0%-34%: <td><span class = 'remark_class'><p class = 'label label-danger'>Very Poor</h4>
</table>
<br><br>
            
                </div>


            </div>

        </section>




</div>