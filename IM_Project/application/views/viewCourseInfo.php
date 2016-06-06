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
 

                              <div class='form-group col-lg-12 has-info'>
                              <label>Course Name  </label>
                              <input type='text' class='form-control' placeholder='Name' name="CourseName" value="<?php echo $CourseName; ?>" readonly />
                              </div>

                              <div class='form-group col-lg-12 has-info'>
                              <label>Course ID </label>
                              <input type='text' class='form-control' placeholder='Family name' name="courseID" value="<?php echo $courseID; ?>" readonly />
                              </div>

                              <div class='form-group col-lg-12 has-info'>
                              <label>Course Description</label>
                              <textarea class="form-control" placeholder="Type in your schedule" name="courseDescription" readonly> <?php echo $courseDescription; ?> </textarea>
                              </div>
                            
                              <div class='form-group col-lg-12 has-info'>
                              <label>Course Category </label>
                             <input type='text' class='form-control' placeholder='Family name' name="category" value="<?php echo $category; ?>" readonly />
                              </div>

                              <div class='form-group col-lg-12 has-info'>
                              <label>Course status </label>
                            <input type='text' class='form-control' placeholder='Family name' name="courseStatus" value="<?php echo $courseStatus; ?>" readonly />
                              </div>
                            
                                                       
                              <div class='form-group col-lg-12 has-info'>
                              <label>Course type </label>
                                 <input type='text' class='form-control' placeholder='Price' name="courseType" value="<?php echo $courseType; ?>" readonly />
                              </div>
                              <br>

                                <div class='form-group col-lg-12 has-info'>
                              <label>Price of course </label>
                            <input type='text' class='form-control' placeholder='Price' name="price" value="<?php echo $price; ?>" readonly />
                              </div>   

                                          
                             
                              <input type='hidden' class='form-control' name="flag" value="<?php echo $flag; ?>" readonly   />
               
                              
                              
 
                                          
                              <div class="form-group col-lg-12 has-info">
							  
                               <a href= "<?php echo 'Updateviewcourse?courseID='.$courseID; ?>"class="btn btn-success  btn-lg btn-block" >Update</a>

                              </div>
                                          
                            


                           
                                      </div>
                                  </div>
                              </div>
           </div>
        </div>
      </div>
    </div>
 </div>
                       
                   






</body>




