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
          <h1><span class="glyphicon glyphicon-user"></span> Edit Instructors</h1>  
          </div>
                                          <br>
 <?php echo form_open('Admin/UpdateInfo');?>

                              <div class='form-group col-lg-6 has-info'>
                              <label>ID number </label>
                              <input type='text' class='form-control' placeholder='ID number' name="Idnum"  value="<?php echo $Idnum; ?>" required />
                               <span id ="Idnum_flag">
                              </div>

                               <div class='form-group col-lg-6 has-info'>
                              <label>Username  </label>
                              <input type='text' class='form-control' placeholder='Username' name="Username"  value="<?php echo $Username; ?>" required/>
                              
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>First Name  </label>
                              <input type='text' class='form-control' placeholder='Name' name="Fname"  value="<?php echo $Fname; ?>" required />
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Last Name </label>
                              <input type='text' class='form-control' placeholder='Family name' name="Lname"  value="<?php echo $Lname; ?>" required />
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Schedule In</label>
                              <input type='time' class='form-control' placeholder='Family name' name="ScheduleIn" value="<?php echo $ScheduleIn; ?>" required  />
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Schedule Out</label>
                              <input type='time' class='form-control' placeholder='Family name' name="ScheduleOut" value="<?php echo $ScheduleOut; ?>"  required  />
                              </div>
                            
                              <div class='form-group col-lg-6 has-info'>
                              <label>Email  </label>
                              <input type='email' class='form-control' placeholder='Email' name="Email"  value="<?php echo $Email; ?>" required />
                              <span id ="email_flag">
                              </div>

                              
                                   <div class='form-group col-lg-6 has-info'>
                              <label>Phone Number  </label>
                              <input type='text' class='form-control' placeholder='Mobile number' name="Phonenumber"  value="<?php echo $Phonenumber; ?>" required  />
                              </div>
                              
                              <div class='form-group col-lg-12 has-info'>
                                <label>Gender</label>       
                                <select class='form-control' name="Gender" placeholder='Gender'  value="<?php echo $Gender; ?>" required/>
                                      <option value='Male'>Male</option>
                                      <option value='Female'>Female</option>
                                  </select>
                              </div>
                             
							 
                            
                              <div class='form-group col-lg-6 has-info'>
                              <label>Password  </label>
                              <input type='password' class='form-control' placeholder='Password' id="pass" name="Password"  required />
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Retype Password  </label> 
                              <input type='password' class='form-control' id="rpass" placeholder='Retype password' name="RPassword"   required />
                              <span id ="flag_pass"></span>
                              </div>

                              

                              

                         

                                <div class='form-group col-lg-6 has-info'>
                                <label>Secret question</label>       
                                <select class='form-control' name="question">
                                        <option value='<?php echo $question; ?>'><b>Your previous question:</b> <?php echo $question; ?></option>
                                      <option value='What is the name of the street you grew up in?'>What is the name of the street you grew up in?</option>
                                      <option value='What is the name of your favorite food?'>What is the name of your favorite food?</option>
                                      <option value='What is the name of your pet?'>What is the name of your pet?</option>
                                      <option value='What is your nickname?'>What is your nickname?</option>
                                  </select>
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Answer to Secret question</label>
                              <input type='text' class='form-control' placeholder='Answer' name="answer" value="<?php echo $answer; ?>" required  />
                              </div>
                                          
                              <div class='form-group col-lg-6 has-info'>
                              <input type='hidden' class='form-control' name="flag" value="<?php echo $flag; ?>" required />
                              </div> 
                  

                            
                              <div class='form-group col-lg-12 has-info'>
                                  <input type='submit' id= "subm" class='btn btn-primary btn-lg btn-block' />
                              </div>
                            
<?php echo form_close();?>
 <script>

 var flag=0, email;

        $("document").ready(function(){


          var flag2=0, Idnum;

 $("input[name='Idnum']").change(function(){


                 Idnum = $("input[name='Idnum']").val();
                
                      


              $.post("IDvalidate2", {Idnum: $("input[name='Idnum']").val()}, 

                function(data){


                    
                    if(data >= 1){
                      $("#Idnum_flag").html("<span class= 'text text-info'>ID Already Existed!</span>");
                      flag2 = 1; 
                  }

                  else $("#Idnum_flag").html("");

                  
      }); 


                        });

            $("input[name='Email']").change(function(){


                 email = $("input[name='Email']").val();
                
                      


              $.post("emailvalidate2", {email: $("input[name='Email']").val()}, 

                function(data){


                    
                    if(data >= 1){
                      $("#email_flag").html("<span class= 'text text-info'>Email Already Existed!</span>");
                      flag = 1; 
                  }

                  else $("#email_flag").html("");

                  
      }); 


                        });
            
            $("#form_reg").submit(function(){
                
      if($("#pass").val() != $("#rpass").val())
            return false;

                
            });
            
            
            $('#pass, #rpass').change(function(){
                    
                    if($("#pass").val() != $("#rpass").val() && $("#pass").val() != '' && $("#rpass").val()!= '')
                    $("#flag_pass").html("<font color= 'red'>Password Mismatch</font>");
                else if($("#pass").val() == $("#rpass").val())
                     $("#flag_pass").html("<font color= 'green'>Password Match!</font>");
            });
            
        });
        
        </script>
                           
                                      </div>
                                  </div>
                              </div>
           </div>
        </div>
      </div>
    </div>
 </div>

