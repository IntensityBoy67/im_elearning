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
          <h1><span class="glyphicon glyphicon-tower"></span> New Course</h1>  
          </div>
  <?php echo form_open('Admin/AddCourse');?>
 
 
   <p ><font color = "red">* </font>(Indicates required field)</p>
   <br><br>
								<div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Course Code </label>
                              <input type='text' class='form-control' placeholder='Course ID' name="courseID" required  />
                              </div>
							  
							  
                              <div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Course Name  </label>
                              <input type='text' class='form-control' placeholder='Name' name="CourseName" required />
                              </div>

                              

                              <div class='form-group col-lg-12 has-info'>
                              <label><font color = "red">* </font>Course Description</label>
                              <textarea class="form-control" placeholder="Type in course description" name="courseDescription"required></textarea>
                              </div>
                            
                              <div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Course Category </label>
                               <select class='form-control' name="category" placeholder='Select Category' >
                                      <option value='Deck'>Deck</option>
                                      <option value='Engine'>Engine</option>
                                        <option value='Others'>Others</option>
                                  </select>
                              </div>

                            
                              <div class='form-group col-lg-12  has-info'>
                              <label>Course type </label>
                            <select class='form-control' name="courseType" placeholder='Select Category' >
                                        <option value='free' selected>Free</option>
                                      <option value='paid' >Paid</option>
                                 </select>      
                              </div>
                              <br>

                                <div class='form-group col-lg-12  has-info' id = "price">
                              <label>Price of course </label>
                            <input type='text' class='form-control' placeholder='Price' name='price' required />
                              </div>           
							  
							  
							    <script>
					 			
					 $("document").ready(function(){
								
 							
									
										$("#price").hide();
										
										
								$("select[name='courseType']").change(function(){
										
										if($(this).val() == "free"){
											  							
											$("#price").hide();
											
											
										}else {
												$("#price").show();
										}
											
									
								});
						 
					 });
					 
					 </script>
					   
                              <input type='hidden' class='form-control' name="flag" value="1" required  />
                                   <div class='form-group col-lg-12 has-info'>
                                  <label><font color = "red">* </font>Release Date: </label>
                            <input type='date' class='form-control' value= "<?php echo date('Y-m-d'); ?>" placeholder='Release Date' name='Date_release' required />
                              </div>
							   
                             <div class='form-group col-lg-12 has-info'>
                                  <label><font color = "red">* </font>Open Until: </label>
                            <input type='date' class='form-control'  name='date_expired' required />
                              </div>
							  
							  
                              <div class='form-group col-lg-12 has-info'>
                                  <label>Course Image</label>
                            <input type='file' class='form-control' placeholder='Course Image' name='course_image' />
                              </div>

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



