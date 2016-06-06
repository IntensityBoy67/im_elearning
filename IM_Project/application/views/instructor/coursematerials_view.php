<div class="container">
	<div class="row">
		<div class="col-md-12 well" style="background-color:#fff;">
			<table id="example" class="table table-hover" style="color:#111;">
              <thead>
              <br>
                <tr style="background-color: #337AB7;"> 
                 
                   <th style="color:#fff;">Courses</th>
                   <th style="color:#fff;">Lectures</th>
                   <th style="color:#fff;">Quizzes</th>
                 
                </tr>
              </thead>
              <tbody>
    <?php 
       foreach ($course as $cou) {
                                                
             $course_name = $cou['CourseName'];
             $course_id = $cou['courseID'];
        ?>
				   <tr>
				   		<td><?php echo $course_name;?></td>
         
     
           
				   		<td> <a href="<?php echo site_url('admin/viewalllectures') ?>?id=<?php echo $course_id?>" class="list-group-item ">View Lectures</a></td>  
               
				   		<td><a href="<?php echo site_url('admin/viewallquizzes') ?>?id=<?php echo $course_id?>" class="list-group-item ">View Quizzes</a></td>
				   		
				   </tr>
 	
				   <?php }?>              		


              </tbody>
            </table>  	
             <script type="text/javascript">
              $(document).ready(function() {
                  $('#example').DataTable();
              } );
            </script>
		</div>

	</div>


</div>