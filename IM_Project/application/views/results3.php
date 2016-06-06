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

<div class="col-lg-12" style="background-color: #fff; border-radius: 4px;">  
     <h1 style="color:#111;">Courses Result</h1> 
  <div class="table-responsive">
            <table id="datatables" class="table table-hover" style="color:#111;">
              <thead>
              <br>
                <tr> 
                  
                   <th>Course Name</th>
                   <th>Course ID</th>
                  <th>Course Release Schedule</th>
                  <th>View details</th>
                 </tr>
               </thead>   
   <?php 
      if($course != NULL)
{      
   foreach($course as $data3){

      if($data3->flag=='1'){?> 
                <tr>
                  
                  <td><?php echo ($data3->CourseName); ?></td>
                   <td><?php echo ($data3->courseID); ?></td>
                    <td><?php echo ($data3->Date_release); ?></td>
                  <?php echo form_open('Admin/viewCourse');?>  
                  <input class="form-control" type="hidden" name="courseID" value="<?php echo $data3->courseID; ?>"/>  
                  <td><button class="btn btn-default"><span class="glyphicon glyphicon-info-sign"></span></button></td>
                  <?php echo form_close();?>  
                </tr>
<?php }}} else {?> <tr><td><?php echo "No results found"; ?></td></tr> <?php } ?>
                      
              </tbody>
            </table>
            <br>
            <script type="text/javascript">
              $(document).ready(function() {
                  $('#datatables').DataTable();
              } );

           </script>
          </div>
        </div> 



<div class="col-sm-12" style="height:30px;">
 
</div>
    
    
</div>