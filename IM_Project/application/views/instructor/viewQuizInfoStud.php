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
 


<body>
<div style="height: 100px;"></div> <!-- For Margin -->

	
	<div class="container" style="margin-left: 250px;">
		<div class="form-group" >

			<?php 
   			if(isset($quiz_id) && empty($quiz_id)){
				
				?>

			<h2>Quiz is not Yet Taken!</h2><br><br><br>
			<h4><a class= 'btn btn-info' href= "<?php echo 'quizinstruction?quiz_id='.$this->input->get('quiz_id'); ?>">Take Quiz Now!</a></p></h4>	

		</div>
	</div>
</body>

				<?php

 			}else if(isset($quiz_id) && !empty($quiz_id)){
			?>

			<h2>Quiz Name: <?php echo $quiz_info['quiz_name']; ?><br>
			Passing Percentage:  <?php echo $quiz_info['quiz_pass_percent'].'%';  ?>
		</h2>
		<h4>Green: Correct </h4>
 		<h4>Red: Wrong </h4>
<!-- Load Questions -->



			<table class= "table table-condensed table-bordered" style= " width: 950px;">
			
				 <thead>
				<th>No.</th>
				<th>Question</th>
				<th>Points</th>
				<th>Choices</th>
				<th>Your Answer</th>

				 </thead>

				 <tbody>

<?php

		$this->load->model("UserModel");
					$this->load->model("InstructorModel");
					$user_model= new UserModel();
					$teach_model= new InstructorModel();


		$i = 1;
		$total_pts = 0;
		$sum_quiz_pts =0;
	 foreach($questions as $row) { 

	  ?>


					<tr><td><?php echo $i; ?>
					<td><?php echo $row['quiz_question']; ?>
					<td><?php echo $row['quiz_pts']; ?>
					<td><ul>

						<?php echo "<li> A.) ".$row['A']."</li>"; ?>
						<?php echo "<li> B.)".$row['B']."</li>"; ?>
						<?php echo "<li> C.)".$row['C']."</li>"; ?>
						<?php echo "<li> D.)".$row['D']."</li>"; ?>

					<td><?php
							//* Load the Answer of the Student!
			
					
					$ans= $teach_model->get_quest_answer($row['quiz_quest_id'])['quiz_answer'];
					
					

					$total_pts += ($row['quiz_cor_ans'] == $ans) ? $row['quiz_pts'] : 0;
					$p_class = ($row['quiz_cor_ans'] == $ans) ? "label label-success": "label label-danger";
					$sum_quiz_pts += $row['quiz_pts'];


					 echo '<p class= "'.$p_class.'">'.$ans.'</p>'; ?>
					 
						<br>
						 Correct Answer: <?php echo $row['quiz_cor_ans']; ?>


	<?php $i++;	 }

	?>
				 </tbody>

			</table>

						<h2>
							<?php 
	
								$pass_score = $sum_quiz_pts / (100 / $quiz_info['quiz_pass_percent']);

								if($total_pts >=$pass_score)
									echo "<p class= 'text text-success'>You Passed! </p><p>Your Total Points: <span class= 'label label-success'>". $total_pts." </span></p>";

								else {

								echo "<p class= 'text text-danger'>You Failed! Better Luck Next Time! </p><p>Your Total Points: <span class= 'text text-danger'>". $total_pts." "."/<span class = 'text text-danger'>". $sum_quiz_pts."</span>"; ?>
								
							 <h2>Passing Score: <td ><span class = 'text text-success'><?php echo intval(($pass_score)); ?></span></p></h2>
							 
							
							 
								<?php 
								}								
			}
			
			
							 ?>
							 
							 
						</h2>

		</div>


	</divssss>