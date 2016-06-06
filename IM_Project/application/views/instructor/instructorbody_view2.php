
<br>
<br>
<br>
<br>
<div style="padding-top:50px;" class="container" id="in-body">
      <div class="row">
     
        <div >
   
   
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $this->session->userdata('Fname'); ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information table-hover">
                    <tbody>
  <?php echo form_open('Admin/UpdateIside2');?>
                      <tr>
                        <td>Username:</td>
                        <td><input type="text" class="form-control"  name="Username"  value="<?php echo $this->session->userdata('Username'); ?>" required /></td>
                      </tr>
                    
                  
                   
                         <tr>
                             <tr>
                        <td>Gender</td>
                        <td><select class="form-control" name="Gender"   value="<?php echo $this->session->userdata('Gender'); ?>" required/>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                  </select></td>
                      </tr>
                      <tr>
                        <td>First name</td>
                        <td><input type="text" class="form-control"  name="Fname"  value="<?php echo $this->session->userdata('Fname'); ?>" required /></td>
                      </tr>
                      <tr>
                        <td>Last name</td>
                        <td><input type="text" class="form-control"  name="Lname"  value="<?php echo $this->session->userdata('Lname'); ?>" required /></td>
                      </tr>
                      <tr>
                        <td>ID number</td>
                        <td><input type="text" class="form-control"  name="Idnum"  value="<?php echo $this->session->userdata('Idnum'); ?>" required />  <span id ="Idnum_flag"></td>
                        
                       </tr>

                       <tr>
                        <td>Email</td>
                        <td><input type="text" class="form-control"  name="Email"  value="<?php echo $this->session->userdata('Email'); ?>" required />  <span id ="email_flag"></td>

                       </tr>  

                        <tr>
                        <td>Contact number</td>
                        <td><input type="text" class="form-control"  name="Phonenumber"  value="<?php echo $this->session->userdata('Phonenumber'); ?>" required />
                        </td>

                        <tr>
                        <td>Schedule</td>
                        <td> <input type='time' class='form-control' placeholder='Family name' name="ScheduleIn" value="<?php echo $this->session->userdata('ScheduleIn'); ?>" required  /> <br> <input type='time' class='form-control' placeholder='Family name' name="ScheduleOut" value="<?php echo $this->session->userdata('ScheduleOut'); ?>"  required  />
                        </td>
                    

                  
                           
                      </tr>

                      <tr>
                        <td>Secret question</td>
                        <td>
                            <select class="form-control" name="question">
                                        <option value='<?php echo $this->session->userdata('question'); ?>'><b>Your previous question:</b> <?php echo $this->session->userdata('question'); ?></option>
                                      <option value='What is the name of the street you grew up in?'>What is the name of the street you grew up in?</option>
                                      <option value='What is the name of your favorite food?'>What is the name of your favorite food?</option>
                                      <option value='What is the name of your pet?'>What is the name of your pet?</option>
                                      <option value='What is your nickname?'>What is your nickname?</option>
                                  </select>
                        </td>
                           
                      </tr>

                        <tr>
                        <td>Answer to Secret question</td>
                        <td><input type="text" id = "rpass" class="form-control" name="answer"  value="<?php echo $this->session->userdata('answer'); ?>" required />
                        </td>
                           
                      </tr>

                      
                     
                      <tr>
                        <td> 
                             <input type='submit' id= "subm" class='btn btn-primary' />
                             
                        </td>
                        <td>
                          
                        </td>
                        
                           
                      </tr>
    <?php echo form_close();?>
                    </tbody>
                  </table>
                  
             
                </div>
              </div>
            </div>
                 
            
          </div>
        </div>
      </div>
    </div>


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