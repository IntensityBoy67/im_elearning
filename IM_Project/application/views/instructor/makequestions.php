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
<script  type = "text/javascript" src = "<?php echo base_url('js/jquery.min.js'); ?>"></script>

	<script>

		$("document").ready(function(){

				$("#subm_type").change(function(){

					if($(this).val() == 2)
						$("input").prop('required', false);

				if($(this).val() == 1)
					$('input').prop('required', true);

				
			});

				$(".pts_class").change(function(){

					var x = $(".pts_class");

 						 

 				});

		});

	</script>


<body>
<div style="height: 100px;"></div>


<?php

 if($this->session->userdata('quiz_name') !== NULL){ ?>

<div class="container">
	<div class="row well">
		<div class="jumbotron" id="ju" style="text-align:center;color:#2F7EC1;">
			<h1>Upload Questions</h1>
		</div>			

		<h2>Quiz Name: <?php echo $this->session->userdata('quiz_name'); ?></h2>
		<h4>Questions:  <?php echo $this->session->userdata('quiz_num_quest'); ?> </h4>


 <form action = "InsertQuests" method="POST">

 

<table class= 'table table-bordered table-condensed'>
 


 <thead>
<th>No.</th>
<th>Question</th>
<th>Points</th>
<th>A</th>
<th>B</th>
<th>C</th>
<th>D</th>
<th>Correct Answers</th>

 </thead>


<tbody>

	<?php
	$num_quests = $this->session->userdata('quiz_num_quest');

	 for($i = 1; $i <= $num_quests; $i++) { ?>


<tr>
<td><?php echo $i; ?>

	<td>
		 <input type = "text" name = "quiz_question[]" required/>



<td>
		 
	<select name = "pts[]" class ="pts_class" required>
	<option value = 1>1</option>			
	<option value = 2 selected>2</option>		 		
	<option value = 3>3</option>								
	<option value = 4>4</option>
	<option value = 5>5</option>
	<option value = 6>6</option>
	<option value = 7>7</option>
	<option value = 8>8</option>
	<option value = 9>9</option>
	<option value = 10>10</option>
	</select>
<td><input type = "text" style= "width: 70px;" name = "A[]" required/></li>
<td><input type = "text" style= "width: 70px;" name = "B[]" required/></li>
<td><input type = "text" style= "width: 70px;" name = "C[]" required/></li>
<td><input type = "text" style= "width: 70px;"name = "D[]" required/></li>
 


<td><select name = "cor_ans[]" class= "cor_ans" required style= "width: 50px;">

 	<option value = "A">A</option>				
	<option value = "B">B</option>				
	<option value = "C">C</option>		 		
	<option value = "D">D</option>		


</select>

	<?php } ?>

 
</tbody>


</table>


<br>

Quiz Status: <select name = "quiz_stat" id = "subm_type">
	<option value = 1>Finish Quiz</option>
	<option value = 2>Save (Continue Later)</option>
</select>

<br><br>
<input type= "submit" class= "btn btn-success" name ="subm" class= "btn btn-success" value = "Submit Questions" />


</form>
 
 

		</div>
		</div>
	</section>
</section>



		</div>
	</div>

 <?php }else 
{/*
  $this->load->controller("Instructor");
  $p = new controller("instructor");
  $p->quiz_module();
*/
}

 ?>


	<div class="col-lg-12">
		<div class="form-group">


		</div>


	</div>	
</div>

</body>