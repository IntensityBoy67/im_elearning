<div style="height: 80px;"></div>
<div class="container">
	
	<section class="wrapper">
	<div class="row">
	<div class="row mt">
		
	
	
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Exam Instructions</h2></div>
					<div class="panel-body">
						<h2>Quiz Description</h2>
					<ul>
			    	 

						<li>Quiz Name:  <?php echo $quiz_info['quiz_name']; ?>
						<li>Description:  <?php echo $quiz_info['quiz_desc']; ?>
						<li>Total No of Questions:  <?php echo $quiz_info['quiz_num_quest']; ?>
						<li>Passing Percentage:  <?php echo $quiz_info['quiz_pass_percent']."%"; ?>

 					</ul>


						<h3>Before beginning the exam:</h3><br>
							<ol>
								<li>Make sure you have good internet connection.</li>
								<li>Use of any browser is applicable.</li>
								<li>Maximize your browser window before starting the test.</li>
								<li>When you begin the exam click the button once.</li>
								<li>Once the Quiz Has began, you cannot take the same quiz again... </li>

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
 						 

						<!-- <form method = "POST" action = "TakeQuiz"> -->

                            <br><a href=" <?php echo site_url('IM/TakeQuiz?quiz_id='. $quiz_info['quiz_id']); ?>" class="btn btn-primary btn-lg pull-right"/>Take Quiz</a> 

                          <!-- </form> -->

					</div>
			</div>


	</div>
	</div>
	</section>
	
</div>