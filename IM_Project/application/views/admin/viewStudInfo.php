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
          <h1><span class="glyphicon glyphicon-user"></span> View Student</h1>  
          </div>
                                          <br>


                              <div class="form-group col-lg-6 has-info">
                              <label>Email</label>
                              <input type="text" class="form-control" placeholder="ID number" name="Idnum"  value="<?php echo $Email; ?>" readonly />
                              </div>

                                <div class="form-group col-lg-6 has-info">
                              <label>Username  </label>
                              <input type="text" class="form-control" placeholder="Username" name="Username"  value="<?php echo $username; ?>" readonly/>
                              
                              </div>
                            

                              <div class="form-group col-lg-6 has-info">
                              <label>First Name  </label>
                              <input type="text" class="form-control" placeholder="Name" name="Fname"  value="<?php echo $Fname; ?>" readonly />
                              </div>

                              <div class="form-group col-lg-6 has-info">
                              <label>Last Name </label>
                              <input type="text" class="form-control" placeholder="Family name" name="Lname"  value="<?php echo $Lname; ?>" readonly />
                              </div>

                          
                              
                            <div class="form-group col-lg-6 has-info">
                              <label>Question</label>
                              <input type="text" class="form-control" placeholder="Mobile number" name="Phonenumber"  value="<?php echo $question; ?>" readonly  />
                              </div>
                            
                              <div class="form-group col-lg-6 has-info">
                                <label>Question Answer:</label>       
                              <input type="text" class="form-control" placeholder="Gender" name="Gender"  value="<?php echo $answer; ?>" readonly />
                              </div>
   

                              <div class="form-group col-lg-6 has-info">
							  
		<a href= "<?php echo 'delete?Email='.$Email; ?>" class="btn btn-danger btn-primary btn-lg btn-block" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>

 							   
							   
                               </div>
                              
                          
                              
                              <div class="form-group col-lg-6 has-info">
							  
 
                 <a href= "<?php echo 'UpdateStudInfo?Email='.$Email; ?>" class="btn btn-success btn-primary btn-lg btn-block"> Update </a>

				 
				 
                               
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







