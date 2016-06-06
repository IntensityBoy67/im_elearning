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
          <h1><span class="glyphicon glyphicon-list"></span> List of Students</h1>  
         </div>
            <p class="lead">Welcome to the List of Students. This is where the you control Instructor accounts. If you need help, please do go to the help page for more information.</p>
          </div>


<div class="col-lg-12" style="background-color: #fff; border-radius: 4px;">         
  <div class="table-responsive">
            <table id="tables" class="table table-hover" style="color:#111;">
              <thead>
              <br>
                <tr> 
    
                   <th>Username</th>
                   <th>Name</th>
                  <th>Email</th>
				<th>Enrolled Courses</td>
				<th>Action</td>
				
                </tr>
              </thead>
              <tbody>
                 
  <?php
	 
  foreach($studs as $row){ 
     
	 $this->load->model('InstructorModel');
    $p = new InstructorModel;
	
	?>
 
                <tr>
                 
                  <td><?php echo $row['username']; ?></td>
                   <td><?php echo $row['Fname']. ' '. $row['Lname']; ?></td>
                    <td><?php echo $row['Email'];  ?></td>
					<td><?php echo $p->count_courses($row['Email']); ?></td>

					
				  <td><a href= "<?php echo 'viewStudInfo?Email='.$row['Email']; ?>" class="btn btn-info"><span class="glyphicon glyphicon-info-sign">View</span></button>

                 <a href= "<?php echo 'UpdateStudInfo?Email='.$row['Email']; ?>" class="btn btn-default"><span class="glyphicon glyphicon-info-sign">Edit</span></button>

				  
                  </tr>
  <?php }?>              
               
                      
              </tbody>
            
            </table>

             <script type="text/javascript">
              $(document).ready(function() {
                  $('#tables').DataTable();
              } );

           </script>
            <br>
           
          </div>
        </div> 




<div class="col-sm-12" style="height:30px;">
 
</div>

        </div>


<div class="col-lg-4">
 <div class="panel" style="background-color: #222;">
  <div class="panel-heading" style="background-color: #337ab7;"><h2>Option</h2></div>
   <div class="panel-body">

   <a href="enrollStud" role="button" class="btn btn-info btn-block btn-lg">Enroll Student</a>






   </div>
  </div>
</div>

