 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title></title>
    <script src="http://localhost/IM_Project/facefiles/jquery-1.2.2.pack.js" type="text/javascript"></script>
    <link href="http://localhost/IM_Project/facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="http://localhost/IM_Project/facefiles/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('a[rel*=facebox]').facebox()
        })
    </script>


    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
   <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">


</head>


<div style="height: 50px;"></div>

<div class="container">

    
        <section class="wrapper">
            <div class="row">
                <div clas="col-md-12 " >

                <h2><b>Course Progress</b> </h2> <br>
				
 				<div class="table-responsive">
					<table class="table table-condensed table-bordered table-responsive" id = "course_table">
							<thead  style="background-color: #0080BC;">
            					<tr >
 						
											<th style="color: #fff;">Course ID</th>
											<th style="color: #fff;">Course Name</th>
											<th style="color: #fff;">Progress</th>
											<th style="color: #fff; width:100px;">  Lectures Viewed</th>
											<th style="color: #fff;">Date Enrolled</th>
											<th style="color: #fff;">Last Date Viewed</th>
											<th style="color: #fff;">Course Duration</th>
											<th style="color: #fff;">Action</th>	
											
  								</tr>
        					</thead>
                   
                        <tbody>
						
						<?php 
						
 						//* print_r($course_prog);
						
						$this->load->model('UserModel');
						$stud_model = new UserModel();
						$count_lec_views= 0;
 						$count_total_course_lecs = 0;
						//$count_lec_views= 0;
						
						foreach($course_prog as $row_prog){ 
						
						$total_lecs= $stud_model->count_lecs_by_course($row_prog['courseID']);
					 	 
						$lec_views= $stud_model->count_lecs_views_by_course($this->session->userdata('username'), $row_prog['courseID']);
						$count_lec_views+= $lec_views;
 						$count_total_course_lecs = $total_lecs;
						
						?>

						
						<tr>
 											<td><?php echo $row_prog['courseID']; ?>
											<td><?php echo $row_prog['courseName']; ?>
											<td><?php 
											
										if(!empty($lec_views)) 
											echo number_format((($lec_views/$total_lecs) * 100), 2)	."%";

										else echo "0%";

										?>
											<td><?php 
											
 											
											echo $lec_views."/".$total_lecs;

 											
	 ?>	
											<td><?php 
												
												$date_enrolled_format= strtotime($row_prog['date_enrolled']);
												
													echo date("M d, Y", $date_enrolled_format);
												
			
 											
											?>
											<td><?php
											 
											
											$php_date= strtotime($row_prog['last_access']);
											
											
											if($row_prog['last_access'] == NULL)
			 
												echo date("M d, Y", $date_enrolled_format);
											else
												echo date("M d, Y", $php_date);
			
			  ?>
											<td><?php 
											
												if($row_prog['year_duration'] ==1)
											echo $row_prog['year_duration']. " Year and ";
											
												else if($row_prog['year_duration'] >1)
											echo $row_prog['year_duration']. " Years and ";
										
										
												if($row_prog['month_duration'] >= 1)
											echo $row_prog['month_duration']. " Months"; ?>
											
											
											<td><a href= "<?php echo 'ViewStudProg?course_id='.$row_prog['courseID']; ?>" class= 'btn btn-primary'>View</a>
							
							<?php } ?>
								
                        </tbody>

                    </table>
					
					<p>Student Progress Index: <?php


							if($count_total_course_lecs >= 1){
								
						echo number_format((($count_lec_views/$count_total_course_lecs) * 10), 2) ."%"; ?></p>
			
			
				<?php
					
					}else echo "0%";
					
				
					
					if($count_total_course_lecs >= 1){
						echo number_format((($count_lec_views/$count_total_course_lecs) * 10), 2) ."%"; ?></p>
					<?php
					
					}else echo "0%";
					
					?>
					
					
                </div>


            </div>

        </section>

   


<script type="text/javascript">
$(document).ready(function() {
    $('#course_table').DataTable();
} );

</script>


</div>