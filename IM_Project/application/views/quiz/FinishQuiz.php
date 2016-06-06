<script  type = "text/javascript" src = "<?php echo base_url('js/jquery.min.js'); ?>"></script>


          <section class="wrapper">
             <div class="col-lg-12">

              <div class="row">
              
		<h2>Quiz Summary</h2>


    			<table>

			<tr><td>Quiz Name:  <?php echo $quiz_info['quiz_name']; ?><td>
			<tr><td>Description:  <?php echo $quiz_info['quiz_desc']; ?><td>
			<tr><td>Total No of Questions:  <?php echo $quiz_info['quiz_num_quests']; ?><td>


			</table>

		<h4>Questions</h4>

		<table class = "table table-condensed">
		<tr><td>Question No.<td>Question<td>Type<td>Choices<td>Answer (opt)<td>Points

	<?php
		$this->load->model('Instructormodel');
		$teach_model = new Instructormodel();

	 $total_pts= 0;

	
	foreach($questions as $row) { ?>		
	<tr>
		<td><?php echo $row['quiz_quest_id']; ?>
		<td><?php echo $row['quiz_question']; ?>
		<td><?php echo $row['quiz_type_id']; ?>
		<td><ul>

		<?php
			$choices = $teach_model->loadquestchoices($row['quiz_quest_id']);



			 foreach($choices as $row_choices){ 
		?>
 
		<?php echo '<li>'. $row_choices['quiz_choice_let']. '.) '. 
				$row_choices['quiz_choice_desc']; ?>
		
		<?php } 

 
		
		?>
</ul>	
		<td><?php echo $row['quiz_cor_ans']; ?>
		<td><?php echo $row['quiz_pts']; $total_pts += $row['quiz_pts'];?>

	<?php } ?>


<tr><td><td><td><td><td>Total Points: <td><?php echo $total_pts; ?>
		</table>

	
		</div>

	</div>
	</section>




<script>


</script>
