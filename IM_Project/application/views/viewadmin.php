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


<p ><font color = "red"><font color = "red">* </font> </font>(Indicates required disabled field)</p>
				  <br>
                              <div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Company ID</label>
                              <input type='text' class='form-control' placeholder='ID number' name="Idnum"  value="<?php echo $Idnum; ?>" required disabled />
                              <span id ="Idnum_flag">
                              </div>

                        

                              <div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>First Name  </label>
                              <input type='text' class='form-control' placeholder='Name' value="<?php echo $Fname; ?>" name="Fname" required disabled />
                              </div>

                              <div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Last Name </label>
                              <input type='text' class='form-control' placeholder='Family name' value="<?php echo $Lname; ?>"  name="Lname" required disabled  />
                              </div>

                              <div class='form-group col-lg-12  has-info'>
                                <label><font color = "red">* </font>Gender</label>       
                                <select class='form-control' name="Gender" placeholder='Gender' >
                                      <option value='Male' <?php echo ($Gender== "Male")? "Male" : ""; ?> >Male</option>
                                      <option value='Female' <?php echo ($Gender== "Female")? "Female" : ""; ?>>Female</option>
                                  </select>
                              </div>

                         
                            
                              <div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Email  </label>
                              <input type='email' class='form-control' placeholder='Email' value="<?php echo $Email; ?>"name="Email" required disabled />
                              <span id ="email_flag">
                              </div>

							<div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Username  </label>
                              <input type='text' class='form-control' placeholder='Username'  value="<?php echo $Username; ?>"name="Username" required disabled/>
                              
                              </div>
                              <div class='form-group col-lg-12  has-info'>
                              <label>Phone Number  </label>
                              <input type='text' class='form-control' placeholder='Mobile number'  value="<?php echo $Phonenumber; ?>"name="Phonenumber"    />
                              </div>
                              <div class='form-group col-lg-12  has-info'>

                                <label><font color = "red">* </font>Mobile Number  </label>
                              <input type='text' class='form-control' placeholder='Mobile number' value="<?php echo $mobile_number; ?>" name="mobile_number" required disabled  />
                              </div>
 
                            
                            
                              
                             
                            

                              
                              <div class='form-group col-lg-12  has-info'>
                                <label><font color = "red">* </font>Secret question</label>       
                                <select class='form-control' name="question">
                                      <option value='What is the name of the street you grew up in?'>What is the name of the street you grew up in?</option>
                                      <option value='What is the name of your favorite food?'>What is the name of your favorite food?</option>
                                      <option value='What is the name of your pet?'>What is the name of your pet?</option>
                                      <option value='What is your nickname?'>What is your nickname?</option>
                                  </select>
                              </div>

                              <div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Answer to Secret question</label>
                              <input type='text' class='form-control' placeholder='Answer' name="answer" required disabled  />
                              </div>
                                          
                              <div class='form-group col-lg-12  has-info'>
                              <input type='hidden' class='form-control' name="flag" value="1" required disabled  />
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








