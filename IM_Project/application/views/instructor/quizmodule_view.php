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

	<?php if(!empty($lec_info)) { ?>

<h4>Lecture Id: <?php echo $lec_info['lec_video_id']; ?></h4>
<h4>Lecture Name: <?php echo $lec_info['lec_title']; ?></h4>


<input class="form-control" type = "hidden" name = "lec_video_id" value = "<?php echo $lec_info['lec_video_id']; ?>" />
<input class="form-control" type = "hidden" name = "course_id" value = "<?php echo $lec_info['course']; ?>" />


<?php } ?>


<table>
<?php if(empty($lec_info)) { ?>
<tr>

	<td>Select a Course: </td>
	<td>


	<select class="form-control" id = "course_sel" name = "course_id"required>

	<option value = "">Select A Course</option>
	<?php foreach($courses as $row) { ?>
	<option value = "<?php echo $row['courseID']; ?>"><?php echo $row['CourseName']; ?></option>			
								
	<?php } ?>
		</select> 

	</td>
<tr>

<td>
		Select A Lecture: 
			<td  id = "lec_td">


			</td>
		
<?php } ?>


		<tr><td>Quiz Name: 
		<td><input class="form-control" type = "text" name="quiz_name" id = "quiz_name" value = "<?php if(!empty($lec_info)) echo "Quiz ".$lec_info['lec_title']; ?>" required />
		
		<tr><td>Description: 
		<td>
			<textarea rows="5" cols="30" class="form-control"  style = "resize:none;" name="quiz_desc" required/>


			</textarea>

			

		<tr><td>Number of Questions: 
		<td><select class="form-control " name = "quiz_num_quest" required>
			
				<option value = "5" >5</option>
				<option value = "6">6</option>
				<option value = "7">7</option>
				<option value = "8">8</option>
				<option value = "9">9</option>
				<option value = "10">10</option>
				<option value = "11">11</option>
				<option value = "12">12</option>
				<option value = "13">13</option>
				<option value = "14">14</option>
				<option value = "15">15</option>
				<option value = "16">16</option>
				<option value = "17">17</option>
				<option value = "18">18</option>
				<option value = "19">19</option>
				<option value = "20">20</option>
				<option value = "21">21</option>
				<option value = "22">22</option>
				<option value = "23">23</option>
				<option value = "24">24</option>
				<option value = "25">25</option>

		</select>


		<tr><td>Timed:
		<td>
			<select class="form-control" id = "timed" name = "quiz_time_stat" required>
			<option   value = "Y">Yes</option>
			<option   value = "N">No</option>			
			</select>
		
		<tr id = "time_limit"><td>Time Limit (Mins): 
		<td>
			<select class="form-control" name="quiz_time_limit" required>

				<option value = "3">3</option>
				<option value = "5">5</option>				
				<option value = "10">10</option>
				<option value = "15">15</option>
				<option value = "20">20</option>
				<option value = "25">25</option>

		</select> 
		 
		<tr id = "pass_score"><td>Passing Percentage:

		<td>
			<select class="form-control" name="quiz_pass_percent" required>

				<option value = "50">50%</option>
				<option value = "60">60%</option>				
				<option value = "70">70%</option>
				<option value = "80">80%</option>
				<option value = "90">90%</option>
				<option value = "100">100%</option>

			</select>
			

	
	


</table>


	<br><button class= "btn btn-success">Create Quiz</button>

</form>

		
		</div>
	</section>
</section>



<script>

$("document").ready(function(){

	$("#timed").change(function(){
		if($("#timed").val() == "Y"){
			$("#time_limit").show();
		}
		else
			$("#time_limit").hide();
	});
	
 
	$("#course_sel").change(function() {


		$.post("loadLecturesByQuiz", {course_id: $("#course_sel").val()}, function(data) {	

			$("#lec_td").html(data);

		});
		
		

	});


	
});

</script>

		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">


		</div>


	</div>	
</div>