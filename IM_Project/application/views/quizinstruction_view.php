<div style="height: 80px;"></div>
<div class="container">
	<section id="main-content">
	<section class="wrapper">
	<div class="row">
	<div class="row mt">
		
	
	
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Exam Instructions</h2></div>
					<div class="panel-body">
						<h3>Before beginning the exam:</h3><br>
							<ol>
								<li>Make sure you have good internet connection.</li>
								<li>Use of any browser is applicable.</li>
								<li>Maximize your browser window before starting the test.</li>
								<li>When you begin the exam click the button once.</li>

							</ol>
						<h3>During the Exam:</h3><br>
							<ol>
								<li>Do not resize (minimze) the browser during the test.</li>
								<li>Never click the "Back" button on the browser. This will take you out of the test </li>
								<li>Click the "Submit" button to submit your exam.  Do not press "Enter" on the keyboard to submit the exam.</li>
								
							</ol>	
						<h3>Instruction for accessing the  Exam.</h3>
							<ol>
								<li>Read the notes above before beginning the exam and during the exam.</li>
								<li>Your Instructor Will open and close the exam within the specif time span he/she set.</li>
								<li>When ready click the "Next" button.</li>
								<li>The exam must be completed in one sitting. You can open it once.</li>
								<li>Answer all questions in the exam.</li>
								<li>Click the "Submit" button when you are done to submit your work.</li>

							</ol>		

						<h4>If you encounter problems accessing or submitting your exam, you must contact your instructor immedetialy.</h4>
						<br>
						          		<table>

			<tr><td>Quiz Name:  <?php echo $quiz_info->quiz_name; ?><td>
			<tr><td>Description:  <?php echo $quiz_info['quiz_desc']; ?><td>
			<tr><td>Total No of Questions:  <?php echo $quiz_info['quiz_total_score']; ?><td>
			<tr><td>Passing Score:  <?php echo $quiz_info['quiz_pass_score']; ?><td>

	
	<?php
	
	 $total_pts= 0;

	
	foreach($questions as $row) {

	$total_pts += $row['quiz_pts'];

	}

?>

	


<tr><td>Total Points:<?php echo $total_pts; ?>


		</table>
						<a href="<?php echo site_url('IM/quizchoices'); ?>"><input class="btn btn-primary btn-lg pull-right" type="button" value="Next"/></a>
					</div>
			</div>


	</div>
	</div>
	</section>
	</section>
</div>