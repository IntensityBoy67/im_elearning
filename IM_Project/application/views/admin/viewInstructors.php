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
          <h1><span class="glyphicon glyphicon-user"></span> View Instructors</h1>  
          </div>
                                          <br>


                              <div class="form-group col-lg-12  has-info">
                              <label>ID number </label>
                              <input type="text" class="form-control" placeholder="ID number" name="Idnum"  value="<?php echo $Idnum; ?>" readonly />
                              </div>

                                <div class="form-group col-lg-12  has-info">
                              <label>Username  </label>
                              <input type="text" class="form-control" placeholder="Username" name="Username"  value="<?php echo $Username; ?>" readonly/>
                              
                              </div>
                            

                              <div class="form-group col-lg-12  has-info">
                              <label>First Name  </label>
                              <input type="text" class="form-control" placeholder="Name" name="Fname"  value="<?php echo $Fname; ?>" readonly />
                              </div>

                              <div class="form-group col-lg-12  has-info">
                              <label>Last Name </label>
                              <input type="text" class="form-control" placeholder="Family name" name="Lname"  value="<?php echo $Lname; ?>" readonly />
                              </div>

                              <div class='form-group col-lg-12  has-info'>
                              <label>Vacant Schedules</label>
                               
                              <textarea disabled class="form-control" name="Vacant_Sched"><?php echo $Vacant_Sched; ?></textarea>
                              </div>
                            
                              <div class="form-group col-lg-12  has-info">
                              <label>Email  </label>
                              <input type="email" class="form-control" placeholder="Email" name="Email"  value="<?php echo $Email; ?>" readonly />
                              </div>

                              
                            <div class="form-group col-lg-12  has-info">
                              <label>Phone Number  </label>
                              <input type="text" class="form-control" placeholder="Mobile number" name="Phonenumber"  value="<?php echo $Phonenumber; ?>" readonly  />
                              </div>
                            
                              <div class="form-group col-lg-12 has-info">
                                <label>Gender</label>       
                              <input type="text" class="form-control" placeholder="Gender" name="Gender"  value="<?php echo $Gender; ?>" readonly />
                              </div>

                          

                   

                              
                              
                              <div class='form-group col-lg-12  has-info'>
                                <label>Secret question</label>       
                              <input type='text' class='form-control' placeholder='Answer' name="question" value="<?php echo $question; ?>" readonly  />
                              </div>

                              <div class='form-group col-lg-12  has-info'>
                              <label>Answer to Secret question</label>
                              <input type='text' class='form-control' placeholder='Answer' name="answer" value="<?php echo $answer; ?>" readonly  />
                              </div>            
                           
                              <input type="hidden" class="form-control" name="flag" value="<?php echo $flag; ?>" readonly />
                                        

                              <div class="form-group col-lg-12  has-info">
							  
						<a href= "<?php echo 'del_inst_form?Idnum='.$Idnum; ?>" class="btn btn-danger btn-primary btn-lg btn-block">Delete</a>

 							   
							   
                               </div>
                              
                          
                              
                              <div class="form-group col-lg-12  has-info">
							  
 
                 <a href= "<?php echo 'UpdateViewInstructors?Idnum='.$Idnum; ?>" class="btn btn-success btn-primary btn-lg btn-block"> Update </a>

				 
				 
                               
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







