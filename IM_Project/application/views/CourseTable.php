<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
   <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
</head>
<div class="col-lg-8">
  <div class="inner cover">
          <div class="jumbotron" style="background-color: #337ab7; border-radius: 4px;">
          <h1><span class="glyphicon glyphicon-list"></span> List of All Courses</h1>  
         </div>
            <p class="lead">Welcome to the	List of Courses. This is where the you control courses. If you need help, please do go to the help page for more information.</p>
          </div>


<div class="col-lg-12" style="background-color: #fff; border-radius: 4px;">         
  <div class="table-responsive">
    <br>
	
	
	<h4><p class= "text text-success">Choose List:<select id = "course_list_sel" style ="color:black;">
	
	<option value = "open">Opened Courses</option>
	<option value = "arch">Deactivated Courses</option>

	
	</select>
	
	
	
	<div id = "datatables_open_head">
            <table id="datatables_open" class="table table-hover" style="color:#111;">
              <thead>
          
                <tr> 
					<th>Course ID</th>
                   <th>Course Name</th>
                  <th>Course Assigned Teacher #</th>
                  <th>Date Opened</th>
                  <th>Open Until</th>
				  <th>Action</th>

								   </tr>
              </thead>
              <tbody>
                 
  <?php 
  $course_info = $courses->result();
    foreach($course_info as $datas){
    
   ?>
                 <tr>
                 <td><?php echo ($datas->courseID); ?></td>
                 <td><?php echo ($datas->CourseName); ?></td>
				 <td><?php echo ($datas->IdNum==NULL)? "<span class= 'label label-danger'>Not Yet Assigned</span>" : $datas->IdNum; ?></td>				 
                 <td><?php 
				 
				 
			$php_date= strtotime($datas->Date_release);
			 
			$php_date= date("M d, Y", $php_date);
  
		echo ($datas->Date_release==NULL) ? "<span class= 'label label-danger'>Not Yet Released!</span>": $php_date; ?></td>
					   
					   <td><?php 
				 
				 
			$php_date= strtotime($datas->date_expired);
			 
			$php_date= date("M d, Y", $php_date);
  
				echo $php_date; ?>
 				  
				  <td><a href= "<?php echo 'viewCourse?courseID='.$datas->courseID; ?>" class="btn btn-info"><span class="glyphicon glyphicon-info-sign">View</span></button>

                 <a href= "<?php echo 'Updateviewcourse?courseID='.$datas->courseID; ?>" class="btn btn-default"><span class="glyphicon glyphicon-info-sign">Edit</span></button>

 				  
                </tr>
  <?php }
  

   ?>              
               
                      
              </tbody>
            </table>
				
	</div>

			<?php 
			
			
	$course_info = $arch_courses->result();

   
  ?>
			<div id = "datatables_arch_head">
			
			  <table id="datatables_arch" class="table table-hover" style="color:#111;">
              <thead>
          
                <tr> 
					<th>Course ID</th>
                   <th>Course Name</th>
                  <th>Course Assigned Teacher #</th>
                  <th>Date Closed</th>
                  <th>Open Until</th>
				  <th>Action</th>

								   </tr>
              </thead>
              <tbody>
                 
  <?php 
  
 
	
	
    foreach($course_info as $datas){
    
   ?>
                 <tr>
                 <td><?php echo ($datas->courseID); ?></td>
                 <td><?php echo ($datas->CourseName); ?></td>
				 <td><?php echo ($datas->IdNum==NULL)? "<span class= 'label label-danger'>Not Yet Assigned</span>" : $datas->IdNum; ?></td>				 
                 <td><?php 
				 
				 
			$php_date= strtotime($datas->Date_release);
			 
			$php_date= date("M d, Y", $php_date);
  
		echo ($datas->Date_release==NULL) ? "<span class= 'label label-danger'>Not Yet Released!</span>": $php_date; ?></td>
					   
					   <td><?php 
				 
				 
			$php_date= strtotime($datas->date_expired);
			 
			$php_date= date("M d, Y", $php_date);
  
				echo $php_date; ?>
 				  
				  <td><a href= "<?php echo 'reactivate_form?courseID='.$datas->courseID; ?>" class="btn btn-info"><span class="glyphicon glyphicon-success-sign">Re- Activate</span></button>

              

 				  
                </tr>
  <?php }?>              
               
                      
              </tbody>
            </table>
			
			</div>
			
            <br>
            
<script type="text/javascript">
$(document).ready(function() {
    $('#datatables_open, #datatables_arch').DataTable();
	
	$("#datatables_arch_head").hide();
	
	
	$("#course_list_sel").change(
	
			function(){

 		
		if($(this).val() == "open"){
			
				$("#datatables_open_head").show();
				$("#datatables_arch_head").hide();

		}else if($(this).val() == "arch"){
			
				$("#datatables_open_head").hide();
				$("#datatables_arch_head").show();

		}
	
});
	
});

</script>
          </div>
        </div> 



<div class="col-sm-12" style="height:30px;">
 
</div>

        </div>


<div class="col-lg-4">
 <div class="panel" style="background-color: #222;">
  <div class="panel-heading" style="background-color: #337ab7;"><h2>Option</h2></div>
   <div class="panel-body">

       <a href="viewaddCourse" role="button" class="btn btn-info btn-block btn-lg">Create New Course</a>

  


   </div>
  </div>
</div>


