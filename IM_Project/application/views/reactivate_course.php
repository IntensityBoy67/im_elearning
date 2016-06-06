<body>

 <div class="col-lg-12">
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">
       
       <div class="col-md-12" style="background-color: #222;">
                              
                              <div class="row">
                                  <div class="box">
                                      <div class="col-lg-12">
                                      <br>
                                      <br>
          <div class="jumbotron" style="background-color: #337ab7; border-radius: 4px;">
          <h1><span class="glyphicon glyphicon-tower"></span> Re- Assign course</h1>  
          </div> 
 <?php echo form_open('Admin/reactivate');?>

                             <h2>Course Name: <?php echo $course_info['CourseName']; ?></h2><br><br>
                              <div class='form-group col-lg-12 has-info'>
							  
							  
                              <label>Date Open Until: </label>
                              <input type='date' class='form-control'  value = "<?php echo $course_info['date_expired']; ?>" name="date_expired" required />
                              </div>
 
							<div class='form-group col-lg-12 has-info'>
							  
							  
                              <label>Instructor: </label>
							  
							  <p>
							  
							  
                              <select class='form-control' name="CourseName">
							  
							  <?php 
							  
							  foreach($avail_inst as $row_inst) { ?>
							  
							<option value = "<?php echo $row_inst['Idnum']; ?>">

							<?php echo $row_inst['Fname']. ' '. $row_inst['Lname'];?>

							</option>
														  
							  <?php  } ?>
							  
							  </select>
							  
							  
							  </p>
							  
							  
                              </div>
                                          
                              
	<input type='hidden' class='form-control' name="course_id" value="<?php echo $course_info['courseID']; ?>" required  />
                         
                              

                            
                              <div class='form-group col-lg-12 has-info'>
                              <input type='submit' class='btn btn-primary btn-lg btn-block' />
                              </div>
                            
<?php echo form_close();?>

                           
                                      </div>
                                  </div>
                              </div>
           </div>
        </div>
      </div>
    </div>
 </div>
                       
                   






</body>




