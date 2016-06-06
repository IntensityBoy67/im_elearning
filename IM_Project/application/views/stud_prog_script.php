 
<div style="height: 50px;"></div>
<div class="container">

    
        <section class="wrapper">
            <div class="row">
                <div clas="col-md-12">
				
		 
				<h2>Course Progress</h2>
                    <table class=" table table-responsive">
                        <thead style="background-color:#2F7EC1;">
						
											<th style="color: #fff;">Course ID</th>
											<th style="color: #fff;">Course Name</th>
											<th style="color: #fff;">Course Progress</th>
											<th style="color: #fff;">Total Lectures Viewed</th>
											<th style="color: #fff;">Last Date Viewed</th>
											<th style="color: #fff;">Action</th>	
											

                        </thead>
                        <tbody>
                            <?php
						
					$this->load->model("UserModel");			
					$stud_model = new UserModel();
 								
 								
                            foreach ($courses as $result) {
									
								$quiz_info=  $stud_model->loadQuizInfo($result['quiz_id']);

								
								$pass_score = $quiz_info['quiz_total_score']/ (100 / $quiz_info['quiz_pass_percent']);
								
                                ?>
                                <tr>
                               <td><?php echo $result['quiz_id']; ?>
                               <td><?php echo $result['quiz_taken_date']; ?>
							   <td><?php echo ($result['quiz_tot_score']>= $pass_score)? "Pass":"Fail"; ?>
								<td><?php echo $result['quiz_tot_score']."/".$quiz_info['quiz_total_score']; ?>
 								<td><?php echo $pass_score; ?>
								<td><a class = 'btn btn-primary' href= "<?php echo "ViewQuiz?quiz_id=".$result['quiz_id']; ?>">View</a>

								
                                    
                                </tr>	
                         
                        </tbody>

                    </table>
                </div>


            </div>

        </section>

   




</div>