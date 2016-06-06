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
          <h1><span class="glyphicon glyphicon-tower"></span> Course Update</h1>  
          </div>
                                          <br>
 <?php echo form_open('Admin/UpdateCourse_Proc');?>

                             
                              <div class='form-group col-lg-12 has-info'>
                              <label>Course Name  </label>
                              <input type='text' class='form-control' placeholder='Name' name="CourseName" value="<?php echo $CourseName; ?>" required />
                              </div>

                              <div class='form-group col-lg-12 has-info'>
                              <label>Course ID </label>
                              <input type='text' class='form-control' placeholder='Family name' name="courseID" value="<?php echo $courseID; ?>" required />
                              </div>

                              <div class='form-group col-lg-12 has-info'>
                              <label>Course Description</label>
                              <textarea class="form-control" placeholder="Type in your schedule" name="courseDescription" required> <?php echo $courseDescription; ?> </textarea>
                              </div>
                            
                             <div class='form-group col-lg-12 has-info'>
                              <label>Course Category </label>
                               <select class='form-control' name="category" placeholder='Select Category' value="<?php echo $category; ?>" >
                                      <option value='Deck'>Deck</option>
                                      <option value='Engine'>Engine</option>
                                        <option value='Others'>Others</option>
                                  </select>
                              </div>

                             
                            
                     <script>
					 			
					 $("document").ready(function(){
								
								
								
								$("select[name='courseType']").change(function(){
										
										if($(this).val() == "free"){
											  							
											$("#price").hide();
											
											
										}else {
												$("#price").show();
										}
											
									
								});
						 
					 });
					 
					 </script>
                                         
                               <div class='form-group col-lg-12 has-info'>
                              <label>Course type </label>
                            <select class='form-control' name="courseType" placeholder='Select Category' >
                                      <option value='free' <?php if($courseType == "free") echo "selected".'
					 	 $("document").ready($("#price").hide());'; ?>>Free</option>
                                      <option value='paid' <?php if($courseType == "paid") echo "selected"; ?>>Paid</option>
                                 </select>      
                              </div>
							                                 <div class='form-group col-lg-12 has-info'>
                              <label>Assigned Instructors</label>
							  
							  <?php 
							  
							  	
							$this->load->model("InstructorModel");
							$p = new InstructorModel();
							$inst= $p->loadInstructors()->result_array();

							 
							
							
							?>
							  
                            <select class='form-control' name="inst_id" placeholder='Select Category' >
							
							<?php 
						
							
							
							foreach($inst as $row) { 
														
							?>
                                      
                                      <option value= "<?php echo $row['Idnum']; ?>" <?php if($IdNum == $row['Idnum']) echo "selected"; ?>><?php echo  $row['Fname']." ".$row['Lname']; ?></option>
									  
							<?php } ?>
                                 </select>      
								 
                              </div>
                              <br>
<div class='form-group col-lg-12 has-info'>
                              <label>Open Until </label>
                               <input class='form-control' name="date_expired" value = "<?php echo $date_expired;?>"type = "date">
                                     
                              </div>

                                <div <?php if($courseType== 'free'){ ?>style= "visibility:hidden;" <?php } ?>id = "price" class='form-group col-lg-12 has-info'>
                              <label>Price of course </label>
                            <input  type='text' class='form-control' placeholder='Price' name="price" value="<?php echo $price; ?>" required />
                              </div>   

                                          
                              
                              <input type='hidden' class='form-control' name="flag" value="<?php echo $flag; ?>" required  />
                         
                              

                            
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




