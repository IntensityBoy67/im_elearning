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


<script>

		

</script>


<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
<div style="margin-top:8%;"></div>
<div class="container">



    <div class="container">
        <div class="row well">
            <div class="jumbotron" id="ju" style="text-align:center;color:#2F7EC1;">
            	<?php
            	$this->load->model('InstructorModel');
            	$p=  new InstructorModel();

            		$course_info = $p->getCourseInfo($this->input->get('course_id'));
            	 ?>
                <h1>Course <?php echo $course_info['CourseName']; ?></h1>
        </div>
                <h2>List of Enrollees</h2>

                            <table id="datatables" class="table table-hover" style="color:#111;">

                            <thead>
                            	
                           
                            	<th> Name</th>
                            	<th>Date Enrolled</th>
                            	<th>Date Completed</th>
								<th>Action<th>
								
                            </thead>
	<?php

	


	foreach($studs as $row){

		$stud_info= $p->getStudInfo($row['Email']);	


?>
                            	<tr>
                           
                            		<td><?php echo $stud_info['Fname']. ' '. $stud_info['Lname']; ?>
                            		<td><?php  
																		
									$php_date= strtotime($row['date_enrolled']);
									 
									echo date("M d, Y", $php_date);
			
				//* echo nice_date("2016-01-01", "M, d, Y");
				
							?>
							<td><?php  
									
									if($row['completion_date'] != NULL){
									$php_date= strtotime($row['completion_date']);
									 
									echo date("M d, Y", $php_date);
									
									}else echo "Not Yet Completed!";
			?>
									<td>
									<a href= "<?php echo 'ViewStudProg?course_id='.$this->input->get('course_id')."&username=".$row['username'];?>" class = 'btn btn-primary' style ="width:150px;">View Progress</a>
									<br><br><a href= "<?php echo 'ViewCourseStats?course_id='.$this->input->get('course_id')."&username=".$row['username'];?>" class = 'btn btn-info'  style ="width:150px;">View Evaluation</a>
                            		</tr>

                            </a>	

         <?php  } ?>
					</table>
			
			
			<a href= "<?php echo 'enrolled_stud_print?course_id='.$this->input->get('course_id');?>" class = "btn btn-primary">Print List</a>
           
		   
		   </div>


	</div>

</div>
