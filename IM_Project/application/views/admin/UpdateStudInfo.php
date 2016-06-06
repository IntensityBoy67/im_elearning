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
          <h1><span class="glyphicon glyphicon-user"></span> Update Student</h1>  
          </div>
                                          <br>
 <?php echo form_open('Admin/UpdateInfo');?>

                            
                              <div class="form-group col-lg-12  has-info">
                              <label>Email</label>
                              <input type="text" class="form-control" placeholder="ID number" name="Email"  value="<?php echo $Email; ?>"  />
                              </div>

                                <div class="form-group col-lg-12  has-info">
                              <label>Username  </label>
                              <input type="text" class="form-control" placeholder="Username" name="Username"  value="<?php echo $username; ?>" />
                              
                              </div>
                            

                              <div class="form-group col-lg-12  has-info">
                              <label>First Name  </label>
                              <input type="text" class="form-control" placeholder="First Name" name="Fname"  value="<?php echo $Fname; ?>"  />
                              </div>

                              <div class="form-group col-lg-12  has-info">
                              <label>Last Name </label>
                              <input type="text" class="form-control" placeholder="Family name" name="Lname"  value="<?php echo $Lname; ?>"  />
                              </div>

                          
                              
                            <div class="form-group col-lg-12  has-info">
                              <label>Question</label>
                              <input type="text" class="form-control" placeholder="Question" name="Question"  value="<?php echo $question; ?>"   />
                              </div>
                            
                              <div class="form-group col-lg-12  has-info">
                                <label>Question Answer:</label>       
                              <input type="text" class="form-control" placeholder="Answer" name="answer"  value="<?php echo $answer; ?>"  />
                              </div>
   

                              <div class="form-group col-lg-12  has-info">
			 
 							   
							   
                               </div>
                              
                          
                              
                              <div class="form-group col-lg-12  has-info">
		 
                               
                              </div>
                                          
                            
                            



                            
                              <div class='form-group col-lg-12 has-info'>
                                  <input type='submit' id= "subm" class='btn btn-success btn-lg btn-block' value = "Update"/>
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

