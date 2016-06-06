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
          <h1><span class="glyphicon glyphicon-tower"></span> New Student</h1>  
          </div>
                                          <br>
  <?php echo form_open('Admin/InputaddUser1');?>

                              <div class='form-group col-lg-6 has-primary'>
                              <label>First Name  </label>
                              <input type='text' class='form-control' placeholder='Name' name="Fname" required />
                              </div>

                              <div class='form-group col-lg-6 has-primary'>
                              <label>Last Name </label>
                              <input type='text' class='form-control' placeholder='Family name' name="Lname"  required  />
                              </div>

                              <div class='form-group col-lg-6 has-primary'>
                              <label>Email  </label>
                              <input type='email' class='form-control' placeholder='Email' name="Email"  required />
                               <span id ="email_flag"></span>
                              </div>

                            
                              <div class='form-group col-lg-6 has-primary'>
                              <label>Username  </label>
                              <input type='text' class='form-control' placeholder='Username' name="username"  required/>
                               <span id ="username_flag"></span>
                              </div>
                            
                              <div class='form-group col-lg-6 has-primary'>
                              <label>Password  </label>
                              <input type='password' class='form-control' placeholder='Password' id = "pass" name="password"  required />
                              </div>

                              

                              <div class='form-group col-lg-6 has-primary'>
                              <label>Retype Password  </label> 
                              <input type='password' class='form-control' placeholder='Retype password' id="rpass" name="Rpassword" required  />
                              <span id ="flag_pass"></span>
                              </div>

                                  <div class='form-group col-lg-6 has-info'>
                                <label>Secret question</label>       
                                <select class='form-control' name="question">
                                      <option value='What is the name of the street you grew up in?'>What is the name of the street you grew up in?</option>
                                      <option value='What is the name of your favorite food?'>What is the name of your favorite food?</option>
                                      <option value='What is the name of your pet?'>What is the name of your pet?</option>
                                      <option value='What is your nickname?'>What is your nickname?</option>
                                  </select>
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Answer to Secret question</label>
                              <input type='text' class='form-control' placeholder='Answer' name="answer" required  />
                              </div>

                           
                              <div class="form-group col-lg-6 has-info">
                              <input type="hidden" class="form-control" name="flag" value="1" required />
                              </div>   
                            
                            
                              <div class='form-group col-lg-12 has-primary'>
                              <input type='submit' id= "subm" class='btn btn-primary btn-lg btn-block' />
                              </div>
                            
                            <?php echo form_close();?>

<script>

var flag=0; email; 

        $("document").ready(function(){




          $("input[name='Email']").change(function(){


                 email = $("input[name='Email']").val();
                
                      


              $.post("emailvalidate3", {email: $("input[name='Email']").val()}, 

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


