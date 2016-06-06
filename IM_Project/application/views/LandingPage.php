
<section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-10 main-chart">
                  
                      
                      <div class="row mt">
                      <!-- SERVER STATUS PANELS -->
                   <div class="col-lg-12">
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">
                                   
                 <div class="col-lg-12" >
                            

                              <div class="row" style="background-color:#fff; border: 1px solid #2B7DC0">
                                  <div class="box">
                                      <div class="col-lg-12">
                                      <br>
                                      <br>
        
                                          <br>
                                       
                           
                        <?php echo form_open_multipart('IM/UpdateViewUser');?>
                      <!--   <div class="col-lg-4" style="border:1px solid black">
                                <div class="form-group col-lg-6 has-info">
                                    <img src="">
                                </div>

                            </div> --> <!-- put the image here -->
                                          
            
                             <div class="col-lg-12">

                              <div class='form-group col-lg-6 has-info'>
                              <label>First Name  </label>
                              <input type='text' class='form-control' placeholder='Name' name="Fname" value = "<?php echo $this->session->userdata('Fname'); ?>" readonly />
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Last Name </label>
                              <input type='text' class='form-control' placeholder='Family name' name="Lname" value = "<?php echo $this->session->userdata('Lname'); ?>" readonly/>
                              </div>
                            
                              <div class='form-group col-lg-6 has-info'>
                              <label>Email  </label>
                              <input type='email' class='form-control' placeholder='Email'  name="Email" value = "<?php echo $this->session->userdata('Email'); ?>" readonly />
                              </div>
                            
                            
                              <div class='form-group col-lg-6 has-info'>
                              <label>Username  </label>
                              <input type='text' class='form-control'  name="username" value = "<?php echo $this->session->userdata('username'); ?>"placeholder='Username' readonly/>
                              
                              </div>
                            

                              <div class='form-group col-lg-6 has-info'>
                                <label>Secret question</label>       
                              <input type='text' class='form-control' name="question" value="<?php echo $this->session->userdata('question'); ?>" readonly  />
                              </div>
 
                              <input type='hidden' class='form-control' name="flag" value="<?php echo $this->session->userdata('flag'); ?> " required />

							</div>
                                         
                              <div class='form-group col-lg-3 has-info'>
                              <button class='btn btn-primary btn-lg btn-block' >Edit</button>
                              </div>
                              </div>
							  
							     <div class="col-lg-12">

                              <div class='form-group col-lg-6 has-info'>
							  
									<br><br><br>
									<h2><span class= "text text-danger"><b>Announcement</b></span></h2>
									<br><br><br>
									
                  <div class="table-responsive" style= "width: 1400px;" >
				  
									
										<table class= 'table table-condensed table-responsive' style= "background-color: white; width: 700px; float:left;">
									<tr>
									
									<th>Announcement Title</th>
									<th>Course Announcement</th>
									<th>Date Announced</th>
						 
								<tbody>
								
								<?php foreach($anns as $row){ ?>

									<tr>
									<?php 
									/*
									$php_date= strtotime($object->date_expired);
			 
									echo date("M d, Y", $php_date);
									*/
			
		$this->load->model("UserModel");
		$p = new UserModel();
		
			?> 
									<td><a href= "<?php echo base_url(). 'index.php/IM/announcement_content?ann_id='. $row['announcement_id']; ?>"><?php echo $row['announcement_title']; ?> </a>									
									<td><?php echo $p->getCourseInfo($row['courseID'])['CourseName']; ?>
									<td><?php 
									
									$php_date= strtotime($row['announcement_date_createdby']);
			 
									echo date("M d, Y", $php_date);
									
									
									?>
									
								<?php } ?>
								
								</tbody>
									
									</table>
									
                  </div>
									
                              </div>
                              </div>
							  
                            </div>
<?php echo form_close();?>                              
                        

                           
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

    <div style="height: 180px;"></div>

	