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
<h2>Enroll Student</h2>
<?php echo form_open('Admin/addStuinCourse');?>
     

     <div class='form-group has-primary'>
       <label>Available Courses</label>
         <select class='form-control' name="course_id">
  <?php foreach($course as $data1){
      if($data1->flag=='1'){?> 
                <option value='<?php echo ($data1->courseID); ?>'><?php echo ($data1->courseID); ?>: <?php echo ($data1->CourseName); ?></option>
                
  <?php }} ?>              
        </select>     
    </div>

     
     <div class='form-group has-primary'>
       <label>Active Students</label>
      <input type="search" id="searchBox" placeholder = "Search Student" class="form-control">
<select id="countries" class="form-control" name="Email">
<option>Select Student</option>
  <?php foreach($user as $data2){
      if($data2->flag=='1'){?> 
      <option value='<?php echo ($data2->Email); ?>'>  <?php echo ($data2->Lname). ', '.($data2->Fname); ?> (<?php echo ($data2->username); ?>) </option>
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
<div class="col-md-12"><h3 style="color:#111;">Student Enrollments</h3></div>
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
                 
                   <th>Course Name</th>
                   <th>Name</th>
                  <th>Date Enrolled</th>
                  <th>Cancel Enrollment</th>
				  
				  
                </tr>
              </thead>
              <tbody>

          <?php
if($enrollments != NULL)
{        
 

      $this->load->model("UserModel");
	  $stud_model = new UserModel();

	  foreach($enrollments as $data4){
		  

		$stud_info= $stud_model->getUserInformationbyUsername($data4['username']);
 
 ?>
    
    
                <tr>
                  
                  <td><?php echo ($data4['CourseName']); ?></td>
                   <td><?php echo ($stud_info['Fname']. ' ' . $stud_info['Lname']); ?></td>
                   <td><?php 
				   
				   
$php_date= strtotime($data4['date_enrolled']);
			 
			$php_date= date("M d, Y", $php_date);
			
			echo $php_date;
			  ?></td>
                   <td><a class="btn btn-danger" href= "<?php echo 'deleteStudCourse?user_course_id='.$data4['user_course_id']; ?>"><span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this item?')"></span></button></td>
                 </tr>
      <?php }} else {?> <tr><td><?php echo "No Enrollment of the Moment"; ?></td></tr> <?php } ?>
          
            
              </tbody>
            </table>
            <br>
            <br>
            <br>
             <script type="text/javascript">
              $(document).ready(function() {
                  $('#example').DataTable({
				  "order":[[3, "desc"]]
				  });
              } );
            </script>
          </div>
         </div>
        </div>  
      


 <script type="text/javascript">
 searchBox = document.querySelector("#searchBox");
countries = document.querySelector("#countries");
var when = "keyup"; //You can change this to keydown, keypress or change

searchBox.addEventListener("keyup", function (e) {
    var text = e.target.value; 
    var options = countries.options; 
    for (var i = 0; i < options.length; i++) {
        var option = options[i]; 
        var optionText = option.text; 
        var lowerOptionText = optionText.toLowerCase();
        var lowerText = text.toLowerCase(); 
        var regex = new RegExp("^" + text, "i");
        var match = optionText.match(regex); 
        var contains = lowerOptionText.indexOf(lowerText) != -1;
        if (match || contains) {
            option.selected = true;
            return;
        }
        searchBox.selectedIndex = 0;
    }
});
    </script>

<div class="col-sm-12" style="height:30px;">
 
</div>

  
</div>




</div>


