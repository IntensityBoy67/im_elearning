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
          <h1><span class="glyphicon glyphicon-user"></span> view Administrator </h1>  
          </div>
                                          <br>


                              <div class="form-group col-lg-6 has-info">
                              <label>ID number </label>
                              <input type="text" class="form-control" placeholder="ID number" name="Idnum"  value="<?php echo $Idnum; ?>" readonly />
                              </div>

                              <div class="form-group col-lg-6 has-info">
                              <label>Username  </label>
                              <input type="text" class="form-control" placeholder="Username" name="Username"  value="<?php echo $Username; ?>" readonly/>
                              
                              </div>

                              <div class="form-group col-lg-6 has-info">
                              <label>First Name  </label>
                              <input type="text" class="form-control" placeholder="Name" name="Fname"  value="<?php echo $Fname; ?>" readonly />
                              </div>

                              <div class="form-group col-lg-6 has-info">
                              <label>Last Name </label>
                              <input type="text" class="form-control" placeholder="Family name" name="Lname"  value="<?php echo $Lname; ?>" readonly />
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Schedule In</label>
                              <input type='time' class='form-control' placeholder='Family name' name="ScheduleIn" value="<?php echo $ScheduleIn; ?>" readonly  />
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Schedule Out</label>
                              <input type='time' class='form-control' placeholder='Family name' name="ScheduleOut" value="<?php echo $ScheduleOut; ?>"  readonly  />
                              </div>
                            
                              <div class="form-group col-lg-6 has-info">
                              <label>Email  </label>
                              <input type="email" class="form-control" placeholder="Email" name="Email"  value="<?php echo $Email; ?>" readonly />
                              </div>

                              
                                <div class="form-group col-lg-6 has-info">
                              <label>Phone Number  </label>
                              <input type="text" class="form-control" placeholder="Mobile number" name="Phonenumber"  value="<?php echo $Phonenumber; ?>" readonly  />
                              </div>
                            
                              
                            
                              <div class="form-group col-lg-6 has-info">
                              <label>Password  </label>
                              <input type="password" class="form-control" placeholder="Password" name="Password"  value="<?php echo $Password; ?>" readonly />
                              </div>

                              <div class="form-group col-lg-6 has-info">
                              <label>Retype Password  </label> 
                              <input type="password" class="form-control" placeholder="Retype password" name="RPassword"  value="<?php echo $Rpassword; ?>" readonly />
                              </div>

                              <div class="form-group col-lg-6 has-info">
                                <label>Gender</label>       
                               <input type="text" class="form-control" placeholder="Gender" name="Gender"  value="<?php echo $Gender; ?>" readonly />
                              </div>

                              

                            
                                          
                              <div class='form-group col-lg-6 has-info'>
                                <label>Privilege</label>       
                                 <input type="text" class="form-control" placeholder="$privilege" name="$privilege"  value="<?php echo $privilege; ?>" readonly  />
                              </div>
                                          
                           <div class='form-group col-lg-6 has-info'>
                                <label>Secret question</label>       
                              <input type='text' class='form-control' placeholder='Answer' name="question" value="<?php echo $question; ?>" readonly  />
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Answer to Secret question</label>
                              <input type='text' class='form-control' placeholder='Answer' name="answer" value="<?php echo $answer; ?>" readonly  />
                              </div>  
                              
                              <input type="hidden" class="form-control" name="flag" value="<?php echo $flag; ?>" readonly/>
                                    

                            <div class="form-group col-lg-6 has-info">
                              <?php echo form_open("Admin/deleteadmin");?>
                              <input class="form-control" type="hidden" name="Idnum" value="<?php echo $Idnum; ?>"/>
                              <input type="submit" class="btn btn-danger btn-lg btn-block" value="Delete" onclick="return confirm('Are you sure you want to delete this item?')" />
                              <?php echo form_close();?>
                              </div>
                                          
                                          
                              <div class="form-group col-lg-6 has-info">
                              <?php echo form_open("Admin/UpdateviewAdmin");?>
                              <input class="form-control" type="hidden" name="Idnum" value="<?php echo $Idnum; ?>"/>
                              <input type="submit" class="btn btn-success btn-lg btn-block" value="Update" />
                              <?php echo form_close();?>
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








