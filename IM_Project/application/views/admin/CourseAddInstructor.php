<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
   <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
</head>

<div class="col-md-12">
 <div class="col-md-4">
<h2>Assign Instructor</h2>
<?php echo form_open('Admin/addIntinCourse');?>
     

     <div class='form-group has-primary'>
       <label>List of Unassigned Courses</label>
          <select class='form-control' name="course_id" required>
		  		 <option value = "">Select Course</option>

  <?php foreach($select_courses as $data1){
      ?> 
                <option value='<?php echo ($data1['courseID']); ?>'><?php echo ($data1['courseID']); ?>: <?php echo ($data1['CourseName']); ?></option>
  <?php }?>              
        </select>
    </div>
     
     <div class='form-group has-primary'>
       <label>Available Teachers</label>
         <select class='form-control' name="IdNum" required>
		 <option value = "">Select Teacher</option>
  <?php foreach($instructors as $data2){
      if($data2['flag']=='1'){?> 
      <option value='<?php echo ($data2['Idnum']); ?>'><?php echo ($data2['Idnum']); ?>: <?php echo ($data2['Fname']); ?> <?php echo ($data2['Lname']); ?> </option>
  <?php }}?>  
        </select>
    </div>


   
       
       <input type='hidden' class='form-control' name="flag" value="1" required  />

       <div class='form-group has-primary'>
     <input type='submit' class='btn btn-primary btn-lg btn-block' />
     </div>
<?php echo form_close();?>

 </div> 


<div class="col-md-8">
<div class="col-md-12" style="background-color: #fff; border-radius: 4px;"> 
<div class="row">
<div class="col-md-12"><h3 style="color:#111;">List of Course Assignments</h3></div>
<div class="col-md-12"><hr></div>
<div class="col-md-6">

    
</div> 
</div>   
  <div class="col-lg-12">
  <div class="table-responsive">
    <br>
            <table id="example" class="table table-hover" style="color:#111;">
              <thead>
              <br>
                <tr> 
                 
                   <th>Course Name and ID</th>
                   <th>Instructor Id</th>
           <th>Instructor Name</th>
                  <th>Date Assigned</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

          <?php
      $this->load->model('InstructorModel');
      $p = new InstructorModel();
      
if($course != NULL)
{                   
   foreach($course as $data4){
     
        $inst_info = $p->getInstInfo($data4['IdNum']);
     
      if($data4['flag'] == 1 && $data4['IdNum']){
      
   ?> 
                <tr>
                  
                  <td><?php echo ($data4['courseID']). '- '.$data4['CourseName']; ?></td>
          
                   <td><?php echo ($data4['IdNum']);?> </td>
           <td><?php echo ($inst_info['Fname']).' '.$inst_info['Lname']; ?></td>
                    <td><?php
$php_date= strtotime($data4['date_assigned']);
			 
			$php_date= date("M d, Y", $php_date);

			echo ($php_date); 
			
			?>
			
			</td>
                    <?php echo form_open('Admin/deleteInstCourse');?>  
                  <input class="form-control" type="hidden" name="instruct_course_id" value="<?php echo $data4['IdNum']; ?>"/>  
                  <td><button class="btn btn-danger"><span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this item?')"></span></button></td>
                  <?php echo form_close();?>  
                </tr>
<?php }

} 

}else { 

?> 

<tr><td><?php echo "No results found"; ?></td></tr> 

<?php } ?>
          
            
              </tbody>
            </table>
            <br>
            <br>
            <br>
             <script type="text/javascript">
              $(document).ready(function() {
                  $('#example').DataTable();
              } );
            </script>
          </div>
         </div>
        </div>  
      




<div class="col-sm-12" style="height:30px;">
 
</div>

  
</div>




</div>


