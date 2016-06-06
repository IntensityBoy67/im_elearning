<style type="text/css">.entry:not(:first-of-type)
    {
        margin-top: 10px;
    }

    .glyphicon
    {
        font-size: 12px;
    }
    #filehere{
        width:  500px;
    }
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
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
    #lectable{
        background-color: #fff;
    }
</style>
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css" />

<script>

$("document").ready(function(){
	
		$("#table_lec").dataTable();
	
});

</script>
<div style="margin-top:8%;"></div>
<div class="container">

 <?php 
				
				$this->load->model("InstructorModel"); 
				$teach_model = new InstructorModel();
				
				?>


    <div class="container">
        <div class="row well">
            <div class="jumbotron" id="ju" style="text-align:center;color:#2F7EC1;">

                <h1> Quiz Name:<?php 
					
						echo $quiz_info['quiz_name'];

				
				?></h1>
				
				<h1>Total Score: <?php 

				echo $teach_model->sum_quiz($quiz_id)[0]->quiz_pts; ?> points</h1>
				
	</div>
                                          
				<?php 
											
											if(!empty($quiz_taken)){
											?>

											<br>
										  
										  <table id = "table_lec" class= " datatable1 table table-bordered">
										  <thead>
										  <tr>
										
											<th>User Name
											<th>Total Score
											<th>Date Taken
											<th>Remarks
											<th>Action
												
											
 											</thead>
											
											
											<tbody>
											<?php
											
											$passed=0;
											$failed=0;
											
											foreach($quiz_taken as $row) { 
											
												//$quiz_info = $teach_model->loadQuizInfo($quiz_id);

											?>
											
											<tr>
											<td><?php echo $row['quiz_taken_user_id']; ?></td>
											<td ><?php echo $row['quiz_tot_score']; ?></td>
											<td><?php 
											
											  $php_date= strtotime($row['quiz_taken_timestamp']);
			 
										echo date("M d, Y H:m", $php_date);
									  
									  
											?></td>
											
											<td> <?php 
												
												$quiz_info = $teach_model->loadQuizInfo($row['quiz_id']);
												
											if($row['quiz_tot_score'] >= ($row['quiz_max_scores'] / (100 / $quiz_info['quiz_pass_percent']))) {
												echo "<p class = 'text text-success'>Passed</p>";
												$passed++;
											}
											else{
												
												echo "<p class = 'text text-danger'>Failed</p>";
												
												$failed++;
											}
											
											?>
									
											<td><?php echo '<a href= "ViewQuizInfoStud?quiz_id='.$quiz_id.'">View Quiz</a>'; ?></td>
											
 											
											<?php }

											?>
											
											</tbody>
											
										  </table>
										  

                           <h4>No. of Passers: <?php echo $passed; ?></h4>
                           <h4>No. of Failed: <?php echo $failed; ?></h4>
							<h4>Not Yet Taken: <?php if($no_enrollees-($passed+$failed) >=0) echo $no_enrollees-($passed+$failed); else echo 0; ?></h4>
						   </div>
						   <?php 
						   
											}else echo "No Student has taken yet!";

						   ?>
                                  </div>
                              </div>
           </div>
        </div>
      </div>
    </div>
 </div>
                       
                   






</body>



