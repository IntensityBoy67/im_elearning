<section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                      
                      <div class="row mt">
                      <!-- SERVER STATUS PANELS -->
                   <div class="col-lg-12">
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">
       
       <div class="col-md-12">
                              
                              <div class="row">
                                  <div class="box">
                                      <div class="col-lg-12">
                                      <br>
                                      <br>
        
                                          <br>
                                       
                           
<?php echo form_open('IM/UpdateUser');?>


                              <div class='form-group col-lg-12has-info'>
                              <label>First Name  </label>
                              <input type='text' class='form-control' placeholder='Name' name="Fname" value = "<?php echo $this->session->userdata('Fname'); ?>" required />
                              </div>

                              <div class='form-group col-lg-12has-info'>
                              <label>Last Name </label>
                              <input type='text' class='form-control' placeholder='Family name' name="Lname" value = "<?php echo $this->session->userdata('Lname'); ?>" required/>
                              </div>
                            
                              <div class='form-group col-lg-12has-info'>
                              <label>Email  </label>
                              <input type='email' class='form-control' placeholder='Email'  name="Email" value = "<?php echo $this->session->userdata('Email'); ?>" required />
                              <span id ="email_flag">
                              </div>
                            
                            
                              <div class='form-group col-lg-12has-info'>
                              <label>Username  </label>
                              <input type='text' class='form-control'  name="username" value = "<?php echo $this->session->userdata('username'); ?>"placeholder='Username' required />
                              
                              </div>
                            
                                
                                          
                            
                              <input type='hidden' class='form-control' name="flag" value="<?php echo $this->session->userdata('flag'); ?> " required />
                            
                            
                              <div class='form-group col-lg-3 has-info'>
                              <button  id= "subm" class='btn btn-info btn-lg btn-block' >Update</button>
                              </div>
<?php echo form_close();?>                            
  <script>
   var flag=0, email;

        $("document").ready(function(){

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
                      	

                    </div><!-- /row -->
                    
                    				
					
					
					
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                 

                      
                      
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

    


   	

	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00" },
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>