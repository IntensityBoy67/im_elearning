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
<div style="height: 100px;"></div>


	<div class="col-lg-12">
		<div class="form-group">

			<h4>Quiz Name: <?php echo $quiz_info['quiz_name']; ?><br>
			Passing Percentage:  <?php echo $quiz_info['quiz_pass_percent'].'%';  ?>
		</h4>
 
<!-- Load Questions -->



			<table class= "table table-condensed table-bordered">
			
				 <thead>
				<th>No.</th>
				<th>Question</th>
				<th>Points</th>
				<th>A</th>
				<th>B</th>
				<th>C</th>
				<th>D</th>
				<th>Letter Correct Answer</th>

				 </thead>
				 <tbody>

<?php


		$i = 1;

	 foreach($questions as $row) { 

	  ?>


					<tr><td><?php echo $i; ?>
					<td><?php echo $row['quiz_question']; ?>
					<td><?php echo $row['quiz_pts']; ?>
					<td><?php echo $row['A']; ?>
					<td><?php echo $row['B']; ?>
					<td><?php echo $row['C']; ?>
					<td><?php echo $row['D']; ?>
					<td><?php echo $row['quiz_cor_ans']; ?>



	<?php $i++;	 }

	?>
				 </tbody>

			</table>

						Points: <?php echo $quiz_info['quiz_total_score']; ?><br> 

		</div>


	</div>