<?php 


if(isset($quiz_msg)){

	echo $quiz_msg;
	
 	
}




if($flag == 1){ 
$this->load->view('HeaderBootstrap2');
    $this->load->view('NavUser');

?>


 <div>

<div style="height:100px; "> </div> 
 <div class="container" style ="width:700px; text-align:center;">

 	<div class="panel panel-primary">
 		<div class="panel-heading">
 			<h1>You finished the Quiz already!</h1>
			
 			<br>
             <h3><a href= "<?php echo 'ViewQuiz?quiz_id='. $this->input->get('quiz_id'); ?>">Click Here for the Results! </a> </h3>
        

		</div>
	</div>

</div>
</div>

<div style="height: 450px;"></div>

<?php

    $this->load->view('footerUser');
    exit;
}

?>

<script  type = "text/javascript" src = "<?php echo base_url('js/jquery.min.js'); ?>"></script>

          <section class="wrapper">
             <div class="col-lg-12">

              <div class="row">

              
<input type = "hidden" value =" <?php echo $quiz_info['quiz_time_limit']; ?>" id="time_limit" />

<script>

var x;


$("document").ready(function(){


    $("input[type='radio']").change(function(){

        x= $(this).val();

    });




	$("input[name='subm_ans']").click(function(){

 	 

		if($("input[name='quiz_answer']").val() != ''){


 
			$.post("InsertAns", {

				subm_ans: 1,		
				quiz_answer: x,
				quiz_quest_id: $("#quiz_quest_id").val(),
				quiz_cor_ans: $("#quiz_cor_ans").val(),
				quiz_pts: $("#quiz_pts").val()



			}, 

			function(data){

 				$("#quiz_container").html(data);

			});


 	
 		}

	});




});

var myVar = setInterval(function(){ myTimer() }, 1000);
var time_limit = (document.getElementById("time_limit").value * 60); //* Minutes * number of secs.
//*FOr testing purposes->time_limit = 15;

if(time_limit != 0)
alert("You have only "+time_limit+" seconds to finish! Good Luck Captain! HAHAH");


function myTimer() {

	if(time_limit <= 10)

   document.getElementById("time").innerHTML = "<span class ='label label-danger'>" + time_limit+ "</span>";

	
	else
   document.getElementById("time").innerHTML = time_limit;


  time_limit--;

  if(time_limit == -1){
  	  	
  	  	document.getElementById("quiz_container").innerHTML="<h2><p class= 'label label-success'>Time is Up!</p></h2>";
  	  	document.getElementById("ViewQuizLink").style = "visibility:visible";
  	  	clearInterval(myVar);
  }

}



 </script>
<div style="height:100px;"> </div> 
 <div class="container">




 <div>
 	<div class="panel panel-primary">
 		<div class="panel-heading">

 			<?php if($quiz_info['quiz_time_stat'] == "Y") { ?>

 			 <h2>Time Left: <span id="time"></span></h2>

 			 <?php } ?>

 			<h2>Quiz Name: <?php echo $quiz_info['quiz_name']; ?></h2>
 			<h2><a style = "visibility: hidden" id =  "ViewQuizLink" href= "<?php echo 'ViewQuiz?quiz_id'.$this->input->get('quiz_id'); ?>">Click For The Result! </a></h2>
 		</div>

		<?php if(isset($data_msg)){
			echo "Quiz is not available";
			
		exit;
		}
		?>


 	<div class="panel-body" id = "quiz_container">
	
		<h4>Question <?php $index= $this->session->userdata('quiz_cnt')['cur_index']; 
		echo $index+1;
		//* echo $quiz_info[]; ?> out of 
			<?php echo $this->session->userdata('quiz_info')['num_quests']; 

			$quest_info = $this->session->userdata('questions');

			?></h4><br><br>


		<?php 

 
		$question_info = $quest_info[$index]; 


		?>

		<h4>Question: <?php echo $question_info['question']; ?></h4><br>
		


 
<table><tr>


<td ><input type = "radio" value = "A" name = "quiz_answer" />
<td style="width:15%;"><?php echo 'A).&nbsp; '. $question_info['A']; ?> 

<?php if(!empty($question_info['choice_img'])) { ?>

	<td><img src= "<?php echo 'data:image/jpeg;base64, '. base64_encode($question_info['choice_img']); ?>" width= "150" height= "150"/> 


<?php } ?>
<td style="width:2%;"><input type = "radio" value = "B" name = "quiz_answer" />
<td ><?php echo 'B).&nbsp; '. $question_info['B']; ?> 

<?php if(!empty($question_info['choice_img'])) { ?>

	<td><img src= "<?php echo 'data:image/jpeg;base64, '. base64_encode($question_info['choice_img']); ?>" width= "150" height= "150"/> 


<?php } ?>
<td><input type = "radio" value = "C" name = "quiz_answer" />
<td><?php echo 'C).&nbsp; '. $question_info['C']; ?> 

<?php if(!empty($question_info['choice_img'])) { ?>

	<td><img src= "<?php echo 'data:image/jpeg;base64, '. base64_encode($question_info['choice_img']); ?>" width= "150" height= "150"/> 


<?php } ?>



<td><input type = "radio" value = "D" name = "quiz_answer" />
<td><?php echo 'D).&nbsp; '. $question_info['D']; ?> 

<?php if(!empty($question_info['choice_img'])) { ?>

	<td><img src= "<?php echo 'data:image/jpeg;base64, '. base64_encode($question_info['choice_img']); ?>" width= "150" height= "150"/> 


<?php } ?>

		
				</table>
		<div style="padding-top:15px;">
		<h4>
			Points: <?php echo $question_info['quiz_pts']; ?>
		</h4>
		</div>
<br /> <br />

		<input type = "hidden" value = "<?php echo $question_info['quiz_quest_id']; ?>" name = "quiz_quest_id" id= "quiz_quest_id"/>
		<input type = "hidden" value = "<?php echo $question_info['quiz_cor_ans']; ?>" name = "quiz_cor_ans" id= "quiz_cor_ans"/>
		<input type = "hidden" value = "<?php echo $question_info['quiz_pts']; ?>" name = "quiz_pts" id= "quiz_pts"/>

		<input type = "button" name = "subm_ans" class = "btn btn-info" value = "Submit Answer" />

 
		

		</div> <!-- end of id container -->


</div>	<!-- end of class container -->	
</div><!-- panel primary-->
</div>
	</div>
	</div>
	</section>


