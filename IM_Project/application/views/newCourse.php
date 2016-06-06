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
          <h1><span class="glyphicon glyphicon-tower"></span> New Courses</h1>  
          </div>
                                          <br>
 <?php echo form_open('Admin/AddCourse');?>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Course Name/Code </label>
                              <input type='text' class='form-control' placeholder='Name' name="CourseName" required />
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Course ID  </label>
                              <input type='text' class='form-control' placeholder='Course ID' name="courseID" required  />
                              </div>

                              <div class='form-group col-lg-12 has-info'>
                              <label>Course Description</label>
                              <textarea class="form-control" placeholder="Type in course description" name="courseDescription"required></textarea>
                              </div>
                            
                              <div class='form-group col-lg-6 has-info'>
                              <label>Course Category </label>
                               <select class='form-control' name="category" placeholder='Select Category' >
                                      <option value='Deck'>Deck</option>
                                      <option value='Engine'>Engine</option>
                                        <option value='Others'>Others</option>
                                  </select>
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Course status </label>
                              <select class='form-control' name="courseStatus" placeholder='Select Status' >
                                      <option value='Regular'>Regular</option>
                                  
                                        <option value='Revisions'>Revisions</option>
                                        
                                  </select>
                              </div>
                            
                           
                            
                             

                              <div class='form-group col-lg-6 has-info'>
                              <label>Course type </label>
                            <select class='form-control' name="courseType" placeholder='Select Category' >
                                      <option value='free'>Free</option>
                                      <option value='paid'>Paid</option>
                                 </select>      
                              </div>
                              <br>

                                <div class='form-group col-lg-6 has-info'>
                              <label>Price of course </label>
                            <input type='text' class='form-control' placeholder='Price' name='price' required />
                              </div>           
                              
                              <input type='hidden' class='form-control' name="flag" value="1" required  />
                                                                 <div class='form-group col-lg-12 has-info'>
                                  <label>Expiration Date: </label>
                            <input type='date' class='form-control' placeholder='Course Image' name='course_image' required />
                              </div>
							  
                              <div class='form-group col-lg-12 has-info'>
                                  <label>Course Image</label>
                            <input type='file' class='form-control' placeholder='Course Image' name='course_image' required />
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



