<style type="text/css">
    #ju{
        border: solid 2px #2F7EC1;
    }

    .well{
        width: 80%;
        margin: 0 auto;
        background-color: #fff;
    }
    .required{
        color:red;
    }
    #ca{
        background-color: #fff;
    }
</style>
<div style="height: 100px;"></div>

<div class="container">
	<div class="row well">
		<div class="jumbotron" id="ju" style="text-align:center;color:#2F7EC1;">
			
			<h1>Create Quiz</h1>

		</div>


		

 <form action = "InsertQuizInfo" method="POST">

                <h1> List of Archived Quizzes</h1>
	
                                            <br>
										  <?php 
										  
											$this->load->model("InstructorModel"); 
											$teach_model = new InstructorModel();
											
											if(!empty($arch_quizzes)){
												
												
										?>
										  <table id = "table_lec" class= " datatable1 table table-bordered">
										  <thead>
										  <tr>
											<th>Quiz Id</th>
											<th>Quiz Name</th>
											<th>Quiz Questions</th>
											<th>Quiz Total Points</th>
											
											
 											</thead>
											
											
											<tbody>
											<?php 
												
												
												foreach($arch_quizzes as $row) {
												
												?>
												
												<td><?php echo $row['quiz_id']; ?></td>
												<td><?php echo $row['quiz_name']; ?></td>
												<td><?php echo $row['quiz_num_quest']; ?> </td>
												<td><?php echo $row['quiz_total_score']; ?> </td>

												<?php
												}
											
											}else echo "No Archives Quizzes Available!";
											
											?>

											
											</tbody>
											
											</table>
											<br><br>
											<a href= "<?php echo 'quizmodule?lec_id='.$this->input->get('lec_id'); ?>">Create New Quiz</a>
											
											
		</form>

		
		</div>
	</section>
</section>




		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">


		</div>


	</div>	
</div>