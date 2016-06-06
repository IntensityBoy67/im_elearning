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
<body>
<br>
<br>
<br>
<br>
<br>
<br>

  
          <section class="wrapper">

<div class="row">
 <div class="row mt" >

 <div class="col-lg-12">

   <div class="site-wrapper">

    <div class="site-wrapper-inner">
     <div class="cover-container" style="margin:auto;">
              

       <div class="col-md-12">

         
           <form action="" method="post">
<table  id="example" class="display table table-bordered" cellspacing="0" width="100%">
        <thead  style="background-color: #1572BD;">
            <tr >
                <th style="color:#fff;">Course ID</th>
                <th style="color:#fff;">Course Name/Code</th>
				<th style="color:#fff;">No. of Lectures</th>
				<th style="color:#fff;">Open Until</th>
				<th style="color:#fff;">Last Updates</th>
				<th style="color:#fff;">Instructor</th>
				
                <th style="color:#fff;">View</th>
            </tr>
        </thead>

    <?php

    ?>

    <tbody>
        <?php


                    $this->load->model('InstructorModel');
					$this->load->model('UserModel');
					$stud_model= new UserModel();
                    $p = new InstructorModel();

		foreach($results as $object)
        {

          if($object->flag == 1){
        ?>
            <tr>
                <td data-search="Course 1"><?php
                    echo $object->courseID;
                 ?></td>

                <td><?php
                    echo $object->CourseName;
                    ?></td>
					<td><?php 	$lecs_no =$p->count_lecs($object->courseID);
								if($lecs_no != 0)
								echo "Lectures: ".$lecs_no;
								
								?>
								
					  <td><?php
					    
			$php_date= strtotime($object->date_expired);
			 
			echo date("M d, Y", $php_date);
			
			  ?></td>
					  <td>
            <?php
					  
					 $row = $p->loadLastUpdCourse($object->courseID);
					 
					 
 									  
									  
									  if(empty($row)) echo "<span>No Activities Yet!</span>";
									  else {
									  $php_date = "";
									  
									  $php_date= strtotime($row['nodification_date']);
			 
										$php_date=  date("M d, Y H:m", $php_date);
									  
									  echo "<span>".$row['notif_desc']."</span><br><br>";
									  
									  echo "<span class = 'text small'>".$php_date."</span><br>";
									  
									  }

									  
                    ?></td>
					<td> <?php 
					
						$inst_info = $p->getInstructorInfo($object->IdNum);
						
						if(!empty($inst_info)){
					echo "<ul><li>Name:<span class='text text-info'> ".$inst_info['Fname']. ' '. $inst_info['Lname']."</span></li>";
					echo "<li>Email: <span class='text text-danger'>".$inst_info['Email']."</span></li></ul>";
						}
						
					?>
					
                <td>
                    <a class="btn btn-primary" href="<?php echo base_url();?>index.php/IM/courseDesc/<?php echo $object->courseID;?>" rel="facebox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" value="View">View</a>
                    <?php 
						

					if($stud_model->checkCourse($object->courseID, $this->session->userdata('username')) >= 1){ ?>
					
					<a class="btn btn-info" href="<?php echo base_url();?>index.php/IM/presentation?id=<?php echo $object->courseID;?>"  class="btn btn-primary btn-lg" value="Continue">Continue</a>
					
					</td> <?php } ?>

					</tr>
        <?php } //* End of if
      } ?>
        </tbody>
        </table>
           </form>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );

</script>
           <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php foreach ($results as $object) {
           echo $object->courseID;
        } ?></h4>
      </div>
      <div class="modal-body">
         
         <label>Description: </label> <?php foreach ($results as $object) {
            echo $object->courseDescription;
         } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Take this course</button>
      </div>
    </div>
  </div>
</div>

      </div> <!-- end of col-md-12 -->
    </div> <!-- end of cover-container-->
  </div> <!-- end of site wrapper container -->
</div> <!-- site wrapper -->
</div> <!-- col lg 12-->
</div> <!-- / row mt -->
 </div><!-- /row -->
</section>


</body>
</html>