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
          <h1><span class="glyphicon glyphicon-tower"></span> Edit Administrator</h1>  
          </div>
                                          <br>
 <?php echo form_open('Admin/UpdateAdmin_Proc');?>

                              <div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Company ID</label>
                              <input type='text' class='form-control' placeholder='ID number' name="Idnum"  value="<?php echo $Idnum; ?>" required   />
                              <span id ="Idnum_flag">
                              </div>

                        

                              <div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>First Name  </label>
                              <input type='text' class='form-control' placeholder='Name' value="<?php echo $Fname; ?>" name="Fname" required   />
                              </div>

                              <div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Last Name </label>
                              <input type='text' class='form-control' placeholder='Family name' value="<?php echo $Lname; ?>"  name="Lname" required    />
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
                              <input type='email' class='form-control' placeholder='Email' value="<?php echo $Email; ?>"name="Email" required   />
                              <span id ="email_flag">
                              </div>

							<div class='form-group col-lg-12  has-info'>
                              <label><font color = "red">* </font>Username  </label>
                              <input type='text' class='form-control' placeholder='Username'  value="<?php echo $Username; ?>"name="Username" required  />
                              
                              </div>
                              <div class='form-group col-lg-12  has-info'>
                              <label>Phone Number  </label>
                              <input type='text' class='form-control' placeholder='Mobile number'  value="<?php echo $Phonenumber; ?>"name="Phonenumber"    />
                              </div>
                              <div class='form-group col-lg-12  has-info'>

                                <label><font color = "red">* </font>Mobile Number  </label>
                              <input type='text' class='form-control' placeholder='Mobile number' value="<?php echo $mobile_number; ?>" name="mobile_number" required    />
                              </div>
 
                            
                            
                              
                                                           <input type='hidden' class='form-control' value="<?php echo $admin_no; ?>" name="admin_no" required  />

                            

                              
                              <div class='form-group col-lg-12  has-info'>
                                <label><font color = "red">* </font>Secret question</label>       
                                <select class='form-control' name="question">
                                      <option value='What is the name of the street you grew up in?'>What is the name of the street you grew up in?</option>
                                      <option value='What is the name of your favorite food?'>What is the name of your favorite food?</option>
                                      <option value='What is the name of your pet?'>What is the name of your pet?</option>
                                      <option value='What is your nickname?'>What is your nickname?</option>
                                  </select>
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
                
                      


              $.post("IDvalidate", {Idnum: $("input[name='Idnum']").val()}, 

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




