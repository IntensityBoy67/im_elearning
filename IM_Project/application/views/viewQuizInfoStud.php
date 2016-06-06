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
   			if(isset($flag) && $flag == 0){
				
				?>

			<h2>Quiz is not Yet Taken!</h2><br><br><br>
			<h4><a class= 'btn btn-info' href= "<?php echo 'quizinstruction?quiz_id='.$this->input->get('quiz_id'); ?>">Take Quiz Now!</a></p></h4>	

		</div>
	</div>
</body>

				<?php

 			}else if($flag == 1){

			?>

			<h2>Quiz Name: <?php echo $quiz_info['quiz_name']; ?><br>
		
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


		$i = 1;
		$total_pts = 0;
		$sum_quiz_pts =0;
	 foreach($questions as $row) { 

	  ?>


					<tr><td><?php echo $i; ?>
					<td><?php echo $row['quiz_question']; ?>s
					<td><?php echo $row['quiz_pts']; ?>
					<td><ul>

						<?php echo "<li> A.) ".$row['A']."</li>"; ?>
						<?php echo "<li> B.)".$row['B']."</li>"; ?>
						<?php echo "<li> C.)".$row['C']."</li>"; ?>
						<?php echo "<li> D.)".$row['D']."</li>"; ?>

					<td><?php
							//* Load the Answer of the Student!
					$this->load->model("UserModel");
					$user_model= new UserModel();

					$answer_stud=  $user_model->loadQuestAns($row['quiz_quest_id'], $this->session->userdata('username'));
					$total_pts += ($row['quiz_cor_ans'] == $answer_stud['quiz_answer']) ? $row['quiz_pts'] : 0;
					$p_class = ($row['quiz_cor_ans'] == $answer_stud['quiz_answer']) ? "label label-success": "label label-danger";
					$sum_quiz_pts += $row['quiz_pts'];


					 echo '<p class= "'.$p_class.'">'.$answer_stud['quiz_answer'].'</p>'; ?>
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
									echo "<p class= 'text text-success'>You Passed! </p><br><p>Total Points: <span class= 'text text-success'>". $total_pts."</span></p>";

								else 
									echo "<p class= 'text text-danger'>You Failed! Better Luck Next Time! </p><br><p>Total Points: <span class= 'text text-danger'>". $total_pts."</span></p>";
								
			} 			 
			
			?>
						 
							
							 
			 
					 
	<h2>Passing Score (<span class = 'text text-success'><?php echo $quiz_info['quiz_pass_percent'].'%';  ?></span>):  <?php  echo intval(($pass_score)); ?> 
			 </h2>
							 
					<h2>Quiz Total: <td><?php echo $sum_quiz_pts; ?></h4>
		</h2>
		</div>


	</divssss>