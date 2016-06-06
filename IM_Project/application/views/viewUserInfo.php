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
          <h1><span class="glyphicon glyphicon-tower"></span> View User</h1>  
          </div>
                                          <br>
 


                              <div class='form-group col-lg-6 has-primary'>
                              <label>First Name  </label>
                              <input type='text' class='form-control' placeholder='Name' name="Fname "value="<?php echo $Fname; ?>" readonly />
                              </div>

                              <div class='form-group col-lg-6 has-primary'>
                              <label>Last Name </label>
                              <input type='text' class='form-control' placeholder='Family name' name="Lname" value="<?php echo $Lname; ?>" readonly  />
                              </div>

                              <div class='form-group col-lg-6 has-primary'>
                              <label>Email  </label>
                              <input type='email' class='form-control' placeholder='Email' name="Email" value="<?php echo $Email; ?>" readonly />
                              </div>

                            
                              <div class='form-group col-lg-6 has-primary'>
                              <label>Username  </label>
                              <input type='text' class='form-control' placeholder='Username' name="username" value="<?php echo $username; ?>" readonly/>
                              
                              </div>
                            
                              <div class='form-group col-lg-6 has-primary'>
                              <label>Password  </label>
                              <input type='text' class='form-control' placeholder='Password' name="password" value="<?php echo $password; ?>" readonly />
                              </div>

                             
                              <input type='hidden' class='form-control' name="flag" value="<?php echo $flag; ?> " required />
                          

                              <div class='form-group col-lg-6 has-primary'>
                              <label>Retype Password  </label> 
                              <input type='text' class='form-control' placeholder='Retype password' name="Rpassword" value="<?php echo $Rpassword; ?>" readonly  />
                              </div>

                             <div class='form-group col-lg-6 has-info'>
                                <label>Secret question</label>       
                              <input type='text' class='form-control' placeholder='Answer' name="question" value="<?php echo $question; ?>" readonly  />
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Answer to Secret question</label>
                              <input type='text' class='form-control' placeholder='Answer' name="answer" value="<?php echo $answer; ?>" readonly  />
                              </div>   

                            
                             <div class="form-group col-lg-6 has-info">
                              <?php echo form_open("IM/deleteUser");?>
                              <input class="form-control" type="hidden" name="Email" value="<?php echo $Email; ?>"/>
                              <input type="submit" class="btn btn-danger btn-lg btn-block" value="Delete" onclick="return confirm('Are you sure you want to delete this item?')" />
                              <?php echo form_close();?>
                              </div>
                              
                          
                              
                              <div class="form-group col-lg-6 has-info">
                              <a href="<?php echo site_url('IM/loadusers') ?>" role="button" class="btn btn-info btn-block btn-lg">Back</a> 
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




