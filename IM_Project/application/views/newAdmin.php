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
          <h1><span class="glyphicon glyphicon-tower"></span> New Administrator</h1>  
          </div>
                                          <br>
 <?php echo form_open('Admin/addAdministrator');?>
 
 
<p ><font color = "red"><font color = "red">* </font> </font>(Indicates required field)</p>
				  <br>
                              <div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Company ID</label>
                              <input type='text' class='form-control' placeholder='ID number' name="Idnum" required />
                              <span id ="Idnum_flag">
                              </div>

                        

                              <div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>First Name  </label>
                              <input type='text' class='form-control' placeholder='Name' name="Fname" required />
                              </div>

                              <div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Last Name </label>
                              <input type='text' class='form-control' placeholder='Family name' name="Lname" required  />
                              </div>

                              <div class='form-group col-lg-12  has-info'>
                                <label><font color = "red">* </font>Gender</label>       
                                <select class='form-control' name="Gender" placeholder='Gender' >
                                      <option value='Male'>Male</option>
                                      <option value='Female'>Female</option>
                                  </select>
                              </div>

                         
                            
                              <div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Email  </label>
                              <input type='email' class='form-control' placeholder='Email' name="Email" required />
                              <span id ="email_flag">
                              </div>

							<div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Username  </label>
                              <input type='text' class='form-control' placeholder='Username' name="Username" required/>
                              
                              </div>
                              <div class='form-group col-lg-12  has-info'>
                              <label>Phone Number  </label>
                              <input type='text' class='form-control' placeholder='Mobile number' name="Phonenumber"    />
                              </div>

                                <label><font color = "red">* </font>Mobile Number  </label>
                              <input type='text' class='form-control' placeholder='Mobile number' name="mobile_number" required  />
                              </div>


                              <div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Password  </label>
                              <input type='password' class='form-control' id = "pass" placeholder='Password' name="Password" required />
                              </div>

                               <div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Retype Password  </label> 
                              <input type='password' class='form-control' id = "rpass" placeholder='Retype password' name="RPassword" required  />
                               <span id ="flag_pass"></span>
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
                              <input type='text' class='form-control' placeholder='Answer' name="answer" required  />
                              </div>
                                          
                              <div class='form-group col-lg-12  has-info'>
                              <input type='hidden' class='form-control' name="flag" value="1" required  />
                              </div>     
                              
                              
                         
                           
                              <div class='form-group col-lg-12 has-info'>
                              <input type='submit' id= "subm"  class='btn btn-primary btn-lg btn-block' />
                              </div>
                            
<?php echo form_close();?>
<script>

 var flag2=0, Idnum;

        $("document").ready(function(){



          $("input[name='Idnum']").change(function(){


                 Idnum = $("input[name='Idnum']").val();
                
                      


              $.post("IDvalidate", {Idnum: $("input[name='Idnum']").val()}, 

                function(data){


                    
                    if(data >= 1){
                      $("#Idnum_flag").html("<span class= 'text text-info'>ID Already Existed!</span>");
                      flag2 = 1; 
                  }

                  else $("#Idnum_flag").html("");

                  
      }); 


                        });

var flag=0; email;

 $("input[name='Email']").change(function(){


                 email = $("input[name='Email']").val();
                
                      


              $.post("emailvalidate", {email: $("input[name='Email']").val()}, 

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
                       
                   






</body>


