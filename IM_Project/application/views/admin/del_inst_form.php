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
          <h1><span class="glyphicon glyphicon-tower"></span> Deactivate Instructor</h1>  
          </div> 
		  
		  
 <?php echo form_open('Admin/reactivate?IdNum='.$this->input->get('Idnum'));
 
 
 if(!empty($ass_courses)){
 ?>

   <p class= 'text text-info'>
							  Re- Assigning Courses of:
					<?php echo $inst_info['Fname']. ' '. $inst_info['Lname']; ?> to <span class= 'text text-danger'>Deactivate</span>
			
	</p>
					
					
				<?php foreach($ass_courses as $row) { ?>
				
				
							<div class='col-lg-12 has-info' style = "margin-bottom: 50px;">
									  
					Re- Assign Course: <span class= 'text text-danger'><?php echo $row['CourseName']; ?></span>
									
					<input type = "hidden" name ="course_id[]" value = "<?php echo $row['courseID']?>"/>

 							   
 						   
					 <p>
                              <select required class='form-control' name="instructors[]">
							  	<option value = "">Select Instructor</option>
							  <?php 
							  
							 
							  
							  foreach($inst as $row_inst) {
							if($row_inst['Idnum']==$this->input->get('Idnum')) continue;
							  ?>
							  
							<option value = "<?php echo $row_inst['Idnum']; ?>">

							<?php echo $row_inst['Fname']. ' '. $row_inst['Lname'];?>

							</option>
							
								  
							  <?php  } ?>
							  
				 	
							  </select>
							  </p>
							  
							 
							  
							  
                              </div>
                                          
                       
                    <?php } 
		}	?>     
                              

                            
                              <div class='form-group col-lg-12 has-info'>
                              <input type='submit' class='btn btn-danger btn-lg btn-block' value ="Deactive Instructor"/>
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




