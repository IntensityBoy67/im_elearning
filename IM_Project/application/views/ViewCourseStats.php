 
<div style="height: 50px;"></div>
<div class="container">

   
        <section class="wrapper">
            <div class="row">
                <div clas="col-md-12">
				
			 
										
<h2> Quizzes Taken By Course <?php echo $course_info['CourseName'];


					if(!empty($quiz_taken_lists)){

					?></h2>
 
	
					<table class="table table-condensed table-bordered table-responsive">
						<thead style="background-color:#31B0D5; ">
							<tr>
								<th style="color:#fff;">Lecture Title</th>
								<th style="color:#fff;">Quiz Name</th>
 								<th style="color:#fff;">Date Taken</th>
								<th style="color:#fff;">Your Points</th>
								<th style="color:#fff;">Quiz Total Points</th>
								<th style="color:#fff;">Passing Points</th>
								<th style="color:#fff;">Remark</th>
							</tr>

						</thead>
						<tbody>
						
						<?php 

						$this->load->model("UserModel");
												
						$stud_model = new UserModel();
						
								foreach($quiz_taken_lists as $row){ 
						
						$lec_info= $stud_model->getLecInfo($row['lec_video_id']);
						?>
						
						
							<tr>
							
							
				<td><a href= "<?php echo 'cont_presentation?id='.$row['quiz_id']; ?>"><?php echo $lec_info['lec_title']; ?></a></td>
				
				<td style = "width: 130px;">
				
				
					<a href= "<?php echo 'ViewQuiz?quiz_id='.$row['quiz_id']; ?>">
					
					<?php
						
					 

					echo $row['quiz_name']; ?>
					
					</a>
				
				</td>
				
				
 				<td style = "width: 130px;"><?php 	$php_date= strtotime($row['quiz_taken_date']);
			 
					echo date("M d, Y", $php_date);
			
				?>
				</td>
				<td><?php 
				
				echo $row['quiz_tot_score']; 
				
					
				
				?>
				
				</td>
					<td><?php 
				
				echo $row['quiz_max_scores']; 
				
					
				?>
				
				<td class= 'text text-info'><?php 
				
				if($row['quiz_max_scores'] >= 1)
					echo ($row['quiz_pass_percent']/100)*$row['quiz_max_scores']; //*Passing Score 
				
				else
					echo "0";
					
				
				
				?>
				
			
				
					
				<td><?php 
				
				if($row['quiz_max_scores'] >= 1){
						
					if(round($row['quiz_tot_score']/$row['quiz_max_scores'] * 100) >= $row['quiz_pass_percent'])
			
						echo "<span class= 'text text-success'>Passed</span>";
					
					else

						echo "<span class= 'text text-danger'>Failed</span>";
				}else 
						echo "<span class= 'text text-danger'>Failed</span>";

				?>
				
				
  				<!-- <td><p class= 'label label-danger'><?php ($row['quiz_tot_score']/$row['quiz_max_scores']) >= ($row['quiz_tot_score']/$row['quiz_max_scores'])/$row['quiz_pass_percent']; ?></th> -->
				
				
							</tr>	
							
		<?php 			} 
		
					?>
							</tr>	
						</tbody>

					</table>
					<a class = "btn btn-primary" href= "<?php echo 'print_quiz_taken_lists?course_id='.$this->input->get('course_id').'&username='.$username; ?>" >Print Quiz Taken List</a>

<?php }else echo "<br>Course Has Student Quiz Taken Yet!"; ?>
 
<br><br>

            
                </div>


            </div>

        </section>






</div>